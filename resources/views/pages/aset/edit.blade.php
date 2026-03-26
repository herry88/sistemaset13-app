@extends('master')

@section('title', 'Edit Aset - Sistem Aset')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Master Data / Aset /</span> Edit
</h4>

<div class="row h-100 justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                <h5 class="mb-0">Edit Data Aset</h5>
                <small class="text-muted float-end font-monospace">{{ $aset->kode_aset }}</small>
            </div>
            <div class="card-body">
                <form action="{{ route('aset.update', $aset->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="kode_aset">Kode Aset <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_aset') is-invalid @enderror" 
                                id="kode_aset" name="kode_aset" placeholder="Contoh: AST-001" value="{{ old('kode_aset', $aset->kode_aset) }}" required />
                            @error('kode_aset')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nama_aset">Nama Aset <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_aset') is-invalid @enderror" 
                                id="nama_aset" name="nama_aset" placeholder="Nama Aset" value="{{ old('nama_aset', $aset->nama_aset) }}" required />
                            @error('nama_aset')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="kategori_id">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategori as $cat)
                                    <option value="{{ $cat->id }}" {{ old('kategori_id', $aset->kategori_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="lokasi_id">Lokasi <span class="text-danger">*</span></label>
                            <select class="form-select @error('lokasi_id') is-invalid @enderror" id="lokasi_id" name="lokasi_id" required>
                                <option value="">Pilih Lokasi</option>
                                @foreach($lokasi as $loc)
                                    <option value="{{ $loc->id }}" {{ old('lokasi_id', $aset->lokasi_id) == $loc->id ? 'selected' : '' }}>
                                        {{ $loc->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lokasi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="kondisi">Kondisi <span class="text-danger">*</span></label>
                            <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik" {{ old('kondisi', $aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ old('kondisi', $aset->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Perlu Perbaikan" {{ old('kondisi', $aset->kondisi) == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                            </select>
                            @error('kondisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jumlah">Jumlah <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" 
                                id="jumlah" name="jumlah" placeholder="0" value="{{ old('jumlah', $aset->jumlah) }}" min="0" required />
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 pt-2 text-end border-top">
                        <a href="{{ route('aset.index') }}" class="btn btn-label-secondary me-1">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbarui Aset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
