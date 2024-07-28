<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect ('home');
        }
        else {
            $title = 'My App Pos';
            $jk = DB::table('jeniskelamin')
                ->get();
            $jrs = DB::table('jurusan')
                ->get();
            return view('login', compact('title','jk','jrs'));
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            return redirect('home');
        }
        else {
            // return 'test2';
            Session::flash('error','Email Atau Password salah.');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}

