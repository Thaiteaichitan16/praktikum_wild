<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function utama(){
        $siswa = new SiswaModel();
        return view('siswa',['datasiswa'=>$siswa->all()]);
    }

    public function tambah(){
        return view('tambahsiswa');
    }

    public function simpan(Request $request){
        $siswa = new SiswaModel();
        $validasi = $request->validate([
            'nisn'=>'required|unique:tb_siswa',
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'kode_kelas'=>'required',
        ]);
        
        $siswa->create($request->all());
        return redirect('siswa')->with('pesan','Data Berhasil di simpan');
    }
    
    public function edit($nisn){
        $siswa = new SiswaModel();
        return view('editsiswa',['datasiswa'=>$siswa->find($nisn)]);
    }
    public function update(Request $request,$nisn){
        $validasi = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'kode_kelas'=>'required',
        ]);
        
        $siswa = new SiswaModel();
        $siswa = $siswa->find($nisn)->update($request->all());;
       
        return redirect('siswa');
    }

    public function hapus($nisn){
        $siswa = new SiswaModel();
        $siswa = $siswa->find($nisn);
        $siswa->delete();
        return redirect('siswa');
    }
}
