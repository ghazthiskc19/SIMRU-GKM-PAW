<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // function untuk session login
    public function login_mahasiswa(Request $request)
    {
        $email = $request->email; // input amail
        $password = $request-> password; // input pswd
        $path = storage_path('app/users.json'); // file json (db)
        
        if (!file_exists($path)) {
            return back()->with('error', 'File not found');
        }

        $users = json_decode(file_get_contents($path), true);

        foreach($users as $user) {
            // cek data di json (db)
            if ($user['email'] == $email && $user['password'] == $password){

                // simpan session
                Session::put('user', $user);
                
                // simpan log login
                $log_path = storage_path('app/login_log.json');
                $log = [];

                if (file_exists($log_path)){
                    $log = json_decode(file_get_contents($log_path), true);
                }

                $log[] = [
                    "email" => $email,
                    "role" => $user['role'],
                    "login_time" => now()-> toDateTimeString()
                ];

                file_put_contents($log_path, json_encode($log, JSON_PRETTY_PRINT));

                return redirect()-> route('home');
            }   
        }
       
    }

    // function kasih session ke laman home
    public function home()
    {
        $user = Session::get('user');
        if (!$user){
            return redirect()-> route('login');
        }

        return view('home', compact('user'));
    }

    // function kasih session ke laman menu mahasiswa
    public function menu_mahasiswa()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login_mahasiswa');
        }

        return view('menu_mahasiswa', compact('user'));
    }

    // function kasih session ke laman profile mahasigma
    public function profile_mahasiswa()
    {

        $user = session('user');
        if (!$user) {
            return redirect()->route('login_mahasiswa');
        }

        return view('profile_mahasiswa', compact('user'));
    }
}
