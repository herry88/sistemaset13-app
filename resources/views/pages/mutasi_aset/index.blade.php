@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Mutasi Aset</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Mutasi Aset</h5>
        <a href="{{ route('mutasi_aset.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Tambah Mutasi
        </a>
    </div>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($mutasiAsets as $key => $mutasi)
                <tr>
                    <td>{{ $mutasiAsets->firstItem() + $key }}</td>
                    <td><strong>{{ $mutasi->aset->kode_aset ?? '-' }}</strong></td>
                    <td>{{ $mutasi->aset->nama_aset ?? '-' }}</td>
                    <td>{{ $mutasi->lokasiAsal->nama_lokasi ?? '-' }}</td>
                    <td>{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($mutasi->tanggal_mutasi)->format('d/m/Y') }}</td>
                    <td>{{ $mutasi->keterangan ?? '-' }}</td>
                    <td>{{ $mutasi->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('mutasi_aset.show', $mutasi->id) }}" class="btn btn-sm btn-info">
                            <i class="bx bx-show">Detail</i>
                        </a>
                        <a href="{{ route('mutasi_aset.edit', $mutasi->id) }}" class="btn btn-sm btn-warning">
                            <i class="bx bx-edit-alt">Edit</i>
                        </a>
                        <form action="{{ route('mutasi_aset.destroy', $mutasi->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-delete" onclick="return confirm('Yakin hapus?')">
                                <i class="bx bx-trash">Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">Belum ada data mutasi aset</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $mutasiAsets->links() }}
    </div>
</div>
@endsection
