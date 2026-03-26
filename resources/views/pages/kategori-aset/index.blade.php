@extends('master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Kategori Aset</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Kategori Aset</h5>
            <a href="{{ route('kategori-aset.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Kategori
            </a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama_kategori }}</strong></td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>
                            <td>
                                <a href="{{ route('kategori-aset.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit-alt">Edit</i>
                                </a>
                                <form action="{{ route('kategori-aset.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                        <i class="bx bx-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
