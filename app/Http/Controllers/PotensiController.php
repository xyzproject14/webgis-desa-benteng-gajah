<?php

namespace App\Http\Controllers;

use App\Models\Potensi_model;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    //
    public function index()
    {   
        return view('sementara.pemetaan', ['title' => 'Pemetaan Desa']);
    }

    public function data_potensi()
    {
        $data = Potensi_model::all();
        return view('skripsi.data-potensi', ['title' => 'Potensi Desa', 'data' => $data]);
    }
}
