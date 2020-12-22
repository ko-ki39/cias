<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'image1' => 'rhetw46j',
            'image2' => '5j6ysw6i',
            'image3' => 'p2984ghowkg',
            'image4' => 'q5hsah64w',
            'image5' => 'dj6ew57iut',
            'image6' => 'j8479odyhmd',
            'text1' => '説明1',
            'text2' => '説明2',
            'text3' => '説明3',
            'text4' => '説明4',
            'text5' => '説明5',
            'text6' => '説明6',
        ];
        DB::table('posts')->insert($param);

        // $param = [
        //     'image1' => 'rhetw46j',
        //     'image2' => '5j6ysw6i',
        //     'image3' => 'p2984ghowkg',
        //     'image4' => 'q5hsah64w',
        //     'image5' => 'dj6ew57iut',
        //     'image6' => 'j8479odyhmd',
        //     'text1' => '説明1',
        //     'text2' => '説明2',
        //     'text3' => '説明3',
        //     'text4' => '説明4',
        //     'text5' => '説明5',
        //     'text6' => '説明6',
        // ];

        // DB::table('posts')->insert($param);$param = [
        //     'image1' => 'rhetw46j',
        //     'image2' => '5j6ysw6i',
        //     'image3' => 'p2984ghowkg',
        //     'image4' => 'q5hsah64w',
        //     'image5' => 'dj6ew57iut',
        //     'image6' => 'j8479odyhmd',
        //     'text1' => '説明1',
        //     'text2' => '説明2',
        //     'text3' => '説明3',
        //     'text4' => '説明4',
        //     'text5' => '説明5',
        //     'text6' => '説明6',
        // ];
        // DB::table('posts')->insert($param);
    }
}
