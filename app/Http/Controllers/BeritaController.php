<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::with('author')->get();
        return view('skripsi.berita', ['berita' => $berita, 'title' => 'Berita Desa']);
    }

    public function berita(){
        $berita = Berita::with('author')->get();
        return view();
    }
}
