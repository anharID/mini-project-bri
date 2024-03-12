@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Ubah Data Kelas</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Kelas</h6>
    </div>
    <div class="card-body">
        <form class="row g-3 p-3" action="{{ route('data-kelas.update', $data_kela->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="col-md-6">
                <label for="nama_kelas" class="form-label mt-4">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"
                    id="nama_kelas" placeholder="Nama Kelas" required autofocus
                    value="{{ old('nama_kelas', $data_kela->nama_kelas) }}">
                @error('nama_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="jurusan" class="form-label mt-4">Jurusan</label>
                <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                    id="jurusan" placeholder="Jurusan" required autofocus
                    value="{{ old('jurusan', $data_kela->jurusan) }}">
                @error('jurusan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="tingkat" class="form-label mt-4">Tingkat</label>
                <input type="text" name="tingkat" class="form-control @error('tingkat') is-invalid @enderror"
                    id="tingkat" placeholder="Tingkat" required autofocus
                    value="{{ old('tingkat', $data_kela->tingkat) }}">
                @error('tingkat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="fakultas" class="form-label mt-4">Fakultas</label>
                <input type="text" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror"
                    id="fakultas" placeholder="Fakultas" required autofocus
                    value="{{ old('fakultas', $data_kela->fakultas) }}">
                @error('fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
            </div>

    </div>
</div>


@endsection