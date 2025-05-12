<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'apiserver_user_book';

    protected $fillable = [
        'user_id',
        'book_id',
        'user_book_payment_method',
        'user_book_status',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
