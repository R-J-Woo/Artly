<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExhibitionParticipation extends Model
{
    protected $table = 'apiserver_exhibition_participation';

    protected $fillable = [
        'exhibition_id',
        'artist_id',
        'role',
    ];

    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
