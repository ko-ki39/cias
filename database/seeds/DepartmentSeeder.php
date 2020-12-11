<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'department' => 'オフィスビジネス科（前期）',
        ];
        DB::table('departments')->insert($param);

        $param = [
            'department' => 'オフィスビジネス科（後期）',
        ];
        DB::table('departments')->insert($param);

        $param = [
            'department' => '自動車整備科',
        ];
        DB::table('departments')->insert($param);
        $param = [
            'department' => '電気システム科',
        ];
        DB::table('departments')->insert($param);
        $param = [
            'department' => 'メディア・アート科',
        ];
        DB::table('departments')->insert($param);
        $param = [
            'department' => '情報システム科',
        ];
        DB::table('departments')->insert($param);
        $param = [
            'department' => '造園ガーデニング科',
        ];
        DB::table('departments')->insert($param);
        $param = [
            'department' => '総合実務科（知的障がい者対象）',
        ];
        DB::table('departments')->insert($param);

        $param = [
            'department' => '管理者',
        ];
        DB::table('departments')->insert($param);
    }
}
