<?php

namespace Database\Seeders;

use App\Models\PerangkatDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labels = [
            'Staff Umum',
            'Staff Inti',
            'Kepala Dusun'
        ];

        $data = array_map(function($label){
            return['label' => $label];
        }, $labels);

        DB::table('perangkat_desa')->insert($data);
    }
}
