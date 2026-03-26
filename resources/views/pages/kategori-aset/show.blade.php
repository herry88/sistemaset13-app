@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Kategori Aset /</span> Detail</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Kategori Aset</h5>
        <a href="{{ route('kategori-aset.index') }}" class="btn btn-outline-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="250">ID</th>
                <td>{{ $kategoriAset->id }}</td>
            </tr>
            <tr>
                <th>Nama Kategori</th>
                <td>{{ $kategoriAset->nama_kategori }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $kategoriAset->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Aset</th>
                <td><span class="badge bg-primary">{{ $kategoriAset->asets->count() }}</span></td>
            </tr>
            <tr>
                <th>created_at</th>
                <td>{{ $kategoriAset->created_at->format('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>updated_at</th>
                <td>{{ $kategoriAset->updated_at->format('d/m/Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('kategori-aset.edit', $kategoriAset->id) }}" class="btn btn-warning">
            <i class="bx bx-edit-alt me-1"></i> Edit
        </a>
    </div>
</div>
@endsection
