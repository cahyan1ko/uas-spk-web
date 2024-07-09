<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Niko',
            'email'=>'niko@gmail.com',
            'password'=>Hash::make('halo1234')
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'level' => 'admin',
            'password'=>Hash::make('admin123')
        ]);
    }
}
