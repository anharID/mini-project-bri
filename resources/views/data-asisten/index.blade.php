@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Data Asisten</h1>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Asisten</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('data-asisten.create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Asisten</span>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>No.</th>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->id_number }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('data-asisten.edit', $user->id) }}"
                                class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if (Auth::user()->id !== $user->id )
                            <form action="{{ route('data-asisten.destroy', $user->id) }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submmit" class="btn btn-danger btn-circle btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection