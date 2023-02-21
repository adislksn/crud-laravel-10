@extends('layout.siswa')

@section('konten')
    <div>
        <h1>
            {{$data['nama']}}
        </h1>
        <p>
            NIM : {{$data['nomor_induk']}}
        </p>
        <p>
            Alamat : {{$data['alamat']}}
        </p>
        <a href="{{ url('/siswa') }}">
            <button type="button" class="btn btn-secondary">
                Kembali
            </button>
        </a>
    </div>
@endsection