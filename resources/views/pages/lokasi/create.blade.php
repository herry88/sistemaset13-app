@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Lokasi /</span> Tambah</h4>

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Tambah Lokasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lokasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama_lokasi">Nama Lokasi</label>
                        <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" id="nama_lokasi" name="nama_lokasi" placeholder="Contoh: Ruang TU" value="{{ old('nama_lokasi') }}" required />
                        @error('nama_lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Penjelasan singkat lokasi...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
