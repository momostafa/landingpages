<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages_publish_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->index();
            $table->unsignedBigInteger('version');
            $table->json('diff')->nullable();
            $table->string('status')->default('published'); // published|rolled_back|failed
            $table->json('meta')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages_publish_logs');
    }
};
