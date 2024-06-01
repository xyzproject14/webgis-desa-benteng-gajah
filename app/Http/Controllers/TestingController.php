<?php

namespace App\Http\Controllers;

use App\Models\Visit_model;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    //
    public function index()
    {
        return view('sementara/testing');
    }

    public function getTestingData()
    {
        $data = Visit_model::all();
        return $data;
    }

    public function promise()
    {
        $data = 100;
        return view('sementara/testing', ['data' => $data]);
    }



    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png'
        ]);

        $file = $request->file('file');
        $path = $file->storeAs('public/assets/data_spasial/output', $file->getClientOriginalName());

        $fileUrl = asset($path);

        return 'url : ' . $fileUrl;

        // return 'data berhasil disimpan';
    }

    public function testing2()
    {
        return view('sementara/testing2', ['title' => 'testing2']);
    }

    // public function convertFile()
    // {
    //     $inputFile = 'assets/data_spasial/input/data.xlsx';
    //     $outputFile = 'assets/data_spasial/output/data.csv';
    //     $spreadsheet = IOFactory::load($inputFile);
    //     $writer = IOFactory::createWriter($spreadsheet, 'Csv');
    //     $writer->setDelimiter(',');
    //     $writer->setEnclosure('"');
    //     $writer->setLineEnding("\r\n");
    //     $writer->save($outputFile);
    // }
    public function nama()
    {
        return 'hai';
    }
    public function panggil()
    {
        return action([TestingController::class, 'nama']);
    }

    public function quickSearch($value)
    {
        $model = new Visit_model();
        $data = $model->quickSearch($value);
        return $data;
    }

    public function sebaranKabupaten()
    {
        return view('sementara.testing-kabupaten', ['assets' => ['title' => 'Pemerintahan Desa', 'assets' => 'maps'], 'location' => 'anjyu', 'title' => 'ell']);
    }
}
