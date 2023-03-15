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
                                <a href="/pegawai/tambah-pegawai" class="btn  btn-success">Tambah data</a>

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
                                        <a href=""><span class="badge text-bg-danger">Hapus</span></a>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

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