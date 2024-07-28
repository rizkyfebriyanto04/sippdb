<?php

namespace App\Http\Controllers;

use App\Models\Siswa_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function daftar(Request $request)
    {
        // return $request;
        $request->validate([
            'nisn' => 'required',
            'nissmp' => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamatpesertadidik' => 'required',
            'tgllahir' => 'required',
            'asalsekolah' => 'required',
            'jurusan' => 'required',
            'notelepon' => 'required',
            'alamatsekolah' => 'required',
            'exampleRadios' => 'required',
            'ketjalur' => 'required',
        ]);

        $siswa = new Siswa_model([
            'nisn' => $request->nisn,
            'nis' => $request->nissmp,
            'namalengkap' => $request->namalengkap,
            'objectjeniskelaminfk' => $request->jeniskelamin,
            'alamat' => $request->alamatpesertadidik,
            'tgllahir' => $request->tgllahir,
            'asalsekolah' => $request->asalsekolah,
            'objectjurusanfk' => $request->jurusan,
            'notelp' => $request->notelepon,
            'alamatsekolah' => $request->alamatsekolah,
            'jalurmasuk' => $request->exampleRadios,
            'ketjalurmasuk' => $request->ketjalur,

        ]);

        $siswa->save();

        return redirect('/')->with('success', 'Data Siswa Terdaftar');
    }

    public function index(){
        // $siswas = Siswa_model::all();
        // return $siswas;
        $data = DB::table('siswa as sm')
                ->Join('jeniskelamin as jk', 'jk.id', '=', 'sm.objectjeniskelaminfk')
                ->Join('jurusan as jm', 'jm.id', '=', 'sm.objectjurusanfk')
                ->get();
        // return $data;
        return view('daftar_siswa', compact('data'));
    }

    public function carisiswa(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('siswa as sm')
                ->join('jeniskelamin as jk', 'jk.id', '=', 'sm.objectjeniskelaminfk')
                ->join('jurusan as jm', 'jm.id', '=', 'sm.objectjurusanfk')
                ->where('sm.namalengkap', 'like', '%'.$cari.'%')
                ->get();

        if ($data->count() == 1) {
            return view('detail_siswa', compact('data'))->with('success', 'Data Siswa Terdaftar');
        } else {
            return redirect('/')->with('error', 'Data tidak Terdaftar');
        }
    }

}
