<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecretQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'question_contents' => '初めて買ったペットの名前は？',
        ];
        DB::table('secret_questions')->insert($param);

        $param = [
            'question_contents' => '好きな絵本の題名は？',
        ];
        DB::table('secret_questions')->insert($param);

        $param = [
            'question_contents' => '初めて買ったペットの名前は？',
        ];
        DB::table('secret_questions')->insert($param);

        $param = [
            'question_contents' => '子供の頃のニックネームは？',
        ];
        DB::table('secret_questions')->insert($param);

        $param = [
            'question_contents' => '初めて所有した車の名前は？',
        ];
        DB::table('secret_questions')->insert($param);

        $param = [
            'question_contents' => '初めて映画館で見た映画は？',
        ];
        DB::table('secret_questions')->insert($param);
    }
}
