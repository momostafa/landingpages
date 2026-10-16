<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->unique();
            $table->ipAddress('ip')->nullable();
            $table->boolean('dns_ok')->default(false);
            $table->integer('reputation_score')->nullable();
            $table->string('status')->default('unknown'); // unknown|good|flagged|bad
            $table->json('checks')->nullable();
            $table->timestamp('last_checked_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domains');
    }
};
