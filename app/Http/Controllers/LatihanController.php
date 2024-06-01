<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit_model;

class LatihanController extends Controller
{


    public function sidebar()
    {
        return view('sementara/testSidebar');
    }

    public function index()
    {
        return view('json');
    }

    public function json()
    {
        $data = Visit_model::all();
        return json_encode($data);
    }
}
