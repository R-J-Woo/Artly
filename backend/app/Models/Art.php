<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'apiserver_art';

    protected $fillable = [
        'art_image',
        'artist_id',
        'art_title',
        'art_description',
        'art_docent',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
