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
                'id'=>1,
            'user_id'=>1,
            'secondary_category_id'=>1,
            'img'=>'computer_keyboard_yatsuatari_businessman.png',
            'name'=>'キーボードクラッシャー',
            'comment'=>'ダミーデータです',
            'status' => '1',
            'trade_type' => '0',
            'address' => '兵庫県三木市末広1-1-4',
            'created_at' => '2022/01/01 00:01:01',
            'updated_at' => '2022/01/01 00:01:01'

            ]
        );
    }
}
