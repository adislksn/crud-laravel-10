@extends('layout.siswa')

@section('konten')
<a href="{{ route('siswa.index') }}" class="d-flex justify-content-end"><button class="btn btn-primary">KEMBALI</button></a>
    <div>
        <div class="w-25 h-25">
            <img class="card-img" src="{{ asset('storage/siswa/'.$data->foto) }}" >
        </div>
        <h1>
            {{$data['nama']}}
        </h1>
        <p>
            NIM : {{$data['nomor_induk']}}
        </p>
        <p>
            Alamat : {{$data['alamat']}}
        </p>
    </div>
@endsection