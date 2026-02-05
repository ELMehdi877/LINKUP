<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table)
        {
            $table->id();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->name('posts_users_foreign')->index();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) 
        {
            $table->id();
            $table->string('comment');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->name('comments_users_foreign')->index();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade')->name('comments_posts_foreign')->index();
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->name('likes_users_foreign')->index();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade')->name('likes_posts_foreign')->index();
            $table->unique(['user_id', 'post_id']);
            $table->timestamps();
        });

        Schema::create('like_comments', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->name('like_comments_users_foreign')->index();
            $table->foreignId('comment_id')->constrained('comments')->onDelete('cascade')->name('like_comments_comments_foreign')->index();
            $table->unique(['user_id', 'comment_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('like_comments');
    }
};
