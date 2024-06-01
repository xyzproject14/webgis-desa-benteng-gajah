<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home_Model;

class Home extends Controller
{
    public function index()
    {

        $assets = [
            'assets' => 'landing_page',
            'title' => 'Home'
        ];
        $data = Home_Model::index();
        return view('content/petaPotensi', ['data' => $data, 'assets' => $assets]);
        // return view('index');
    }
}
