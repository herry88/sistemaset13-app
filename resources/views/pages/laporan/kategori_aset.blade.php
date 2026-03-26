@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Menu / Laporan /</span> Kategori Aset
</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Filter Laporan</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('laporan.kategori-aset') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ $tanggalMulai }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ $tanggalAkhir }}">
            </div>
            <div class="col-md-4 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Tampilkan</button>
                <a href="{{ route('laporan.kategori-aset') }}" class="btn btn-secondary"><i class="bx bx-refresh"></i> Reset</a>
            </div>
        </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Kategori Aset</h5>
        <div class="btn-group">
            <a href="{{ route('laporan.export-kategori-aset', request()->all()) }}" class="btn btn-success btn-sm">
                <i class="bx bx-download"></i> Export PDF
            </a>
            <button onclick="window.print()" class="btn btn-secondary btn-sm">
                <i class="bx bx-printer"></i> Print
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th class="text-end">Jumlah Aset</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama_kategori }}</strong></td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td class="text-end"><span class="badge bg-primary">{{ $item->asets_count }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total:</th>
                        <th class="text-end"><span class="badge bg-success">{{ $kategori->sum('asets_count') }}</span></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <small class="text-muted">Periode: {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d/m/Y') }}</small>
    </div>
</div>
@endsection
