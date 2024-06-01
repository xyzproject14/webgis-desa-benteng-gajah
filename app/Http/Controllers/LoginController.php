<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        // 'username' => 'requ'
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required']
        // ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        // return $data;
        $status = User::checkingData($data);

        if ($status == false) {
            return back()->with('loginError', 'Login Failed!!');
        } else {
            $admin = User::where('username', $data['username'])->first();

            session(['admin' => TRUE]);
            session(['admin_name' => $request->input('username')]);
            if ($status == 'superadmin') {
                session(['superadmin' => TRUE]);
                session(['admin_name' => $request->input('username')]);
            }
            session(['admin_id' => $admin->id]);
            return redirect('dashboard');
            // return session()->get('admin_id');
        }

        // if ($status) {
        //     session(['status' => 'admin']);
        //     return redirect('/beranda-admin');
        // } else {
        //     return back()->with('loginError', 'Login Failed!!');
        // }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    public function testing()
    {
        return 'hello ' . session('status');
    }
}
