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
            [
                'id'=>1,
            'name'=>'ドルベ',
            'email'=>'barian@books',
            'comment' => 'バリアンの白き盾!',
            'prefecture'=>'京都府舞鶴市浜町5-3',
            'password'=>Hash::make('sirokitate'),
            'created_at'=>'2022/01/01 00:01:02'
            ],
            ['id'=>2,
            'name'=>'たたく人',
            'email'=>'keyboard@tatakuyo',
            'comment' => 'キーボードクラッシャー',
            'prefecture'=>'山形県米沢市駅前一丁目1-43',
            'password'=>Hash::make('kowasuyo'),
            'created_at'=>'2021/12/01 00:01:02'
            ]
        ]);
    }
}
