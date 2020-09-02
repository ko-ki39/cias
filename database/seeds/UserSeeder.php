<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_name' => 'ユーザー１',
            'user_id' => '123456789',
            'password' => 'Password',
            'secret_question_id' => 1,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);

        $param = [
            'user_name' => 'ユーザー2',
            'user_id' => '12345678',
            'password' => 'Password',
            'secret_question_id' => 2,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);

        $param = [
            'user_name' => 'ユーザー3',
            'user_id' => '1234567',
            'password' => 'Password',
            'secret_question_id' => 3,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);
    }
}
