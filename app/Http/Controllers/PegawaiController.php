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

        $request->validate([
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

    public function editPegawai($nip) {
        $data['pegawai'] = Pegawai::where('nip', $nip)->get();

        return view('pegawai.edit-pegawai', $data);
    }

    public function updatePegawai(Request $request, $nip) {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);
        
        Pegawai::where('nip', $nip)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect('pegawai');
    }
}
