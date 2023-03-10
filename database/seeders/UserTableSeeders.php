<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'      => 'Adi',
            'email'     => 'adi@gg.com',
            'password'  => Hash::make('adiaja'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
