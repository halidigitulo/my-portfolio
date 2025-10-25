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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->unsignedInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori_beritas')->onDelete('set null');
            $table->text('isi')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('tag')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->tinyInteger('is_slider')->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('likes')->default(0);
            $table->unsignedInteger('comments_count')->default(0);
            $table->unsignedInteger('shares')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
