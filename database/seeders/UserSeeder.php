<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'ドルベ',
            'email'=>'barian@books',
            'password'=>Hash::make('sirokitate'),
            'created_at'=>'2022/01/01 00:01:02'
            ]);
    }
}
