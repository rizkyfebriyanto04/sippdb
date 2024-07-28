<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $title = 'Dashboard';

        $siswa = DB::table('siswa')->count();
        $siswajapres = DB::table('siswa')->where('jalurmasuk','=','japres')->count();
        $siswajasktm = DB::table('siswa')->where('jalurmasuk','=','jasktm')->count();
        $siswajaszon = DB::table('siswa')->where('jalurmasuk','=','jaszon')->count();

        $siswalk = DB::table('siswa')->where('objectjeniskelaminfk','=','1')->count();
        $siswapr = DB::table('siswa')->where('objectjeniskelaminfk','=','2')->count();

        $jumlah_ips_2 = DB::table('siswa')->where('objectjurusanfk','=','1')->count();
        $jumlah_ipa_2 = DB::table('siswa')->where('objectjurusanfk','=','2')->count();

        return view('home',compact('title','siswa','siswajapres','siswajasktm','siswajaszon','siswalk','siswapr','jumlah_ips_2', 'jumlah_ipa_2'));
    }
}
