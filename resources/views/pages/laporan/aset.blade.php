@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Menu / Laporan /</span> Aset
</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Filter Laporan</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('laporan.aset') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select">
                    <option value="">-- Semua --</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}" {{ (request('kategori_id') == $item->id) ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Lokasi</label>
                <select name="lokasi_id" class="form-select">
                    <option value="">-- Semua --</option>
                    @foreach($lokasis as $item)
                        <option value="{{ $item->id }}" {{ (request('lokasi_id') == $item->id) ? 'selected' : '' }}>{{ $item->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Kondisi</label>
                <select name="kondisi" class="form-select">
                    <option value="">-- Semua --</option>
                    <option value="Baik" {{ (request('kondisi') == 'Baik') ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ (request('kondisi') == 'Rusak Ringan') ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ (request('kondisi') == 'Rusak Berat') ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-12 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Tampilkan</button>
                <a href="{{ route('laporan.aset') }}" class="btn btn-secondary"><i class="bx bx-refresh"></i> Reset</a>
            </div>
        </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Aset</h5>
        <div class="btn-group">
            <a href="{{ route('laporan.export-aset', request()->all()) }}" class="btn btn-success btn-sm">
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
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Tanggal Perolehan</th>
                        <th class="text-end">Harga Perolehan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($asets as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->kode_aset }}</strong></td>
                            <td>{{ $item->nama_aset }}</td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
                            <td>
                                @if($item->kondisi == 'Baik')
                                    <span class="badge bg-success">Baik</span>
                                @elseif($item->kondisi == 'Rusak Ringan')
                                    <span class="badge bg-warning">Rusak Ringan</span>
                                @else
                                    <span class="badge bg-danger">Rusak Berat</span>
                                @endif
                            </td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d/m/Y') }}</td>
                            <td class="text-end">Rp {{ number_format($item->harga_perolehan, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8" class="text-end">Total:</th>
                        <th class="text-end">Rp {{ number_format($asets->sum('harga_perolehan'), 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
