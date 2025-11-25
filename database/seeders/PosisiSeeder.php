<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPosisi = [
            'Admisi Muda',
            'Ahli Teknologi Laboratorium Medis',
            'Asisten Perawat',
            'Bidan',
            'Cleaning Service',
            'Direktur',
            'Dokter Spesialis Dermatologi Dan Venereologi',
            'Dokter Spesialis Jantung Dan Pembuluh Darah',
            'Dokter Spesialis Mata',
            'Dokter Spesialis Neurologi',
            'Dokter Spesialis Obstetri Dan Ginekologi',
            'Dokter Spesialis Orthopaedi Dan Traumatologi',
            'Dokter Spesialis Penyakit Dalam',
            'Dokter Umum',
            'Dokter Umum (Sedang Cuti)',
            'Fisioterapi',
            'Ka.Bidang Keprawatan',
            'Ka.Bidang Pelayanan Medis Dan Jaminan Kesehatan',
            'Ka.Bidang Penunjang Medis',
            'Ka.Bidang SDM',
            'Ka.Instalasi Farmasi',
            'Ka.Instalasi Gawat Darurat',
            'Ka.Instalasi Gizi',
            'Ka.Instalasi High Care Unit',
            'Ka.Instalasi Kamar Bersalin',
            'Ka.Instalasi Kamar Bersalin',
        ];

        foreach ($dataPosisi as $posisi) {
            DB::table('pegawai_posisi')->insert([
                'kd_posisi' => Str::uuid(),
                'nm_posisi' => $posisi
            ]);
        }
    }
}
