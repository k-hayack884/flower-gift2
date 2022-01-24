<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'user_id'=>1,
            'secondary_category_id'=>1,
            'img'=>'computer_keyboard_yatsuatari_businessman.png',
            'name'=>'キーボードクラッシャー',
            'comment'=>'ダミーデータです',
            'status' => '0',
            ]
        );
    }
}
