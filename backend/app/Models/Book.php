<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'apiserver_book';

    protected $fillable = [
        'book_title',
        'book_poster',
        'exhibition_id',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
