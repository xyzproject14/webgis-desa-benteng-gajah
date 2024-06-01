<?php

namespace App\Http\Controllers;

use App\Models\Beranda_Model;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $data = Beranda_Model::all();
        return view('beranda_view', ['title' => 'Home', 'data' => $data]);
    }
}
