<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{
    public function index()
    {
        $codes = Code::latest()->get();
        return view('data-code.index', compact('codes'));
    }

    public function store()
    {
        $code = Str::random(8);

        // dd($code);

        Code::create([
            'code' => $code,
            'id_coder' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Code berhasil di-generate: ' . $code);
    }
}
