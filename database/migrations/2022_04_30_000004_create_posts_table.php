<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [Post::published, Post::draft])->default(Post::draft);
            $table->foreignId('user_id')->constrained();
            $table->string('title', 60)->unique();
            $table->string('slug', 80);
            $table->string('date');
            $table->string('image', 255);
            $table->string('video', 30)->nullable();
            $table->foreignId('category_id');
            $table->string('description',130)->nullable();
            $table->longText('content');
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
        Schema::dropIfExists('posts');
    }
};
