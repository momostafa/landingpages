<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $mailsTable = config('mails.database.tables.mails', 'mails');
        if (Schema::hasTable($mailsTable)) {
            Schema::table($mailsTable, function (Blueprint $table): void {
                $table->string('transport')
                    ->nullable()
                    ->after('mailer');
            });
        }
    }
};
