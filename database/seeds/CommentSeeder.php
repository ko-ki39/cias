<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
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
            'article_id' => 1,
            'detail' => 'good!',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 2,
            'article_id' => 1,
            'detail' => 'excel!',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 3,
            'article_id' => 2,
            'detail' => 'good!',
        ];
        DB::table('comments')->insert($param);
    }
}
