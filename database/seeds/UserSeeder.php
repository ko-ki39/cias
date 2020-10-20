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
            'id' => 1,
            'user_name' => 'root',
            'user_id' => '123456789',
            'password' => bcrypt('password'),
            'role' => 1,
            'secret_question_id' => 1,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 2,
            'user_name' => 'ユーザー2',
            'user_id' => '12345678',
            'password' => bcrypt('password'),
            'role' => 2,
            'secret_question_id' => 2,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 3,
            'user_name' => 'ユーザー3',
            'user_id' => '1234567',
            'password' => bcrypt('password'),
            'secret_question_id' => 3,
            'secret_answer' => '小学校',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 4,
            'user_id' => 'tamori1',
            'user_name' => 'tamori1',
            'password' => bcrypt('1234567890'),
            'role' => 3,
            'secret_question_id' => 1,
            'secret_answer' => 'tamori1',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 5,
            'user_id' => 'tamori2',
            'user_name' => 'tamori2',
            'password' => bcrypt('1234567890'),
            'role' => 2,
            'secret_question_id' => 1,
            'secret_answer' => 'tamori2',
        ];
        DB::table('users')->insert($param);

        $param = [
            'id' => 6,
            'user_id' => 'tamori3',
            'user_name' => 'tamori3',
            'image' => '1602239353_azarashi_aitubutu.jpg',
            'email' => 'hoge@hoge.hoge3',
            'role' => 1,
            'secret_question_id' => 1,
            'secret_answer' => 'tamori3',
            'password' => bcrypt('1234567890'),
        ];
        DB::table('users')->insert($param);
    }
}
