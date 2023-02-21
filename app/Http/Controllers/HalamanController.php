<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index():View
    {
        $judul = 'Halaman Depan';
        return view('page.index')->with('halaman_judul', $judul);
    }
    
    public function tentang():View
    {
        return view('page.tentang');
    }
    
    public function kontak():View
    {
        $data = [
            'judul'=>'Halaman Kontak',
            'kontak' => [
                'email'=>'adislksn@gmail.com',
                'instagram'=>'https://www.instagram.com/adislksn'
            ]
            ];
        return view('page.kontak')->with($data);
    }
}
