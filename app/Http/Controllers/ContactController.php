<?php

namespace App\Http\Controllers;

use App\Models\Contact_model;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $data = Contact_model::all();
        return view('skripsi.contact', ['title' => 'Potensi Desa', 'data' => $data]);
    }
}
