<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $assets = 'maps';
        return view('content/sidebar', ['assets' => ['assets' => $assets, 'title' => 'Maps']]);
    }
}
