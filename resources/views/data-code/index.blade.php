@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Code Generator</h1>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Code</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('generate_code') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary btn-icon-split mb-4"> <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Generate Code</span></button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Pembuat Code</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($codes as $code)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $code->code }}</td>
                        <td>{{ $code->createdBy->name }}</td>
                        <td><span
                                class="{{ $code->usedBy ? 'badge bg-success text-light' : 'badge bg-secondary text-light' }}">{{
                                $code->usedBy ? 'Sudah Dipakai' : 'Belum Dipakai' }}</span></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection