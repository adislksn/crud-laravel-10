<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){ 
        return view('sesi.index');
    }
    function login(Request $request):RedirectResponse{

        $this->flash($request);
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ],[
            'email.required'    => 'Alamat email wajib diisi',
            'password.required'    => 'Password wajib diisi',
        ]);
        
        $infologin = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('siswa')->with('succes','berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username atau password tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }

    function register()
    {
        return view('sesi.register');
    }

    function create(Request $request)
    {
        $this->flash($request);
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ],[
            'name.required'         => 'Nama wajib diisi',
            'email.required'        => 'Alamat email wajib diisi',
            'email.email'           => 'Email anda tidak valid',
            'email.unique'          => 'Email anda sudah pernah dipakai',
            'password.required'     => 'Password wajib diisi',
            'password.min'          => 'Minimum password adalah 6 karakter',
        ]);

        $data = [
            'name'  => $request->name,
            'email'  => $request->email,
            'password'  => Hash::make($request->password)
        ];

        User::create($data);
        
        $infologin = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('siswa')->with('succes',Auth::user()->name .'berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username atau password tidak valid');
        }
    }

    private function flash($data)
    {
        Session::flash('name', $data->name);
        Session::flash('email', $data->email);
        Session::flash('password', $data->password);
    }
}
