@extends('master')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang di Sistem Aset! 🎉</h5>
                        <p class="mb-4">
                            Anda dapat mengelola data kategori aset, lokasi, dan mutasi aset dengan mudah di sini.
                        </p>
                        <a href="{{ route('kategori-aset.index') }}" class="btn btn-sm btn-outline-primary">Kelola Kategori</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('assets/assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Total Aset -->
    <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/assets/img/icons/unicons/box.png') }}" alt="Aset" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Aset</span>
                <h3 class="card-title mb-2">0</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Bersedia</small>
            </div>
        </div>
    </div>
    <!-- Kategori Aset -->
    <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/assets/img/icons/unicons/chart-success.png') }}" alt="Kategori" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Kategori Aset</span>
                <h3 class="card-title mb-2">0</h3>
                <small class="text-success fw-semibold"><i class="bx bx-check"></i> Aktif</small>
            </div>
        </div>
    </div>
    <!-- Lokasi -->
    <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/assets/img/icons/unicons/wallet-info.png') }}" alt="Lokasi" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Lokasi</span>
                <h3 class="card-title mb-2">0</h3>
                <small class="text-info fw-semibold"><i class="bx bx-map"></i> Titik</small>
            </div>
        </div>
    </div>
    <!-- Mutasi -->
    <div class="col-lg-3 col-md-6 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/assets/img/icons/unicons/cc-primary.png') }}" alt="Mutasi" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Mutasi Aset</span>
                <h3 class="card-title mb-2">0</h3>
                <small class="text-warning fw-semibold"><i class="bx bx-refresh"></i> Proses</small>
            </div>
        </div>
    </div>
</div>
@endsection
