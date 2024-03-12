@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Tambah Data Asisten</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Asisten</h6>
    </div>
    <div class="card-body">
        <form class="row g-3 p-3" action="{{ route('data-asisten.update', $user->id) }}" method="POST">
            @method('put')
            @csrf <div class="col-md-6">
                <label for="id_number" class="form-label mt-4">Nomor Induk</label>
                <input type="text" name="id_number" class="form-control @error('id_number') is-invalid @enderror"
                    id="id_number" placeholder="Nomor Induk" required autofocus
                    value="{{ old('id_number', $user->id_number) }}">
                @error('id_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label mt-4">Nama Asisten</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Nama" required autofocus value="{{ old('name', $user->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label mt-4">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Nama" required autofocus value="{{ old('email', $user->email) }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label mt-4">Role</label>
                <input name="role" type="hidden" class="form-control @error('role') is-invalid @enderror">
                <select name="role" class="form-control form-select">
                    <option disabled>Pilih Role</option>
                    <option value="staf" {{ $user->role == 'staf' ? 'selected' : '' }}>Staf</option>
                    <option value="pj" {{ $user->role == 'pj' ? 'selected' : '' }}>PJ</option>
                    <option value="asisten" {{ $user->role == 'asisten' ? 'selected' : '' }}>Asisten</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12 mt-4">
                <p class="text-center">Untuk keamanan, password hanya dapat diganti oleh user bersangkutan.
                </p>

            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
            </div>
        </form>

    </div>
</div>


@endsection