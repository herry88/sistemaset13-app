@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Aset /</span> Detail</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Aset</h5>
        <a href="{{ route('aset.index') }}" class="btn btn-outline-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="250">Kode Aset</th>
                <td>{{ $aset->kode_aset }}</td>
            </tr>
            <tr>
                <th>Nama Aset</th>
                <td>{{ $aset->nama_aset }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $aset->lokasi->nama_lokasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td>
                    @if($aset->kondisi == 'Baik')
                        <span class="badge bg-success">Baik</span>
                    @elseif($aset->kondisi == 'Rusak Ringan')
                        <span class="badge bg-warning">Rusak Ringan</span>
                    @else
                        <span class="badge bg-danger">Rusak Berat</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $aset->jumlah }}</td>
            </tr>
            <tr>
                <th>Tanggal Perolehan</th>
                <td>{{ \Carbon\Carbon::parse($aset->tanggal_perolehan)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Harga Perolehan</th>
                <td>Rp {{ number_format($aset->harga_perolehan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $aset->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $aset->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>updated_at</th>
                <td>{{ $aset->updated_at->format('d/m/Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning">
            <i class="bx bx-edit-alt me-1"></i> Edit
        </a>
    </div>
</div>
@endsection
