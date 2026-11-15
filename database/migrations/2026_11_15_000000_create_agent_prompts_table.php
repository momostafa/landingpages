<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agent_prompts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('title')->nullable();
            $table->json('prompt_blocks')->nullable();
            $table->string('description')->nullable();
            $table->string('content_type')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agent_prompts');
    }
};
