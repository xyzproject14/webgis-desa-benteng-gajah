<?php

namespace Database\Seeders;

use App\Models\Potensi_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Potensi_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Potensi_model::creperate([
            'potensi' => 'ubi kayu',
            'pemilik' => 'sakeang',
            'luas_lahan' => 50,
            'file_name' => 'ubi-kayu-sakeang.json',
            'color' => 'brown'
        ]);
    }
}
