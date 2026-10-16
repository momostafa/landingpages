<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! config('mails')) {
            return;
        }
        Schema::create(config('mails.database.tables.attachments', 'mail_attachments'), function (Blueprint $table) {
            $table->id();
            $mailsTable = config('mails.database.tables.mails', 'mails');
            $table->foreignId('mail_id')
                ->constrained($mailsTable)
                ->cascadeOnDelete();
            $table->string('disk');
            $table->string('uuid');
            $table->string('filename');
            $table->string('mime');
            $table->boolean('inline', false);
            $table->bigInteger('size');
            $table->timestamps();
        });
    }
};
