<?php

namespace App\Http\Controllers;

use App\Models\DataUmum_Model;
use App\Models\Pemerintah_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemerintahController extends Controller
{
    public function index()
    {
        $kepdes = DB::table('pemerintah__models')->where('jabatan', "Kepala Desa")->first();
        $sekdes = DB::table('pemerintah__models')->where('jabatan', 'sekretaris desa')->first();
        $staf = DB::table('pemerintah__models')->where('type', 'staf')->get();
        $kepdus = DB::table('pemerintah__models')->where('type', "Kepala dusun")->get();
        $title = "Pemerintah Desa";
        $visi = DB::table('data_umum__models')->where('key', 'visi')->first();
        $misi = DB::table('data_umum__models')->where('key', 'misi')->first();
        $sejarah = DB::table('data_umum__models')->where('key', 'sejarah')->first();
        $perangkatDesa = DB::table('perangkat_desa')->get();

        return view('skripsi.pemerintah', [
            'title' => $title,
            'kepdes' => $kepdes,
            'sekdes' => $sekdes,
            'kepdus' => $kepdus,
            'staf'  => $staf,
            'visi' => $visi,
            'misi' => $misi,
            'sejarah' => $sejarah,
            'perangkatDesa' => $perangkatDesa
        ]);
        // return;
    }

    public function testing()
    {
        $staf = DB::table('pemerintah__models')->where('type', 'staf')->get();
        return $staf;
    }

    public function data_umum()
    {
        $data = Pemerintah_Model::all();
        return response()->json($data);
        // return 'haha kamu mau apa';
    }
}
