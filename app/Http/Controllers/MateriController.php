<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Materi::all();
        return view('data-materi.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-materi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'materi' => 'required|string|max:255'
        ]);

        Materi::create($validatedData);

        return redirect()->route('data-materi.index')->with('success', "Materi telah ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $data_materi)
    {
        // dd($data_materi);
        return view(
            'data-materi.edit',
            compact('data_materi')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $data_materi)
    {
        $validatedData = $request->validate([
            'materi' => 'required|string|max:255'
        ]);

        Materi::where('id', $data_materi->id)->update($validatedData);

        return redirect()->route('data-materi.index')->with('success', "Materi telah diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $data_materi)
    {
        // dd($data_materi);
        $data_materi->delete();

        return redirect()->route('data-materi.index')->with('success', "Materi telah dihapus");
    }
}
