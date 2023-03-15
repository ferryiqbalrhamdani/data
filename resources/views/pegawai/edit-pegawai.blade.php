<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    {{-- content --}}
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-5 ">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Ubah Data Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            @foreach ($pegawai as $p)
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input readonly type="text" class="form-control" value="{{$p->nip}}" name="nip" id="nip">
                                        @if ($errors->has('nip'))
                                            <span class="text-danger">{{ $errors->first('nip') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" value="{{$p->nama}}" name="nama" id="nama">
                                        @if ($errors->has('nama'))
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" value="{{$p->jabatan}}" name="jabatan" id="jabatan">
                                        @if ($errors->has('jabatan'))
                                            <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="jk" class="form-label">Jenis Kelamin</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" value="Laki-laki" id="l" @if($p->jk == 'Laki-laki') checked @endif>
                                                    <label class="form-check-label" for="l">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan" id="p" @if($p->jk == 'Perempuan') checked @endif>
                                                    <label class="form-check-label" for="p">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$p->alamat}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn form-control btn-primary">Ubah</button>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/pegawai">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>