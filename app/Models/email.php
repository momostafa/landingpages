<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $table = 'emails';

    protected $fillable = [
        'user_id',
        'page_id',
        'source',
        'direction',
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject', 
        'message',
        'auto_responder_sent',
        'status',
    ];

    protected $casts = [
        'auto_responder_sent' => 'boolean',
    ];
}
