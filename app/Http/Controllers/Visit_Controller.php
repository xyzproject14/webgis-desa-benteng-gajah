<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit_model;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;

class Visit_Controller extends Controller
{
    //
    public function index()
    {

        $location = Visit_model::all();
        // $location = json_encode($data);
        // return $location;
        return view('skripsi/visit', ['assets' => ['title' => 'Pemerintahan Desa', 'assets' => 'maps'], 'location' => $location]);
    }

    public function visit_data()
    {
        $data = Visit_model::all();
        return json_encode($data);
    }



    public function search(Request $request)
    {
        if ($request->has('search')) {
            $location = Visit_model::where('location', 'LIKE', '%' . $request->search . '%')->first();
            return $location;

            // $location = Visit_model::all();
        } else {
            // $request->session()->flash('error', 'Data tidak ditemukan');
            // Session::flash('error', 'Data tidak ditemukan');
            // dd('data tidak ditemukan');
            return redirect('/testing');
        }

        // return json_encode($location);

        // return view('skripsi/visit', ['assets' => ['title' => 'Pemerintahan Desa', 'assets' => 'maps'], 'location' => $location]);
    }

    public function cari()
    {
        return ('uhuy');
    }

    public function quickSearch($value)
    {
        $data = new Visit_model();
        $result = $data->quickSearch($value);
        return $result;
    }

    public function hasil_pencarian()
    {
        $data = Visit_model::all()->pluck('location')->toArray();
        return $data;
    }
}
