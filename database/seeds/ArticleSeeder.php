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
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 1,
            'title' => '【Unity】コルーチンの使い方を５つの例で紹介！',
            'description' => '説明2',
            'image' => 'rhetw46j',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 2,
            'title' => 'タイトル3',
            'description' => '説明3',
            'image' => 'rhetw46j',
        ];
        DB::table('articles')->insert($param);
    }
}
