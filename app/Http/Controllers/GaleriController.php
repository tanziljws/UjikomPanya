<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('category')->latest()->paginate(12);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function publicIndex()
    {
        $galeris = Galeri::with(['category'])
            ->withCount(['likes', 'comments'])
            ->latest()
            ->paginate(6);
        return view('galeri', compact('galeris'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.galeri.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|file|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            
            // Validasi ekstensi file secara manual
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return back()->withErrors(['gambar' => 'Format file tidak didukung. Gunakan JPG, PNG, atau GIF.']);
            }
            
            $imageName = time() . '.' . $extension;
            $file->move(public_path('images'), $imageName);

            $galeri = Galeri::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $imageName,
                'category_id' => $request->category_id,
            ]);

            // Log aktivitas admin
            ActivityLog::logAdminActivity(
                'admin_post_galeri',
                'Upload foto baru: ' . $request->judul,
                Auth::id(),
                'Foto galeri berhasil ditambahkan'
            );

            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
        }

        return back()->withErrors(['gambar' => 'File gambar diperlukan.']);
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $categories = Category::all();
        return view('admin.galeri.edit', compact('galeri', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|file|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->category_id = $request->category_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            
            // Validasi ekstensi file secara manual
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return back()->withErrors(['gambar' => 'Format file tidak didukung. Gunakan JPG, PNG, atau GIF.']);
            }
            
            $imageName = time() . '.' . $extension;
            $file->move(public_path('images'), $imageName);
            $galeri->gambar = $imageName;
        }

        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar jika perlu
        if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }

    /**
     * Toggle like on a gallery item
     */
    public function toggleLike($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Allow guest likes persisted using a stable guest token stored in cookie
        if (!Auth::check()) {
            $guestToken = request()->cookie('guest_token');
            $newTokenGenerated = false;
            if (!$guestToken) {
                $guestToken = (string) Str::uuid();
                $newTokenGenerated = true;
            }

            // Toggle like for this guest
            $existing = Like::where('galeri_id', $id)
                ->whereNull('user_id')
                ->where('guest_token', $guestToken)
                ->first();

            if ($existing) {
                $existing->delete();
                $liked = false;
            } else {
                Like::create([
                    'galeri_id' => $id,
                    'guest_token' => $guestToken,
                ]);
                $liked = true;
            }

            $likesCount = $galeri->likes()->count();

            // Log guest like activity so it shows up in admin recent activity
            ActivityLog::logSystemActivity(
                'user_like',
                'Like foto: ' . $galeri->judul,
                'Aksi oleh pengunjung (guest) dari IP: ' . request()->ip()
            );

            $json = response()->json([
                'success' => true,
                'liked' => $liked,
                'likes_count' => $likesCount,
                'guest' => true
            ]);

            // Attach cookie if we generated a new token
            return $newTokenGenerated
                ? $json->cookie('guest_token', $guestToken, 60 * 24 * 365)
                : $json;
        }

        // Authenticated user likes
        $userId = Auth::id();
        $like = Like::where('user_id', $userId)
            ->where('galeri_id', $id)
            ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $userId,
                'galeri_id' => $id,
            ]);
            $liked = true;

            // Log aktivitas user like
            ActivityLog::logUserActivity(
                'user_like',
                'Like foto: ' . $galeri->judul,
                $userId,
                'User menyukai foto galeri'
            );
        }

        $likesCount = $galeri->likes()->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likes_count' => $likesCount,
            'guest' => false
        ]);
    }

    /**
     * Store a comment on a gallery item
     */
    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'guest_name' => 'nullable|string|max:100',
        ]);

        $galeri = Galeri::findOrFail($id);

        $data = [
            'content' => $request->content,
            'galeri_id' => $id,
        ];

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        } else {
            // For guests, we store the provided name; fallback to "Tamu"
            $data['guest_name'] = $request->guest_name ?: 'Tamu';
        }

        $comment = Comment::create($data);
        $comment->load('user');

        // Log aktivitas: jika user login, catat sebagai user; jika tamu, catat sebagai system agar tetap tampil di dashboard
        if (Auth::check()) {
            ActivityLog::logUserActivity(
                'user_comment',
                'Komentar pada foto: ' . $galeri->judul,
                Auth::id(),
                'User memberikan komentar pada foto galeri'
            );
        } else {
            ActivityLog::logSystemActivity(
                'user_comment',
                'Komentar pada foto: ' . $galeri->judul,
                'Komentar oleh pengunjung (guest): ' . ($data['guest_name'] ?? 'Tamu')
            );
        }

        $userName = $comment->user->name ?? $comment->guest_name ?? 'Tamu';

        return response()->json([
            'success' => true,
            'comment' => [
                'id' => $comment->id,
                'content' => $comment->content,
                'user_name' => $userName,
                'created_at' => $comment->created_at->diffForHumans(),
            ],
            'comments_count' => $galeri->comments()->count()
        ]);
    }

    /**
     * Get comments for a gallery item
     */
    public function getComments($id)
    {
        $galeri = Galeri::findOrFail($id);
        $comments = $galeri->comments()->with('user')->get();

        return response()->json([
            'success' => true,
            'comments' => $comments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'user_name' => optional($comment->user)->name ?? $comment->guest_name ?? 'Tamu',
                    'created_at' => $comment->created_at->diffForHumans(),
                ];
            })
        ]);
    }

    /**
     * Download a gallery image
     */
    public function download($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
            $filePath = public_path('images/' . $galeri->gambar);

            if (!file_exists($filePath)) {
                abort(404, 'File tidak ditemukan');
            }

            // Get file extension
            $extension = pathinfo($galeri->gambar, PATHINFO_EXTENSION);
            $downloadName = $galeri->judul . '.' . $extension;
            
            // Clean filename for download
            $downloadName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $downloadName);

            // Set headers for download
            $headers = [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $downloadName . '"',
                'Content-Length' => filesize($filePath),
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ];

            return response()->download($filePath, $downloadName, $headers);
            
        } catch (\Exception $e) {
            \Log::error('Download error: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat mendownload file');
        }
    }

    /**
     * Filter galeri by category
     */
    public function filterByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $galeris = Galeri::where('category_id', $categoryId)
            ->with(['category'])
            ->withCount(['likes', 'comments'])
            ->latest()
            ->paginate(6);
        
        return view('galeri', compact('galeris', 'category'));
    }
}
