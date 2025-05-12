<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExhibitionArt extends Model
{
    protected $table = 'apiserver_exhibition_art';

    protected $fillable = [
        'exhibition_id',
        'art_id',
        'display_order',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
