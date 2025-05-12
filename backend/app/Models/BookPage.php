<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookPage extends Model
{
    protected $table = 'apiserver_book_page';

    protected $fillable = [
        'book_id',
        'art_id',
        'book_page_sequence',
        'book_page_description',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
