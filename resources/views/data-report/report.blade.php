@extends('layouts.template')

@section('container')
<h1 class="h3 mb-2 text-gray-800">Report Presensi</h1>

{{-- @if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('export_report') }}" class="btn btn-success btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
            <span class="text">Export Excel</span>
        </a>
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
                </thead>
                <tbody>
                    @foreach ($presensi as $p)
                    <tr>
                        <td>{{ $p->code->usedBy->id_number }}</td>
                        <td>{{ $p->code->usedBy->name }}</td>
                        <td>{{ $p->kelas->nama_kelas }}</td>
                        <td>{{ $p->materi->materi }}</td>
                        <td>{{ $p->teaching_role }}</td>
                        <td>{{ $p->date }}</td>
                        <td>{{ $p->start_time }}</td>
                        <td>{{ $p->end_time }}</td>
                        <td>{{ $p->duration }} menit</td>
                        {{-- <td>{{ $p->code->createdBy->name }}</td> --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection