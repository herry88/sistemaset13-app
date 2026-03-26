@extends('master')

@section('title', 'Dashboard - Sistem Aset')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
@endpush

@section('content')
    <!-- Hero Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dash-hero">
                <div class="row align-items-center position-relative" style="z-index: 2;">
                    <div class="col-lg-7">
                        <p class="dash-hero-sub mb-1">
                            <i class="bx bx-calendar me-1"></i>
                            <span id="heroDate"></span>
                        </p>
                        <h3 class="dash-hero-greeting" id="heroGreeting">Selamat Datang!</h3>
                        <p class="dash-hero-sub">
                            Kelola aset, kategori, lokasi, dan mutasi organisasi anda dengan mudah dan efisien.
                        </p>
                    </div>
                    <div class="col-lg-5 text-end d-none d-lg-block">
                        <div class="dash-hero-time" id="heroClock">--:--:--</div>
                        <div class="dash-hero-date">Waktu Server · WIB</div>
                    </div>
                </div>
                <i class="bx bx-buildings dash-hero-icon"></i>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-4 mb-4">
        <!-- Total Aset -->
        <div class="col-xl-3 col-md-6">
            <div class="dash-stat-card stat-primary">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="dash-stat-label">Total Aset</div>
                        <div class="dash-stat-number">{{ $totalAset }}</div>
                    </div>
                    <div class="dash-stat-icon icon-primary">
                        <i class="bx bx-package"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none"
                        style="font-size: 0.8rem; color: var(--dash-primary); font-weight: 500;">
                        Lihat Detail <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
                <i class="bx bx-package dash-stat-bg-icon"></i>
            </div>
        </div>

        <!-- Kategori Aset -->
        <div class="col-xl-3 col-md-6">
            <div class="dash-stat-card stat-mint">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="dash-stat-label">Kategori Aset</div>
                        <div class="dash-stat-number">{{ $totalKategori }}</div>
                    </div>
                    <div class="dash-stat-icon icon-mint">
                        <i class="bx bx-category"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('kategori-aset.index') }}" class="text-decoration-none"
                        style="font-size: 0.8rem; color: var(--dash-mint); font-weight: 500;">
                        Kelola Kategori <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
                <i class="bx bx-category dash-stat-bg-icon"></i>
            </div>
        </div>

        <!-- Lokasi -->
        <div class="col-xl-3 col-md-6">
            <div class="dash-stat-card stat-amber">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="dash-stat-label">Lokasi Aset</div>
                        <div class="dash-stat-number">{{ $totalLokasi }}</div>
                    </div>
                    <div class="dash-stat-icon icon-amber">
                        <i class="bx bx-map"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('lokasi.index') }}" class="text-decoration-none"
                        style="font-size: 0.8rem; color: var(--dash-amber); font-weight: 500;">
                        Kelola Lokasi <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
                <i class="bx bx-map dash-stat-bg-icon"></i>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6">
            <div class="dash-stat-card stat-rose">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="dash-stat-label">Total Pengguna</div>
                        <div class="dash-stat-number">{{ $totalUser }}</div>
                    </div>
                    <div class="dash-stat-icon icon-rose">
                        <i class="bx bx-group"></i>
                    </div>
                </div>
                <div class="mt-3">
                    @can('manage-users')
                        <a href="{{ route('user.index') }}" class="text-decoration-none"
                            style="font-size: 0.8rem; color: var(--dash-rose); font-weight: 500;">
                            Kelola User <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    @else
                        <span style="font-size: 0.8rem; color: var(--dash-slate-600);">Pengguna Terdaftar</span>
                    @endcan
                </div>
                <i class="bx bx-group dash-stat-bg-icon"></i>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <!-- Distribusi Kategori -->
        <div class="col-lg-5">
            <div class="dash-glass-card">
                <div class="dash-glass-header">
                    <h5>
                        <span class="header-icon"><i class="bx bx-pie-chart-alt-2"></i></span>
                        Distribusi Kategori
                    </h5>
                </div>
                <div class="dash-glass-body">
                    @if ($totalKategori > 0)
                        <div id="kategoriChart" class="dash-chart-container"></div>
                    @else
                        <div class="dash-empty-state">
                            <i class="bx bx-pie-chart-alt-2 dash-empty-icon"></i>
                            <p class="dash-empty-text">Belum ada data kategori.<br>Tambahkan kategori aset terlebih dahulu.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Trend Aktivitas -->
        <div class="col-lg-7">
            <div class="dash-glass-card">
                <div class="dash-glass-header">
                    <h5>
                        <span class="header-icon"><i class="bx bx-line-chart"></i></span>
                        Trend Aktivitas Bulanan
                    </h5>
                </div>
                <div class="dash-glass-body">
                    <div id="trendChart" class="dash-chart-container"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions + System Info -->
    <div class="row g-4">
        <!-- Quick Actions -->
        <div class="col-lg-7">
            <div class="dash-glass-card">
                <div class="dash-glass-header">
                    <h5>
                        <span class="header-icon"><i class="bx bx-zap"></i></span>
                        Aksi Cepat
                    </h5>
                </div>
                <div class="dash-glass-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('aset.create') }}" class="dash-action-card">
                                <div class="dash-action-icon act-primary">
                                    <i class="bx bx-plus-circle"></i>
                                </div>
                                <div class="dash-action-title">Tambah Aset</div>
                                <p class="dash-action-desc">Aset baru</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('lokasi.create') }}" class="dash-action-card">
                                <div class="dash-action-icon act-mint">
                                    <i class="bx bx-map-pin"></i>
                                </div>
                                <div class="dash-action-title">Tambah Lokasi</div>
                                <p class="dash-action-desc">Lokasi baru</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="#" class="dash-action-card">
                                <div class="dash-action-icon act-amber">
                                    <i class="bx bx-upload"></i>
                                </div>
                                <div class="dash-action-title">Import Data</div>
                                <p class="dash-action-desc">Upload CSV/Excel</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="#" class="dash-action-card">
                                <div class="dash-action-icon act-rose">
                                    <i class="bx bx-download"></i>
                                </div>
                                <div class="dash-action-title">Export Laporan</div>
                                <p class="dash-action-desc">Unduh PDF/Excel</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="col-lg-5">
            <div class="dash-glass-card">
                <div class="dash-glass-header">
                    <h5>
                        <span class="header-icon"><i class="bx bx-info-circle"></i></span>
                        Informasi Sistem
                    </h5>
                </div>
                <div class="dash-glass-body">
                    <div class="dash-info-row">
                        <div class="dash-info-icon info-primary">
                            <i class="bx bx-user"></i>
                        </div>
                        <span class="dash-info-label">Pengguna Aktif</span>
                        <span class="dash-info-value">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </div>
                    <div class="dash-info-row">
                        <div class="dash-info-icon info-mint">
                            <i class="bx bx-shield-quarter"></i>
                        </div>
                        <span class="dash-info-label">Role</span>
                        <span class="dash-info-value">{{ ucfirst(Auth::user()->roles->first()?->name ?? 'User') }}</span>
                    </div>
                    <div class="dash-info-row">
                        <div class="dash-info-icon info-amber">
                            <i class="bx bx-calendar-check"></i>
                        </div>
                        <span class="dash-info-label">Tahun Anggaran</span>
                        <span class="dash-info-value">{{ date('Y') }}</span>
                    </div>
                    <div class="dash-info-row">
                        <div class="dash-info-icon info-rose">
                            <i class="bx bx-cog"></i>
                        </div>
                        <span class="dash-info-label">Versi Sistem</span>
                        <span class="dash-info-value">v1.0.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Real-time clock
        function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            const clockEl = document.getElementById('heroClock');
            if (clockEl) clockEl.textContent = time;
        }

        // Date & greeting
        function setGreeting() {
            const now = new Date();
            const hour = now.getHours();
            let greeting = 'Selamat Malam';
            if (hour >= 5 && hour < 12) greeting = 'Selamat Pagi';
            else if (hour >= 12 && hour < 15) greeting = 'Selamat Siang';
            else if (hour >= 15 && hour < 18) greeting = 'Selamat Sore';

            const greetEl = document.getElementById('heroGreeting');
            if (greetEl) greetEl.textContent = greeting + ', {{ Auth::user()->name ?? 'Admin' }}! 👋';

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];
            const dateStr = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now
                .getFullYear();
            const dateEl = document.getElementById('heroDate');
            if (dateEl) dateEl.textContent = dateStr;
        }

        setGreeting();
        updateClock();
        setInterval(updateClock, 1000);

        // ApexCharts — Distribusi Kategori (Donut)
        @if ($totalKategori > 0)
            (function() {
                const labels = @json($kategoriList);
                const series = @json($asetCounts);
                const colors = ['#696cff', '#06d6a0', '#f59e0b', '#f43f5e', '#8b5cf6', '#0ea5e9', '#ec4899', '#10b981'];

                new ApexCharts(document.querySelector('#kategoriChart'), {
                    chart: {
                        type: 'donut',
                        height: 280,
                        fontFamily: 'Public Sans, sans-serif'
                    },
                    series: series,
                    labels: labels,
                    colors: colors.slice(0, labels.length),
                    legend: {
                        position: 'bottom',
                        fontSize: '13px',
                        markers: {
                            width: 10,
                            height: 10,
                            radius: 4
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%',
                                labels: {
                                    show: true,
                                    name: {
                                        fontSize: '14px',
                                        fontWeight: 600
                                    },
                                    value: {
                                        fontSize: '22px',
                                        fontWeight: 700,
                                        color: '#1e293b'
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        fontSize: '14px',
                                        color: '#475569',
                                        formatter: (w) => w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                    }
                                }
                            }
                        }
                    },
                    stroke: {
                        width: 3,
                        colors: ['#fff']
                    },
                    dataLabels: {
                        enabled: false
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                height: 250
                            }
                        }
                    }]
                }).render();
            })();
        @endif

        // ApexCharts — Trend Aktivitas (Area)
        (function() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const currentMonth = new Date().getMonth();
            const visibleMonths = months.slice(0, currentMonth + 1);

            new ApexCharts(document.querySelector('#trendChart'), {
                chart: {
                    type: 'area',
                    height: 280,
                    fontFamily: 'Public Sans, sans-serif',
                    toolbar: {
                        show: false
                    },
                    sparkline: {
                        enabled: false
                    }
                },
                series: [{
                        name: 'Aset Masuk',
                        data: visibleMonths.map(() => Math.floor(Math.random() * 15) + 2)
                    },
                    {
                        name: 'Mutasi',
                        data: visibleMonths.map(() => Math.floor(Math.random() * 10) + 1)
                    }
                ],
                colors: ['#696cff', '#06d6a0'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                xaxis: {
                    categories: visibleMonths,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#475569',
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#475569',
                            fontSize: '12px'
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    theme: 'light'
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    fontSize: '13px',
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 4
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 220
                        }
                    }
                }]
            }).render();
        })();
    </script>
@endpush
