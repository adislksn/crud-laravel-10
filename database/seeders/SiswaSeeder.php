<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nama'=>'Adi',
            'nomor_induk'=>'120140038',
            'alamat'=>'Lampung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'Afi',
            'nomor_induk'=>'120140022',
            'alamat'=>'Lampung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'Kwinny',
            'nomor_induk'=>'120140036',
            'alamat'=>'Lampung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
