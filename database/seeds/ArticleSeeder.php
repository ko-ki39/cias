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
            'title' => 'タイトル1',
            'description' => '説明1',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 2,
            'title' => 'タイトル2',
            'description' => '説明2',
        ];
        DB::table('articles')->insert($param);

        $param = [
            'user_id' => 3,
            'title' => 'タイトル3',
            'description' => '説明3',
        ];
        DB::table('articles')->insert($param);
    }
}
