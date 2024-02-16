<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('master_programs')->insert([
            [
                'nomor_rekening' => '2.16.01',
                'nama_program' => 'Program Penunjang Urusan Pemerintah Daerah Kabupaten/Kota',
                'tahun' => '2022'
            ],

            [
                'nomor_rekening' => '2.16.02',
                'nama_program' => 'Program Pengelolaan Informasi dan Komunikasi Publik',
                'tahun' => '2022'
            ],

            [
                'nomor_rekening' => '2.16.03',
                'nama_program' => 'Program Pengelolaan Aplikasi Informatika',
                'tahun' => '2022'
            ],

            [
                'nomor_rekening' => '2.20.02',
                'nama_program' => 'Program Penyelenggaraan Statistik Sektoral',
                'tahun' => '2022'
            ],

            [
                'nomor_rekening' => '2.21.02',
                'nama_program' => 'Program Penyelenggaraan Persandian untuk Keamanan Informasi',
                'tahun' => '2022'
            ],

            
        ]);
    }
}
