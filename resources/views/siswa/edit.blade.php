@extends('layout.siswa')

@section('konten')
<a href="{{ route('siswa.index') }}" class="d-flex justify-content-end"><button class="btn btn-primary">KEMBALI</button></a>
<form action="{{ route('siswa.update', $data->nomor_induk) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="{{$data['nama']}}" value="{{Session::get('nama')}}">
        <div class="form-text">We'll never share your name with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="nomor_induk" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nomor_induk" placeholder="{{$data['nomor_induk']}}" value="{{Session::get('nomor_induk')}}" disabled>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <textarea class="form-control" name="alamat" placeholder="{{$data['alamat']}}">{{Session::get('alamat')}}</textarea>
    </div>
    @if ($data->foto)
        <div class="mb-3">
            <img style="max-width: 80px; max-height: 80px" src="{{asset('storage/siswa/'.$data->foto)}}">
        </div>
    @endif
    <div class="mb-3">
        <input type="file" class="form-control" name="foto">
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection