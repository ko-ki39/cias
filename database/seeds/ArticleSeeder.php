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
            'title' => '内臓が溶ける！？実は危険な市販薬５選！',
            'description' => 'こんにちは、皆さん！　元気ですか！？<br>ストレス社会が加速するこのご時世、なかなか気力を保つことは難しいと思います。そんな皆さんに、お医者さんから処方してもらえる、元気が出るお薬を紹介します。(合法)',
            'image' => 'rhetw46j',
            'hash1_id' => 'ハッシュ1',
            'hash2_id' => 'ハッシュ2',
            'hash3_id' => 'ハッシュ3',
            'created_at' => '2020-10-16 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 1,
            'title' => '【Unity】コルーチンの使い方を５つの例で紹介！',
            'description' => '説明2',
            'image' => 'rhetw46j',
            'hash1_id' => 'ハッシュ4',
            'hash2_id' => 'ハッシュ2',
            'hash3_id' => 'ハッシュ3',
            'created_at' => '2020-10-17 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 2,
            'title' => 'タイトル3',
            'description' => '説明3',
            'image' => 'rhetw46j',
            'hash1_id' => 'ハッシュ5',
            'hash2_id' => 'ハッシュ2',
            'hash3_id' => 'ハッシュ3',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 3,
            'title' => '投稿テスト１',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1607595905_サルバドール・ダリ.jpg',
            'hash1_id' => 'salbador dali',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト２',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1607595863_ボボボーボ・ボーボボ.png',
            'hash1_id' => 'ボボボーボ・ボーボボ',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト３',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1607595930_レオナルド・ダ・ヴィンチ.jpg',
            'hash1_id' => 'Leonardo da vinci',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト４',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605603084_弱く見えるぞオォン.jpg',
            'hash1_id' => 'KBTIT',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト５',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605603084_Celtics_Rockets_Basketball2.JPG.jpg',
            'hash1_id' => 'NBA',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト６',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605259088_azarashi_aitubutu.jpg',
            'hash1_id' => 'アザラシ',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト_tamori1_被ったらどうなる？',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605259089_殺伐としたスレに.jpg',
            'hash1_id' => '殺伐としたスレに',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト_tamori1_被ったらどうなる？',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605603084_r34_01.jpg',
            'hash1_id' => 'GTR',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 6,
            'title' => '投稿テスト_tamori1_被ったらどうなる？',
            'description' => '記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！記事の説明です！',
            'image' => '1605603084_みwなwぎwっwてwきwたwww.png',
            'hash1_id' => 'みwなwぎwっwてwきwたwww',
            'hash2_id' => 'ハッシュテスト',
            'hash3_id' => '最高だぜ！！',
            'created_at' => '2020-10-18 06:28:50',
        ];
        DB::table('articles')->insert($param);
    }
}
