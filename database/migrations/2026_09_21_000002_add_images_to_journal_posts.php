<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('journal_post_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journal_post_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('original_name')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::table('journal_posts', function (Blueprint $table) {
            $table->foreignId('main_image_id')
                ->nullable()
                ->after('content')
                ->constrained('journal_post_images')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('journal_posts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('main_image_id');
        });

        Schema::dropIfExists('journal_post_images');
    }
};
