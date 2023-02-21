@extends('layout.aplikasi')

@section('meta')
    <meta name="author" content="adi sulaksono" />
    <title>{{ $judul }}</title>
@endsection

@section('konten')
    <h1>
        Oke ini halaman kontak
    </h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio tempore quas, nam repellendus perferendis at facere omnis modi esse dolorum accusantium veritatis architecto velit ipsa, nulla, facilis eligendi asperiores blanditiis!
    </p>
    <p>
        <ul>
            <li>
                Email : {{ $kontak['email'] }}
            </li>
            <li>
                Instagram : 
                <a href={{ $kontak['instagram'] }} target="_blank">
                    {{ parse_url($kontak['instagram'], PHP_URL_HOST) }}
                </a>
            </li>
        </ul>
    </p>
@endsection