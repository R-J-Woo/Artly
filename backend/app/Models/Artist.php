<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'apiserver_artist';

    protected $fillable = [
        'artist_image',
        'artist_name',
        'artist_category',
        'artist_nation',
        'artist_description',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
