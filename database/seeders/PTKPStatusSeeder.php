<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PTKPStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPTKP = [
            ['id' => 'K/0', 'nm_ptkp' => 'kawin dan tidak ada anak'],
            ['id' => 'K/1', 'nm_ptkp' => 'kawin dan 1 anak'],
            ['id' => 'K/2', 'nm_ptkp' => 'kawin dan 2 anak'],
            ['id' => 'K/3', 'nm_ptkp' => 'kawin dan 3 anak'],
            ['id' => 'TK/0', 'nm_ptkp' => 'tidak kawin dan tidak ada anak'],
            ['id' => 'TK/1', 'nm_ptkp' => 'tidak kawin dan 1 anak'],
            ['id' => 'TK/3', 'nm_ptkp' => 'tidak kawin dan 3 anak'],
        ];

        foreach ($dataPTKP as $dp) {
            DB::table('ptkp_stts_anak')->insert([
                'kd_ptkp' => $dp['id'],
                'nm_ptkp' => $dp['nm_ptkp']
            ]);
        }
    }
}
