<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $presensi = Presensi::all();
        return view('data-report.report', compact('presensi'));
    }

    public function riwayat()
    {
        $userId = Auth::user()->id;

        $presensi = Presensi::whereHas('code.usedBy', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
        // $presensi = Presensi::with('code.usedBy')->get();
        // dd($presensi);

        return view('data-report.riwayat', compact('presensi'));
    }
}
