@extends('layouts.template')

@section('container')
<div class="row">
    @can('admin-staf-pj')
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Generate Code</h6>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('generate_code') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-user btn-block">Generate Code</button>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Code dari {{ $user->name }} yang belum digunakan</h6>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($unused_code as $item)
                    <li>{{ $item->code }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endcan

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $presensi ? 'Status Presensi' : 'Form Presensi' }}</h6>
            </div>
            <div class="card-body">
                <div id="clock"></div>

                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if (session()->has('check'))
                <div class="alert alert-success" role="alert">
                    {{ session('check') }}
                </div>
                @endif

                @if ($presensi)
                <div>
                    <h3>Anda berhasil melakukan presensi</h1>
                        <ul>
                            <li>Code yang diguakan: {{ $presensi->code->code }}</li>
                            <li>Kelas: {{ $presensi->kelas->nama_kelas }}</li>
                            <li>Materi: {{ $presensi->materi->materi }}</li>
                            <li>Tanggal: {{ $presensi->date }}</li>
                            <li>Waktu Check IN: {{ $presensi->start_time }} WIB</li>
                        </ul>
                </div>
                <form action="{{ route('check_out', ['id'=>$presensi->id]) }}" method="post">
                    @csrf
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Check OUT</button>
                    </div>
                </form>
                @else
                <form action="{{ route('check_in') }}" method="post">
                    @csrf
                    <div>
                        <label for="teaching_role" class="form-label mt-4">Teaching Role</label>
                        <input name="teaching_role" type="hidden"
                            class="form-control @error('teaching_role') is-invalid @enderror">
                        <select name="teaching_role" class="form-control form-select">
                            <option disabled selected>Pilih Teaching Role</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Asisten Baris">Asisten Baris</option>
                            <option value="Tutor">Tutor</option>
                        </select>
                        @error('teaching_role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kelas" class="form-label mt-4">Kelas</label>
                        <input name="kelas" type="hidden" class="form-control @error('kelas') is-invalid @enderror">
                        <select name="kelas" class="form-control form-select">
                            <option disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="materi" class="form-label mt-4">Materi</label>
                        <input name="materi" type="hidden" class="form-control @error('materi') is-invalid @enderror">
                        <select name="materi" class="form-control form-select">
                            <option disabled selected>Pilih materi</option>
                            @foreach ($materi as $m)
                            <option value="{{ $m->id }}">{{ $m->materi }}</option>
                            @endforeach
                        </select>
                        @error('materi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="code" class="form-label mt-4">Code</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                            id="code" placeholder="Masukkan Code Presensi" required value="{{ old('code') }}" {{
                            $presensi ? 'disabled' : '' }}>
                        @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Check IN</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection