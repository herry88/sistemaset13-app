@extends('master')

@section('title', 'Aset - Sistem Aset')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Aset</h4>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
            <h5 class="mb-0">Daftar Aset</h5>
            <a href="{{ route('aset.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Aset
            </a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Aset</th>
                        <th>Nama Aset</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($asets as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-label-secondary font-monospace">{{ $item->kode_aset }}</span></td>
                            <td><strong>{{ $item->nama_aset }}</strong></td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
                            <td>
                                @if ($item->kondisi == 'Baik')
                                    <span class="badge bg-label-success">{{ $item->kondisi }}</span>
                                @elseif ($item->kondisi == 'Rusak')
                                    <span class="badge bg-label-danger">{{ $item->kondisi }}</span>
                                @else
                                    <span class="badge bg-label-warning">{{ $item->kondisi }}</span>
                                @endif
                            </td>
                            <td>{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <a href="{{ route('aset.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('aset.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <form action="{{ route('aset.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data aset.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
