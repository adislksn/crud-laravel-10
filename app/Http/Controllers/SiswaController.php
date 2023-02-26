<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $this->flash($request);
        try{
        $this->validate($request,[
            'nama'       => 'required',
            'nomor_induk'=> 'required|numeric',
            'alamat'     => 'required',
            'foto'       => 'required|mimes:jpeg,jpg,png,gif'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'nomor_induk.required' => 'NIM wajib diisi',
            'nomor_induk.numeric' => 'NIM berupa angka',
            'alamat.required' => 'Alamat wajib diisi',
            'foto.required' => 'Silahkan input foto',
            'foto.mimes' => 'Format file tidak didukung'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/siswa', $foto->hashName());
        siswa::create([
            'nama'        => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'alamat'      => $request->alamat,
            'foto'        => $foto->hashName()
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dimasukkan');
        }catch(QueryException $e){
            // Check if the error is due to a duplicate entry on siswa_nomor_induk_unique
            if ($e->errorInfo[1] == 1062) {
                // Redirect the user back to the form page with an error message
                return redirect()->back()->withInput()->withErrors(['nomor_induk' => 'NIM sudah pernah diinputkan']);
            } else {
                // If it's a different error, re-throw the exception
                throw $e;
        }
        }
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
    public function edit(string $id):View
    {
        $data = siswa::where('nomor_induk', $id)->first();
        $this->flash($data);
        return view("siswa.edit")->with('data', $data);
    }

    /**
     * @param  mixed $request
     * @param  mixed $id
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $this->validate($request,[
            'nama'       => 'required',
            'alamat'     => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi',
            'nomor_induk.numeric' => 'NIM berupa angka',
            'alamat.required' => 'Alamat wajib diisi',
            'foto.mimes' => 'Format file tidak didukung'
        ]);

        $data = siswa::where('nomor_induk', $id)->first();
        //check if image is uploaded
        if ($request->hasFile('foto')) {
            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/siswa', $foto->hashName());

            //delete old image
            Storage::delete('public/siswa/'.$data->foto);

            //update post with new image
            $data->update([
                'nama'          => $request->nama,
                'alamat'        => $request->alamat,
                'foto'          => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'nama'          => $request->nama,
                'alamat'        => $request->alamat,
            ]);
        }
        return redirect()->route('siswa.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $siswa = siswa::where('nomor_induk', $id)->first();
        Storage::delete('public/siswa/'.$siswa->foto);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', "Data berhasil dihapus");
    }

    private function flash($data)
    {
        Session::flash('nama', $data->nama);
        Session::flash('nomor_induk', $data->nomor_induk);
        Session::flash('alamat', $data->alamat);
    }
}
