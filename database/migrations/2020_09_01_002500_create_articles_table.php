<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); //外部キー
            $table->text('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->foreignId('hash1_id')->nullable()->constrained('hashtags')->onDelete('cascade');
            $table->foreignId('hash2_id')->nullable()->constrained('hashtags')->onDelete('cascade');
            $table->foreignId('hash3_id')->nullable()->constrained('hashtags')->onDelete('cascade');

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
        Schema::dropIfExists('articles');
    }
}
