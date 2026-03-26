@extends('master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Kategori Aset /</span> Edit</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Edit Kategori Aset</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori-aset.update', $kategoriAset->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                id="nama_kategori" name="nama_kategori" placeholder="Contoh: Elektronik"
                                value="{{ old('nama_kategori', $kategoriAset->nama_kategori) }}" required />
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                placeholder="Penjelasan singkat kategori...">{{ old('keterangan', $kategoriAset->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('kategori-aset.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
