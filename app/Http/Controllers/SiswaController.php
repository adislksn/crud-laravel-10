<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $data = siswa::orderBy('nomor_induk', 'desc')->paginate(3);
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Session::flash('nama', $request->nama);
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('alamat', $request->alamat);

        $this->validate($request,[
            'nama'       => 'required',
            'nomor_induk'=> 'required|numeric',
            'alamat'     => 'required'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'nomor_induk.required' => 'NIM wajib diisi',
            'nomor_induk.numeric' => 'NIM berupa angka',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        siswa::create([
            'nama'        => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'alamat'      => $request->alamat
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dimasukkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
