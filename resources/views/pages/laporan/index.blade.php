@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Laporan</h4>

<div class="row">
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-category"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Laporan Kategori Aset</h5>
                    <small class="text-muted">Data aset berdasarkan kategori</small>
                    <br><br>
                    <a href="{{ route('laporan.kategori-aset') }}" class="btn btn-sm btn-primary">Buka Laporan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-success"><i class="bx bxs-map"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Laporan Lokasi Aset</h5>
                    <small class="text-muted">Data aset berdasarkan lokasi</small>
                    <br><br>
                    <a href="{{ route('laporan.lokasi-aset') }}" class="btn btn-sm btn-primary">Buka Laporan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-warning"><i class="bx bxs-box"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Laporan Aset</h5>
                    <small class="text-muted">Daftar lengkap seluruh aset</small>
                    <br><br>
                    <a href="{{ route('laporan.aset') }}" class="btn btn-sm btn-primary">Buka Laporan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-transfer"></i></span>
                </div>
                <div>
                    <h5 class="card-title mb-1">Laporan Mutasi Aset</h5>
                    <small class="text-muted">Riwayat perpindahan aset</small>
                    <br><br>
                    <a href="{{ route('laporan.mutasi-aset') }}" class="btn btn-sm btn-primary">Buka Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
