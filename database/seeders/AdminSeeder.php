<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'ナッシュ',
            'email'=>'barian@shark',
            'password'=>Hash::make('mazikkukonbo'),
            'created_at'=>'2022/01/01 00:01:01'
            ]);
    }
}
