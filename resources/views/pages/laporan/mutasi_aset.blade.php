@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Menu / Laporan /</span> Mutasi Aset
</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Filter Laporan</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('laporan.mutasi-aset') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Aset</label>
                <select name="aset_id" class="form-select">
                    <option value="">-- Semua --</option>
                    @foreach($asets as $item)
                        <option value="{{ $item->id }}" {{ (request('aset_id') == $item->id) ? 'selected' : '' }}>{{ $item->kode_aset }} - {{ $item->nama_aset }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Tampilkan</button>
                <a href="{{ route('laporan.mutasi-aset') }}" class="btn btn-secondary"><i class="bx bx-refresh"></i> Reset</a>
            </div>
        </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Mutasi Aset</h5>
        <div class="btn-group">
            <a href="{{ route('laporan.export-mutasi-aset', request()->all()) }}" class="btn btn-success btn-sm">
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
                        <th>Kode Aset</th>
                        <th>Nama Aset</th>
                        <th>Lokasi Asal</th>
                        <th>Lokasi Tujuan</th>
                        <th>Tanggal Mutasi</th>
                        <th>Keterangan</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($mutasis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->aset->kode_aset ?? '-' }}</strong></td>
                            <td>{{ $item->aset->nama_aset ?? '-' }}</td>
                            <td>{{ $item->lokasiAsal->nama_lokasi ?? '-' }}</td>
                            <td>{{ $item->lokasiTujuan->nama_lokasi ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_mutasi)->format('d/m/Y') }}</td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
