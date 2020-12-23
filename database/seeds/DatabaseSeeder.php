<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(QuestionSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(ArticleSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(FavSeeder::class);
        // $this->call(HashTagSeeder::class);
        // $this->call(PostSeeder::class);

    }
}
