<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $time = Carbon::now();
        $kelas = Kelas::all();
        $materi = Materi::all();
        $used_code = Code::where('id_code_user', $user->id)->latest()->first();

        if ($used_code) {
            $presensi = Presensi::where('id_code', $used_code->id)->whereNull('end_time')->latest()->first();
        } else {
            $presensi = null;
        }

        // dd($used_code);

        $unused_code = Code::where('id_coder', $user->id)->where('id_code_user', null)->get();
        // dd($presensi);

        return view('dashboard.index', compact('user', 'time', 'kelas', 'materi', 'unused_code', 'presensi'));
    }

    public function check_in(Request $request)
    {
        $user = Auth::user();
        $code = Code::where('code', $request->code)->first();

        $today = Carbon::now()->timezone('Asia/Jakarta');
        // dd($code);

        // dd($today);

        if ($code->id_coder !== $user->id) {
            Presensi::create([
                'id_code' => $code->id,
                'id_class' => $request->kelas,
                'id_material' => $request->materi,
                'teaching_role' => $request->teaching_role,
                'start_time' => $today,
            ]);

            Code::where('id', $code->id)->update([
                'id_code_user' => $user->id
            ]);

            return redirect()->back()->with('check', 'Berhasil Check IN');
        } else {
            return redirect()->back()->with('error', 'Anda harus memasukkan code dari Admin, Staf, atau PJ');
        }
    }

    public function check_out($id)
    {
        $today = Carbon::now();
        $presensi = Presensi::findOrFail($id);
        $checkinTime = Carbon::parse($presensi->start_time);
        $checkoutTime = $today;
        $duration = $checkoutTime->diffInMinutes($checkinTime);

        // dd($duration);

        $presensi->update([
            'end_time' => $today,
            'duration' => $duration

        ]);

        return redirect()->back()->with('check', 'Berhasil Check OUT');
    }
}
