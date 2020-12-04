<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('user_name')->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique()->nullable();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->tinyInteger('age');
            $table->text('introduction')->nullable();
            $table->integer('article_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->dateTime('time_limit')->nullable();
            $table->tinyInteger('role')->default(2);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
