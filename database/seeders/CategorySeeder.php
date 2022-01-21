<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '洋ラン',
                'sort_order' => 1,
            ],
            [
                'name' => 'アジサイ',
                'sort_order' => 2,
            ],
            [
                'name' => 'シクラメン',
                'sort_order' => 3,
            ],
            [
                'name' => '観葉植物',
                'sort_order' => 4,
            ],
            [
                'name' => '多肉植物',
                'sort_order' => 5,
            ],
            [
                'name' => '球根植物',
                'sort_order' => 6,
            ],
            [
                'name' => 'フラワースタンド',
                'sort_order' => 7,
            ],
            [
                'name' => 'その他',
                'sort_order' => 8,
            ],

        ]);
        DB::table('secondary_categories')->insert([
            [
                'name' => '胡蝶蘭',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'シンビジューム',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'カトレア',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => 'その他洋ラン',
                'sort_order' => 4,
                'primary_category_id' => 1
            ],
            [
                'name' => 'アジサイ',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'シクラメン',
                'sort_order' => 6,
                'primary_category_id' => 3
            ],
            [
                'name' => 'ガーデンシクラメン',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'アンスリウム',
                'sort_order' => 8,
                'primary_category_id' => 4
            ],
            [
                'name' => 'モンステラ',
                'sort_order' => 9,
                'primary_category_id' => 4
            ],
            [
                'name' => 'ガジュマル',
                'sort_order' => 10,
                'primary_category_id' => 4
            ],
            [
                'name' => 'パキラ',
                'sort_order' => 11,
                'primary_category_id' => 4
            ],
            [
                'name' => 'その他観葉植物',
                'sort_order' => 12,
                'primary_category_id' => 4
            ],
            [
                'name' => 'サボテン',
                'sort_order' => 13,
                'primary_category_id' => 5
            ],
            [
                'name' => 'カランコエ',
                'sort_order' => 14,
                'primary_category_id' => 5
            ],
            [
                'name' => 'その他多肉植物',
                'sort_order' => 15,
                'primary_category_id' => 5
            ],
            [
                'name' => 'チューリップ',
                'sort_order' => 16,
                'primary_category_id' => 6
            ],
            [
                'name' => 'カラー',
                'sort_order' => 17,
                'primary_category_id' => 6
            ],
            [
                'name' => 'ヒヤシンス',
                'sort_order' => 18,
                'primary_category_id' => 6
            ],
            [
                'name' => 'その他球根植物',
                'sort_order' => 19,
                'primary_category_id' => 6
            ],
            [
                'name' => '寄せ植え',
                'sort_order' => 20,
                'primary_category_id' => 7
            ],
            [
                'name' => 'その他',
                'sort_order' => 21,
                'primary_category_id' => 8
            ],



        ]);
    }
}
