<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- datatable css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    {{-- content --}}
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col d-flex justify-content-between">
                                <h3>Data Pegawai</h3>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg> Tambah Data Pegawai
                                </button>
                                {{-- <a href="/pegawai/tambah-pegawai" class="btn  btn-success">Tambah data</a> --}}

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                
                                <tr class="table-success">
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Data Input</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $p)
                                <tr>
                                    <td>{{$p->nip}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->jabatan}}</td>
                                    <td>{{$p->jk}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>{{$p->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a href="/pegawai/ubah-data/{{$p->nip}}"><span class="badge text-bg-success">Ubah</span></a>
                                        <form method="POST" action="/pegawai/hapus-data/{{$p->nip}}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Anda yakin ingin meghapus data?')"class="badge text-bg-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal add data --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pegawai</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input required type="text" class="form-control" value="{{old('nip')}}" name="nip" id="nip">
                                    <div class="invalid-feedback">Please enter your username.</div>
                                    @if ($errors->has('nip'))
                                        <span class="text-danger">{{ $errors->first('nip') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input required type="text" class="form-control" value="{{old('nama')}}" name="nama" id="nama">
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" value="{{old('jabatan')}}" name="jabatan" id="jabatan">
                                    @if ($errors->has('jabatan'))
                                        <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" value="Laki-laki" id="l" checked>
                                                <label class="form-check-label" for="l">
                                                    Laki-laki
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" value="Perempuan" id="p" >
                                                <label class="form-check-label" for="p">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn form-control btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    @include('sweetalert::alert')

    {{-- datatable --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                // scrollY: '200px',
                // scrollCollapse: true,
                // paging: false,
                order: [[5, 'desc']],
            });
        });
    </script>
  </body>
</html>