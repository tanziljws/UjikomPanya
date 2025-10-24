@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Galeri Foto</h1>
        <p class="page-subtitle">Kumpulan foto kegiatan dan prestasi SMK Negeri 4 Kota Bogor</p>
    </div>

    <!-- Category Filter -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bi bi-funnel"></i> Filter Kategori
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('galeri') }}" class="btn btn-outline-primary {{ !isset($category) ? 'active' : '' }}">
                            <i class="bi bi-grid"></i> Semua Foto
                        </a>
                        @foreach(\App\Models\Category::withCount('galeris')->get() as $cat)
                            @if($cat->galeris_count > 0)
                                <a href="{{ route('galeri.category', $cat->id) }}" 
                                   class="btn btn-outline-primary {{ isset($category) && $category->id == $cat->id ? 'active' : '' }}">
                                    <i class="bi bi-tag"></i> {{ $cat->nama }} ({{ $cat->galeris_count }})
                                </a>
                            @endif
                        @endforeach
                    </div>
                    @if(isset($category))
                        <div class="mt-3">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                Menampilkan foto dalam kategori: <strong>{{ $category->nama }}</strong>
                                @if($category->deskripsi)
                                    <br><small>{{ $category->deskripsi }}</small>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="row">
        @forelse($galeris as $galeri)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card gallery-card h-100">
                <!-- Post Header (Instagram-like) -->
                <div class="gallery-topbar">
                    <div class="d-flex align-items-center gap-2">
                        <span class="avatar-ring">
                            <img src="{{ asset('images/logosmkn4.png') }}" alt="SMKN 4" class="avatar-img">
                        </span>
                        <div class="d-flex flex-column">
                            <span class="topbar-title">{{ $galeri->judul }}</span>
                            <small class="text-muted">{{ $galeri->category->nama ?? 'Galeri' }}</small>
                        </div>
                    </div>
                    <button class="btn btn-link p-0 more-btn" type="button" onclick="openModal('imageModal{{ $galeri->id }}')" aria-label="More">
                        <i class="bi bi-three-dots"></i>
                    </button>
                </div>
                <div class="gallery-image-container" onclick="openModal('imageModal{{ $galeri->id }}')" style="cursor: pointer;">
                    <img src="{{ asset('images/' . $galeri->gambar) }}" 
                         class="gallery-image" 
                         alt="{{ $galeri->judul }}"
                         loading="lazy">
                    <div class="image-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>
                
                <div class="card-body pt-3">
                    @if($galeri->category)
                        <span class="badge bg-primary mb-2">{{ $galeri->category->nama }}</span>
                    @endif

                    <div class="gallery-stats mb-3">
                        <span class="stat-item">
                            <i class="bi bi-heart-fill text-danger"></i>
                            <span class="likes-count-{{ $galeri->id }}">{{ $galeri->likes_count }}</span>
                        </span>
                        <span class="stat-item">
                            <i class="bi bi-chat-fill text-primary"></i>
                            <span class="comments-count-{{ $galeri->id }}">{{ $galeri->comments_count }}</span>
                        </span>
                        <span class="stat-item">
                            <i class="bi bi-calendar text-muted"></i>
                            <span>{{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}</span>
                        </span>
                    </div>

                    <!-- Post Footer Actions (Instagram-like) -->
                    <div class="post-actions">
                        <div class="left-actions">
                            <button class="icon-btn like-btn {{ Auth::check() && $galeri->isLikedByUser(Auth::id()) ? 'liked' : '' }}" data-id="{{ $galeri->id }}" data-liked="{{ Auth::check() && $galeri->isLikedByUser(Auth::id()) ? 'true' : 'false' }}" aria-label="Like">
                                <i class="bi {{ Auth::check() && $galeri->isLikedByUser(Auth::id()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            </button>
                            <button class="icon-btn" onclick="openModal('imageModal{{ $galeri->id }}')" aria-label="Comments">
                                <i class="bi bi-chat"></i>
                            </button>
                            <button class="icon-btn share-btn" data-id="{{ $galeri->id }}" data-title="{{ $galeri->judul }}" data-url="{{ url('/galeri') }}" aria-label="Share">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                        <div class="right-actions">
                            @auth
                                <a href="{{ route('galeri.download', $galeri->id) }}" class="icon-btn" download aria-label="Save">
                                    <i class="bi bi-bookmark"></i>
                                </a>
                            @else
                                <button class="icon-btn" onclick="showLoginAlert()" aria-label="Save">
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Modal -->
        <div class="custom-modal" id="imageModal{{ $galeri->id }}" style="display: none;">
            <div class="custom-modal-overlay" onclick="closeModal('imageModal{{ $galeri->id }}')"></div>
            <div class="custom-modal-content">
                <div class="custom-modal-header">
                    <h5>{{ $galeri->judul }}</h5>
                    <button type="button" onclick="closeModal('imageModal{{ $galeri->id }}')" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
                </div>
                <div class="custom-modal-body">
                    <img src="{{ asset('images/' . $galeri->gambar) }}" style="width: 100%; max-height: 400px; object-fit: contain; margin-bottom: 15px;" alt="{{ $galeri->judul }}">
                    
                    <div style="text-align: center; margin-bottom: 15px;">
                        <button class="btn btn-outline-danger like-btn" data-id="{{ $galeri->id }}" data-liked="{{ Auth::check() && $galeri->isLikedByUser(Auth::id()) ? 'true' : 'false' }}" style="margin: 5px;">
                            <i class="bi {{ Auth::check() && $galeri->isLikedByUser(Auth::id()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            <span class="likes-count-{{ $galeri->id }}">{{ $galeri->likes_count }}</span>
                        </button>
                        
                        @auth
                            <a href="{{ route('galeri.download', $galeri->id) }}" class="btn btn-outline-success" download style="margin: 5px;">
                                <i class="bi bi-download"></i> Download
                            </a>
                        @else
                            <button class="btn btn-outline-success" onclick="showLoginAlert()" style="margin: 5px;">
                                <i class="bi bi-download"></i> Download
                            </button>
                        @endauth
                        
                        <button class="btn btn-outline-info share-btn" data-id="{{ $galeri->id }}" data-title="{{ $galeri->judul }}" data-url="{{ url('/galeri') }}" style="margin: 5px;">
                            <i class="bi bi-share"></i> Share
                        </button>
                    </div>

                    @if($galeri->deskripsi)
                    <p><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</p>
                    @endif

                    <h6>Komentar (<span class="comments-count-{{ $galeri->id }}">{{ $galeri->comments_count }}</span>)</h6>
                    
                    <form class="comment-form" data-id="{{ $galeri->id }}" style="margin-bottom: 15px;">
                        @csrf
                        @guest
                        <div class="mb-2">
                            <input type="text" class="form-control guest-name-input" placeholder="Nama (opsional)">
                        </div>
                        @endguest
                        <div class="input-group">
                            <input type="text" class="form-control comment-input" placeholder="Tulis komentar..." required>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </form>

                    <div class="comments-list" id="comments-{{ $galeri->id }}" style="max-height: 200px; overflow-y: auto;">
                        <!-- Comments will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="bi bi-images text-muted mb-3" style="font-size: 4rem;"></i>
                    <h5 class="text-muted">Belum ada foto</h5>
                    <p class="text-muted">Foto kegiatan sekolah akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galeris->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="pagination-wrapper">
                    {{ $galeris->links() }}
                </div>
            </div>
        </div>
    </div>
    <style>
        .pagination-wrapper ul.pagination { 
            gap: 2px;
            margin: 0.3rem 0;
        }
        .pagination-wrapper .page-link {
            padding: 1px 5px;
            font-size: 10px;
            line-height: 1.1;
            min-width: 24px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pagination-wrapper .page-item .bi,
        .pagination-wrapper .page-item i,
        .pagination-wrapper .page-item svg {
            font-size: 10px !important;
            width: 10px !important; 
            height: 10px !important;
            margin: 0 -1px;
        }
    </style>
    @endif
</div>

<style>
/* Modernized gallery styles (colors preserved) */
.gallery-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    border: 1px solid rgba(0,0,0,0.06);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.12);
}

.gallery-image-container {
    position: relative;
    overflow: hidden;
    height: 250px;
    cursor: pointer;
    border-bottom: 1px solid rgba(0,0,0,0.06);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,0.5) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    backdrop-filter: blur(1px);
}

.image-overlay i {
    color: #fff;
    font-size: 2.25rem;
    transform: scale(0.9);
    transition: transform 0.25s ease;
}

.gallery-image-container:hover .gallery-image {
    transform: scale(1.06);
}

.gallery-image-container:hover .image-overlay {
    opacity: 1;
}

.gallery-image-container:hover .image-overlay i {
    transform: scale(1);
}

.badge.bg-primary {
    box-shadow: 0 6px 14px rgba(30,64,175,0.25);
    border-radius: 999px;
    padding: 0.4rem 0.65rem;
    font-weight: 600;
}

.gallery-stats {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}

.stat-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.875rem;
    color: #64748b;
}

.stat-item i { font-size: 1rem; }

.gallery-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.gallery-actions .btn {
    flex: 1;
    min-width: 92px;
    font-size: 0.82rem;
    padding: 0.45rem 0.65rem;
    border-radius: 999px;
    border-width: 1.5px;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.gallery-actions .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
}

/* Legacy button style (kept for old layout only) */
.gallery-actions .like-btn.liked {
    background-color: #dc3545;
    color: #fff;
    border-color: #dc3545;
}

.like-btn.liked i { animation: heartBeat 0.3s ease; }

@keyframes heartBeat { 0%, 100% { transform: scale(1);} 50% { transform: scale(1.2);} }

/* Custom Modal CSS */
.custom-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

.custom-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 1; /* keep overlay below the content so inputs are clickable */
}

.custom-modal-content {
    position: relative;
    background: white;
    margin: 50px auto;
    width: 90%;
    max-width: 800px;
    max-height: 90vh;
    overflow-y: auto;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    z-index: 2; /* ensure modal content stays above overlay */
}

.custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.custom-modal-body {
    padding: 20px;
}

.comment-item {
    padding: 12px;
    background: #fff;
    border-radius: 10px;
    margin-bottom: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
}

.comment-author { font-weight: 600; color: #0f172a; font-size: 0.92rem; }
.comment-time { font-size: 0.75rem; color: #94a3b8; }
.comment-content { margin-top: 6px; font-size: 0.9rem; color: #334155; }

.comments-list::-webkit-scrollbar { width: 6px; }
.comments-list::-webkit-scrollbar-track { background: #f1f5f9; }
.comments-list::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
.comments-list::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

.card-title { font-size: 1.02rem; font-weight: 700; color: #1f2937; }

/* Instagram-like header (top bar) */
.gallery-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem 1rem;
}

.avatar-ring {
    width: 36px; height: 36px; border-radius: 50%;
    padding: 2px; display: inline-flex; align-items: center; justify-content: center;
    background: conic-gradient(#f59e0b, #ef4444, #3b82f6, #10b981, #f59e0b);
}
.avatar-ring .avatar-img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; background: #fff; padding: 2px; }
.topbar-title { font-weight: 700; color: #111827; line-height: 1; }
.more-btn { color: #334155; text-decoration: none; border: none; }
.more-btn:hover { color: #0f172a; }

/* Instagram-like footer (action bar) */
.post-actions { display: flex; align-items: center; justify-content: space-between; padding: 0.25rem 0.25rem 0.5rem; border-top: 1px solid rgba(0,0,0,0.06); }
.post-actions .left-actions { display: flex; gap: 10px; }
.post-actions .right-actions { display: flex; }

.icon-btn {
    background: transparent; border: none; outline: none; box-shadow: none; cursor: pointer;
    padding: 0.25rem; line-height: 1; display: inline-flex; align-items: center; justify-content: center;
    color: #111827; transition: transform .12s ease, color .12s ease;
    font-size: 1.25rem;
}
.icon-btn:hover { transform: scale(1.08); }
.icon-btn:active { transform: scale(0.98); }
.icon-btn i { pointer-events: none; }
.icon-btn.liked, .icon-btn.liked i { color: #dc2626 !important; }
.icon-btn.liked { background: transparent !important; border: none !important; box-shadow: none !important; }
.icon-btn:focus { outline: none; box-shadow: none; }

/* Filter button chips */
.card .btn.btn-outline-primary { border-radius: 999px; padding: 0.4rem 0.8rem; }
.card .btn.btn-outline-primary.active { color: #fff; }
.
/* Custom Alert Animations */
@keyframes slideIn {
    from {
        transform: translateX(400px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(400px);
        opacity: 0;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Gallery script loaded');
    
    // CSRF Token setup
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error('CSRF token meta tag not found!');
        return;
    }
    const csrfToken = csrfTokenMeta.getAttribute('content');
    console.log('CSRF Token found:', csrfToken ? 'Yes' : 'No');

    // Custom alert function
    function showLoginAlert(message) {
        // Create alert container if not exists
        let alertContainer = document.getElementById('custom-alert-container');
        if (!alertContainer) {
            alertContainer = document.createElement('div');
            alertContainer.id = 'custom-alert-container';
            alertContainer.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
            `;
            document.body.appendChild(alertContainer);
        }

        // Create alert element
        const alert = document.createElement('div');
        alert.className = 'custom-alert';
        alert.innerHTML = `
            <div style="
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                margin-bottom: 10px;
                display: flex;
                align-items: center;
                gap: 12px;
                animation: slideIn 0.3s ease;
            ">
                <i class="bi bi-info-circle-fill" style="font-size: 1.5rem;"></i>
                <div style="flex: 1;">
                    <div style="font-weight: 600; margin-bottom: 4px;">${message}</div>
                    <a href="/login" style="color: #ffd700; text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                        Klik di sini untuk login →
                    </a>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" style="
                    background: rgba(255,255,255,0.2);
                    border: none;
                    color: white;
                    width: 28px;
                    height: 28px;
                    border-radius: 50%;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.2s;
                " onmouseover="this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                    <i class="bi bi-x" style="font-size: 1.2rem;"></i>
                </button>
            </div>
        `;

        alertContainer.appendChild(alert);

        // Auto remove after 5 seconds
        setTimeout(() => {
            alert.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    }

    // Custom Modal Functions
    function openModal(modalId) {
        console.log('Opening modal:', modalId);
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            // Load comments when modal opens
            const galeriId = modalId.replace('imageModal', '');
            const commentsList = document.getElementById(`comments-${galeriId}`);
            
            if (commentsList && !commentsList.dataset.loaded) {
                commentsList.innerHTML = '<p class="text-muted">Memuat komentar...</p>';
                
                fetch(`/galeri/${galeriId}/comments`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            commentsList.innerHTML = '';
                            if (data.comments.length > 0) {
                                data.comments.forEach(comment => {
                                    commentsList.innerHTML += `
                                        <div class="comment-item">
                                            <strong>${comment.user_name}</strong>
                                            <small class="text-muted">${comment.created_at}</small>
                                            <p>${comment.content}</p>
                                        </div>
                                    `;
                                });
                            } else {
                                commentsList.innerHTML = '<p class="text-muted">Belum ada komentar</p>';
                            }
                        }
                        commentsList.dataset.loaded = 'true';
                    })
                    .catch(error => {
                        console.error('Error loading comments:', error);
                        commentsList.innerHTML = '<p class="text-danger">Gagal memuat komentar</p>';
                    });
            }
        }
    }
    
    function closeModal(modalId) {
        console.log('Closing modal:', modalId);
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }

    // Basic modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Custom modal setup');
        
        // Basic download button handler
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-outline-success')) {
                const btn = e.target.closest('.btn-outline-success');
                if (btn.textContent.includes('Download')) {
                    console.log('Download clicked');
                    if (!btn.href) {
                        e.preventDefault();
                        // Show nicer login prompt instead of alert()
                        showLoginAlert();
                    }
                }
            }
        });
    });

    // Like functionality
    const likeButtons = document.querySelectorAll('.like-btn');
    console.log('Found like buttons:', likeButtons.length);
    
    likeButtons.forEach(btn => {
        btn.addEventListener('click', async function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Like button clicked');
            
            const galeriId = this.dataset.id;
            const isLiked = this.dataset.liked === 'true';
            console.log('Gallery ID:', galeriId, 'Is Liked:', isLiked);

            try {
                const response = await fetch(`/galeri/${galeriId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                console.log('Response status:', response.status);
                const data = await response.json();
                console.log('Response data:', data);

                if (data.success) {
                    // Update all like buttons for this gallery item
                    document.querySelectorAll(`[data-id="${galeriId}"].like-btn`).forEach(likeBtn => {
                        const icon = likeBtn.querySelector('i');
                        if (data.liked) {
                            icon.classList.remove('bi-heart');
                            icon.classList.add('bi-heart-fill');
                            likeBtn.classList.add('liked');
                            likeBtn.dataset.liked = 'true';
                        } else {
                            icon.classList.remove('bi-heart-fill');
                            icon.classList.add('bi-heart');
                            likeBtn.classList.remove('liked');
                            likeBtn.dataset.liked = 'false';
                        }
                    });

                    // Update likes count
                    document.querySelectorAll(`.likes-count-${galeriId}`).forEach(el => {
                        el.textContent = data.likes_count;
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });

    // Comment functionality
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            const galeriId = this.dataset.id;
            const input = this.querySelector('.comment-input');
            const content = input.value.trim();
            const guestNameInput = this.querySelector('.guest-name-input');
            const guest_name = guestNameInput ? guestNameInput.value.trim() : undefined;

            if (!content) return;

            try {
                const response = await fetch(`/galeri/${galeriId}/comment`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ content, guest_name })
                });

                const data = await response.json();

                if (data.success) {
                    // Add new comment to the list
                    const commentsList = document.getElementById(`comments-${galeriId}`);
                    const commentHtml = `
                        <div class="comment-item">
                            <div class="d-flex justify-content-between">
                                <span class="comment-author">${data.comment.user_name}</span>
                                <span class="comment-time">${data.comment.created_at}</span>
                            </div>
                            <div class="comment-content">${data.comment.content}</div>
                        </div>
                    `;
                    commentsList.insertAdjacentHTML('afterbegin', commentHtml);

                    // Update comments count
                    document.querySelectorAll(`.comments-count-${galeriId}`).forEach(el => {
                        el.textContent = data.comments_count;
                    });

                    // Clear input
                    input.value = '';
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });


    // Show login alert for download (custom toast)
    function showLoginAlert() {
        // Create container if not exists
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.style.position = 'fixed';
            container.style.right = '20px';
            container.style.bottom = '20px';
            container.style.zIndex = '10000';
            container.style.display = 'flex';
            container.style.flexDirection = 'column';
            container.style.gap = '10px';
            document.body.appendChild(container);
        }

        // Build toast
        const toast = document.createElement('div');
        toast.style.background = 'linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%)';
        toast.style.color = '#fff';
        toast.style.padding = '14px 16px';
        toast.style.borderRadius = '12px';
        toast.style.boxShadow = '0 10px 20px rgba(0,0,0,0.2)';
        toast.style.minWidth = '280px';
        toast.style.maxWidth = '360px';
        toast.style.animation = 'fadeInUp 0.25s ease';
        toast.innerHTML = `
            <div style="display:flex; align-items:flex-start; gap:12px;">
                <div style="flex:1">
                    <div style="font-weight:700; margin-bottom:4px; display:flex; align-items:center; gap:8px;">
                        <i class="bi bi-shield-lock"></i>
                        Dibutuhkan Login
                    </div>
                    <div style="opacity:.9">Silakan login terlebih dahulu untuk mendownload foto.</div>
                </div>
            </div>
            <div style="display:flex; gap:8px; margin-top:12px; justify-content:flex-end;">
                <button type="button" class="btn btn-sm" style="background: rgba(255,255,255,0.15); color:#fff; border:1px solid rgba(255,255,255,0.25);" id="toast-cancel">Nanti Saja</button>
                <a class="btn btn-sm btn-light" style="color:#1e3a8a; font-weight:600;" href="{{ route('login') }}">Login</a>
            </div>
        `;

        container.appendChild(toast);

        // Close handler
        toast.querySelector('#toast-cancel').addEventListener('click', () => {
            toast.style.animation = 'slideOut 0.2s ease';
            setTimeout(() => toast.remove(), 180);
        });

        // Auto remove after 6s
        setTimeout(() => {
            if (document.body.contains(toast)) {
                toast.style.animation = 'slideOut 0.2s ease';
                setTimeout(() => toast.remove(), 180);
            }
        }, 6000);
    }

    // Expose modal and alert functions globally so inline onclick works
    // This fixes clicks on photos not opening the modal
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.showLoginAlert = showLoginAlert;

    // Share functionality
    const shareButtons = document.querySelectorAll('.share-btn');
    console.log('Found share buttons:', shareButtons.length);
    
    shareButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Share button clicked');
            
            const title = this.dataset.title;
            const url = this.dataset.url;
            const text = `Lihat foto: ${title}`;
            console.log('Sharing:', title, url);

            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: text,
                    url: url
                }).catch(err => console.log('Error sharing:', err));
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link berhasil disalin ke clipboard!');
                }).catch(err => {
                    console.error('Error copying to clipboard:', err);
                });
            }
        });
    });
});
</script>
@endsection
