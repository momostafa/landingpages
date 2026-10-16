<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages_live', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->index();
            $table->string('slug')->index();
            $table->string('title')->nullable();
            $table->json('content')->nullable();
            $table->unsignedBigInteger('version')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages_live');
    }
};
