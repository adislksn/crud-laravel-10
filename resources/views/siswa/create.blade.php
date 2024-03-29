@extends('layout.siswa')

@section('konten')
<a href="{{ route('siswa.index') }}" class="d-flex justify-content-end"><button class="btn btn-primary">KEMBALI</button></a>
<form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" value="{{Session::get('nama')}}">
        <div class="form-text">We'll never share your name with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="nomor_induk" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nomor_induk" value="{{Session::get('nomor_induk')}}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <textarea class="form-control" name="alamat">{{Session::get('alamat')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">NIM</label>
        <input type="file" class="form-control" name="foto" value="{{Session::get('foto')}}">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection