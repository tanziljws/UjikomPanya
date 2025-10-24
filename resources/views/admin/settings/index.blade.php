@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-gear"></i> Pengaturan Sistem</h2>
                <p>Kelola konfigurasi website dan sistem</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Website</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control" value="SMK Negeri 4 Kota Bogor">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3">Jl. Raya Bogor No. 123, Kota Bogor, Jawa Barat</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="tel" class="form-control" value="0251-123456">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="info@smkn4bogor.sch.id">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pengaturan Sistem</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Mode Maintenance</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="maintenanceMode">
                                <label class="form-check-label" for="maintenanceMode">
                                    Aktifkan mode maintenance
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Registrasi User</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="userRegistration" checked>
                                <label class="form-check-label" for="userRegistration">
                                    Izinkan registrasi user baru
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload File</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fileUpload" checked>
                                <label class="form-check-label" for="fileUpload">
                                    Izinkan upload file
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 