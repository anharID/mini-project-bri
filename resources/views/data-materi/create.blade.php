@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Tambah Data Materi</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Materi</h6>
    </div>
    <div class="card-body">
        <form class="" action="{{ route('data-materi.store') }}" method="POST">
            @csrf
            <div class="">
                <label for="materi" class="form-label mt-4">Nama Materi</label>
                <input type="text" name="materi" class="form-control @error('materi') is-invalid @enderror" id="materi"
                    placeholder="Nama Kelas" required autofocus value="{{ old('materi') }}">
                @error('materi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class=" mt-4">
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
            </div>

    </div>
</div>


@endsection