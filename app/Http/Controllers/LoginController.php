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
            $nisn = $this->generateNisn();

            return view('login', compact('title','jk','jrs','nisn'));
        }
    }

    private function generateNisn()
    {
        $currentYear = date('y');
        $codePrefix = '16.010';


        $lastNisn = DB::table('siswa')
            ->where('nisn', 'like', "$currentYear.$codePrefix.%")
            ->orderByRaw('CAST(SUBSTRING_INDEX(nisn, ".", -1) AS UNSIGNED) DESC')
            ->value('nisn');


        $lastNumber = 0;
        if ($lastNisn) {
            $parts = explode('.', $lastNisn);
            if (isset($parts[3])) {
                $lastNumber = intval($parts[3]);
            }
        }

        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $newNisn = $currentYear . '.' . $codePrefix . '.' . $newNumber;

        return $newNisn;
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

