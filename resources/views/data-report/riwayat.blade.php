@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Riwayat Presensi</h1>

{{-- @if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat</h6>
    </div>
    <div class="card-body">
        {{-- <a href="{{ route('data-kelas.create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Asisten</span>
        </a> --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>No. Induk</th>
                    <th>Nama Asisten</th>
                    <th>Kelas</th>
                    <th>Materi</th>
                    <th>Jaga Sebagai</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Durasi</th>
                    <th>Approved By</th>
                </thead>
                <tbody>
                    @foreach ($presensi as $item)
                    <tr>
                        <td>{{ $item->code->usedBy->id_number }}</td>
                        <td>{{ $item->code->usedBy->name }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->materi->materi }}</td>
                        <td>{{ $item->teaching_role }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->start_time }}</td>
                        <td>{{ $item->end_time }}</td>
                        <td>{{ $item->duration }} menit</td>
                        <td>{{ $item->code->createdBy->name }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection