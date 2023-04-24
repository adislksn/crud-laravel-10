<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data MBD - Query Optimization</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Query Optimization Pada Pagination</h3>
                    {{-- <h5 class="text-center"><a href="https://adislksn.github.io">www.adislksn.github.io</a></h5>          --}}
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('mbd.create') }}" class="btn btn-md btn-success mb-3">TAMBAH USER</a>
                                <a href="{{ route('mbd.index') }}" class="btn btn-md btn-danger mb-3">RESET LIMIT</a>
                            </div>
                            <div class="col">
                                <form action="{{route('mbd.store')}}" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <label for="date" class="col-form-label col">
                                                Created From
                                            </label>
                                            <div class="col">
                                                <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="date" class="col-form-label col">
                                                Created To
                                            </label>
                                            <div class="col">
                                                <input type="date" class="form-control input-sm" id="toDate" name="toDate" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success m-2" name="search" title="search"><img src="https://img.icons8.com/android/search" class="w-25"/></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead class="">
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">NomorHP</th>
                                <th scope="col">Gol. Darah</th>
                                <th scope="col">Riwayat Penyakit</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($users_pplk as $user)
                                <tr>
                                    {{-- <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">
                                    </td> --}}
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->nim }}</td>
                                    <td>{{ $user->instagram }}</td>
                                    <td>{{ $user->prodi }}</td>
                                    <td>{{ $user->nomorHp }}</td>
                                    <td>{{ $user->golonganDarah }}</td>
                                    <td>{{ $user->riwayatPenyakit }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mbd.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('mbd.show', $user->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('mbd.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                            </table>  
                            {{ $users_pplk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> -->

</body>
</html>