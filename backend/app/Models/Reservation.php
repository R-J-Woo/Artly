<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'apiserver_reservation';

    protected $fillable = [
        'user_id',
        'session_id',
        'reservation_datetime',
        'reservation_number_of_tickets',
        'reservation_total_price',
        'reservation_payment_method',
        'reservation_status',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
