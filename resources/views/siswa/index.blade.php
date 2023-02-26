@extends('layout.siswa')

@section('konten')
<div class="d-none">
    <h2>
        Data dlm bentuk json
    </h2>
    {{json_encode($data)}}
</div>

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
                <th>Foto</th>
                <th>Nomor Induk</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td><img style="max-width: 50px; max-height: 50px" src="{{ asset('storage/siswa/'.$item->foto) }}"></td>
                    <td>{{$item['nomor_induk']}}</td> {{-- atau cara lainnya $item->nomor_induk   --}}
                    <td>{{$item['nama']}}</td>
                    <td>{{$item['alamat']}}</td>
                    <td class="d-flex justify-between">
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
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{'/siswa/'.$item->nomor_induk}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection