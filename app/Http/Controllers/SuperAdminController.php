<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        return view('skripsi.admin.superadmin.kelola-admin', ['title' => 'Dashboard Super Admin', 'data' => $data]);
    }

    public function create_admin(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');

        $data = array('username' => $username, 'email' => $email, 'password' => $password, 'status' => $status);
        DB::table('users')->insert($data);

        return back();
    }

    public function getAdminData($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        // return $request['id-edit'];
        DB::table('users')->where('id', $request['id-edit'])->update([
            'username' => $request['username-edit'],
            'email' => $request['email-edit'],
            'password' => $request['password-edit'],
            'status' => $request['status-edit'],
        ]);

        return back();
    }

    public function delete($id)
    {
        $record = User::find($id);

        if (!$record) {
            return 'Data tidak ditemukan';
        }

        $record->delete();
        return back();
        // return $id;
    }
}
