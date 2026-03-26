@extends('master')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data / Mutasi Aset /</span> Tambah</h4>

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Tambah Mutasi Aset</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('mutasi_aset.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="aset_id">Aset</label>
                        <select name="aset_id" id="aset_id" class="form-select @error('aset_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Aset --</option>
                            @foreach($asets as $aset)
                            <option value="{{ $aset->id }}" {{ old('aset_id') == $aset->id ? 'selected' : '' }}>
                                {{ $aset->kode_aset }} - {{ $aset->nama_aset }}
                            </option>
                            @endforeach
                        </select>
                        @error('aset_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lokasi_asal_id">Lokasi Asal</label>
                        <select name="lokasi_asal_id" id="lokasi_asal_id" class="form-select @error('lokasi_asal_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Lokasi Asal --</option>
                            @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}" {{ old('lokasi_asal_id') == $lokasi->id ? 'selected' : '' }}>
                                {{ $lokasi->nama_lokasi }}
                            </option>
                            @endforeach
                        </select>
                        @error('lokasi_asal_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lokasi_tujuan_id">Lokasi Tujuan</label>
                        <select name="lokasi_tujuan_id" id="lokasi_tujuan_id" class="form-select @error('lokasi_tujuan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Lokasi Tujuan --</option>
                            @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}" {{ old('lokasi_tujuan_id') == $lokasi->id ? 'selected' : '' }}>
                                {{ $lokasi->nama_lokasi }}
                            </option>
                            @endforeach
                        </select>
                        @error('lokasi_tujuan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tanggal_mutasi">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="form-control @error('tanggal_mutasi') is-invalid @enderror" value="{{ old('tanggal_mutasi') }}" required>
                        @error('tanggal_mutasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Keterangan mutasi...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('mutasi_aset.index') }}" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
