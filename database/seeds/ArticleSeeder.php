<?php

use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'title' => '記事投稿テスト',
            'description' => 'デプロイ後の投稿テストです。',
            'image' => 'rhetw46j',
            'hash1_id' => 'ハッシュ1',
            'hash2_id' => 'ハッシュ2',
            'hash3_id' => 'ハッシュ3',
            'created_at' => '2020-10-16 06:28:50',
        ];
        DB::table('articles')->insert($param);

        // $param = [
        //     'user_id' => 1,
        //     'title' => '【Unity】コルーチンの使い方を５つの例で紹介！',
        //     'description' => '説明2',
        //     'image' => 'rhetw46j',
        //     'hash1_id' => 'ハッシュ4',
        //     'hash2_id' => 'ハッシュ2',
        //     'hash3_id' => 'ハッシュ3',
        //     'created_at' => '2020-10-17 06:28:50',
        // ];
        // DB::table('articles')->insert($param);
    }
}
