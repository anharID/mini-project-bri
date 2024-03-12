@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('data-kelas.create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Asisten</span>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>No.</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Tingkat</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->jurusan }}</td>
                        <td>{{ $k->tingkat }}</td>
                        <td>{{ $k->fakultas }}</td>
                        <td>
                            <a href="{{ route('data-kelas.edit', $k->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('data-kelas.destroy', $k->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submmit" class="btn btn-danger btn-circle btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection