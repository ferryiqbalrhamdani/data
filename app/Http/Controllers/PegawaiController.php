<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        $data['pegawai'] = Pegawai::all();
        return view('pegawai.index', $data);
    }

    public function tambahPegawai() {
        return view('pegawai.tambah-pegawai');
    }

    public function storePegawai(Request $request) {
        $data = $request->all();

        $validatedData = $request->validate([
            'nip' => 'required|unique:pegawai|numeric:6',
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect('pegawai');
    }
}
