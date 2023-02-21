<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index():View
    {
        // $data = siswa::all();
        // $data = siswa::orderBy('nomor_induk', 'desc')->get();
        $data = siswa::orderBy('nomor_induk', 'desc')->paginate(2);
        return view('siswa.index')->with('data', $data);
    }
    public function detail($id)
    {
        // return "<h1>Coba controller dengan $id</h1>";
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa.detail')->with('data', $data);
    }
}
