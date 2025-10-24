<!DOCTYPE html>
<html>
<head>
    <title>Laporan Lengkap - SMK Negeri 4 Kota Bogor</title>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #1e40af;
        }
        
        .header h1 {
            color: #1e40af;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .header h2 {
            color: #666;
            font-size: 18px;
            font-weight: normal;
            margin-bottom: 10px;
        }
        
        .header .date {
            color: #999;
            font-size: 11px;
        }
        
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        
        .section-title {
            background: #1e40af;
            color: white;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        
        .stats-row {
            display: table-row;
        }
        
        .stat-box {
            display: table-cell;
            width: 25%;
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #1e40af;
            display: block;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 11px;
        }
        
        .weekly-stats {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        
        .weekly-row {
            display: table-row;
        }
        
        .weekly-box {
            display: table-cell;
            width: 20%;
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            background: #f8f9fa;
        }
        
        .weekly-number {
            font-size: 24px;
            font-weight: bold;
            color: #059669;
            display: block;
            margin-bottom: 5px;
        }
        
        .weekly-label {
            color: #666;
            font-size: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        table th {
            background: #f1f5f9;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #ddd;
            font-size: 11px;
        }
        
        table td {
            padding: 8px 10px;
            border: 1px solid #ddd;
            font-size: 10px;
        }
        
        table tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
        }
        
        .badge-primary {
            background: #3b82f6;
            color: white;
        }
        
        .badge-success {
            background: #10b981;
            color: white;
        }
        
        .badge-warning {
            background: #f59e0b;
            color: white;
        }
        
        .badge-info {
            background: #06b6d4;
            color: white;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #ddd;
            text-align: center;
            color: #999;
            font-size: 10px;
        }
        
        @media print {
            body {
                padding: 0;
            }
            
            .section {
                page-break-inside: avoid;
            }
            
            @page {
                margin: 2cm;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>LAPORAN LENGKAP SISTEM</h1>
        <h2>SMK Negeri 4 Kota Bogor</h2>
        <div class="date">Dicetak pada: {{ \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') }} WIB</div>
    </div>

    <!-- Statistik Total -->
    <div class="section">
        <div class="section-title">STATISTIK TOTAL</div>
        <div class="stats-grid">
            <div class="stats-row">
                <div class="stat-box">
                    <span class="stat-number">{{ $stats['total_gallery'] }}</span>
                    <span class="stat-label">Total Foto Galeri</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $stats['total_users'] }}</span>
                    <span class="stat-label">Total User</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $stats['total_agenda'] }}</span>
                    <span class="stat-label">Total Agenda</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $stats['total_informasi'] }}</span>
                    <span class="stat-label">Total Informasi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik 7 Hari Terakhir -->
    <div class="section">
        <div class="section-title">STATISTIK AKTIVITAS 7 HARI TERAKHIR</div>
        <div class="weekly-stats">
            <div class="weekly-row">
                <div class="weekly-box">
                    <span class="weekly-number">{{ $weeklyStats['admin_posts'] }}</span>
                    <span class="weekly-label">Post Admin</span>
                </div>
                <div class="weekly-box">
                    <span class="weekly-number">{{ $weeklyStats['user_registers'] }}</span>
                    <span class="weekly-label">User Register</span>
                </div>
                <div class="weekly-box">
                    <span class="weekly-number">{{ $weeklyStats['user_logins'] }}</span>
                    <span class="weekly-label">User Login</span>
                </div>
                <div class="weekly-box">
                    <span class="weekly-number">{{ $weeklyStats['user_likes'] }}</span>
                    <span class="weekly-label">User Like</span>
                </div>
                <div class="weekly-box">
                    <span class="weekly-number">{{ $weeklyStats['user_comments'] }}</span>
                    <span class="weekly-label">User Comment</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="section">
        <div class="section-title">AKTIVITAS TERBARU (7 HARI TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th width="15%">Tanggal</th>
                    <th width="50%">Aktivitas</th>
                    <th width="15%">Tipe User</th>
                    <th width="20%">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent_activities as $activity)
                <tr>
                    <td>{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $activity->activity_name }}</td>
                    <td>
                        @if($activity->user_type == 'Admin')
                            <span class="badge badge-primary">{{ $activity->user_type }}</span>
                        @elseif($activity->user_type == 'User')
                            <span class="badge badge-success">{{ $activity->user_type }}</span>
                        @else
                            <span class="badge badge-info">{{ $activity->user_type }}</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-success">{{ $activity->status }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">Tidak ada aktivitas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Data User -->
    <div class="section">
        <div class="section-title">DATA USER TERBARU (20 TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama</th>
                    <th width="35%">Email</th>
                    <th width="15%">Role</th>
                    <th width="15%">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'admin')
                            <span class="badge badge-primary">Admin</span>
                        @else
                            <span class="badge badge-success">User</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #999;">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Data Galeri -->
    <div class="section">
        <div class="section-title">DATA GALERI TERBARU (20 TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Judul</th>
                    <th width="25%">Kategori</th>
                    <th width="30%">Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $galeri->judul }}</td>
                    <td>{{ $galeri->category->name ?? '-' }}</td>
                    <td>{{ $galeri->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Data Agenda -->
    <div class="section">
        <div class="section-title">DATA AGENDA TERBARU (20 TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Judul</th>
                    <th width="20%">Tanggal Agenda</th>
                    <th width="20%">Lokasi</th>
                    <th width="15%">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $index => $agenda)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $agenda->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->date)->format('d/m/Y') }}</td>
                    <td>{{ $agenda->location ?? '-' }}</td>
                    <td>
                        @if($agenda->status)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warning">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #999;">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Data Informasi -->
    <div class="section">
        <div class="section-title">DATA INFORMASI TERBARU (20 TERAKHIR)</div>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Judul</th>
                    <th width="20%">Kategori</th>
                    <th width="20%">Penulis</th>
                    <th width="15%">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasis as $index => $informasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $informasi->title }}</td>
                    <td>{{ ucfirst($informasi->category) }}</td>
                    <td>{{ $informasi->author }}</td>
                    <td>{{ \Carbon\Carbon::parse($informasi->published_at)->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #999;">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh Sistem Informasi SMK Negeri 4 Kota Bogor</p>
        <p>© {{ date('Y') }} SMK Negeri 4 Kota Bogor. All Rights Reserved.</p>
    </div>

    <script>
        // Auto print when page loads
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
