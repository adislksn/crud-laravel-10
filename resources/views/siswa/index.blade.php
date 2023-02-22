@extends('layout.siswa')

@section('konten')
    <h2>
        Data dlm bentuk json
    </h2>
    {{json_encode($data)}}

    <h2>
        Data dalam bentuk table
    </h2>
    <a href="{{ url('/siswa/create') }}">
        <button class="btn btn-secondary">
            Tambah Data +
        </button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item['nomor_induk']}}</td> {{-- atau cara lainnya $item->nomor_induk   --}}
                    <td>{{$item['nama']}}</td>
                    <td>{{$item['alamat']}}</td>
                    <td>
                        <a href="{{ url('/siswa/'.$item['nomor_induk']) }}">
                            <button type="button" class="btn btn-primary btn-sm">
                                Detail
                            </button>
                        </a>
                        <a href="{{ url('/siswa/'.$item['nomor_induk'].'/edit') }}">
                            <button type="button" class="btn btn-warning btn-sm">
                                Edit
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection