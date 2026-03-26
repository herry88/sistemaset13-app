@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Mutasi Aset /</span> Detail</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Mutasi Aset</h5>
        <a href="{{ route('mutasi_aset.index') }}" class="btn btn-outline-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="250">Kode Aset</th>
                <td>{{ $mutasiAset->aset->kode_aset ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nama Aset</th>
                <td>{{ $mutasiAset->aset->nama_aset ?? '-' }}</td>
            </tr>
            <tr>
                <th>Lokasi Asal</th>
                <td>{{ $mutasiAset->lokasiAsal->nama_lokasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Lokasi Tujuan</th>
                <td>{{ $mutasiAset->lokasiTujuan->nama_lokasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Mutasi</th>
                <td>{{ \Carbon\Carbon::parse($mutasiAset->tanggal_mutasi)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $mutasiAset->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Petugas</th>
                <td>{{ $mutasiAset->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $mutasiAset->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>updated_at</th>
                <td>{{ $mutasiAset->updated_at->format('d/m/Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('mutasi_aset.edit', $mutasiAset->id) }}" class="btn btn-warning">
            <i class="bx bx-edit-alt me-1"></i> Edit
        </a>
    </div>
</div>
@endsection
