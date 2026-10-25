<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
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

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'auto_responder_sent' => 'boolean',
    ];
}
