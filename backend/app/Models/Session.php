<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'apiserver_session';

    protected $fillable = [
        'exhibition_id',
        'session_datetime',
        'session_total_capacity',
        'session_reservation_capacity',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
