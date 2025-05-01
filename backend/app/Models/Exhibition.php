<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $table = 'apiserver_exhibition';

    protected $fillable = [
        'exhibition_title',
        'exhibition_poster',
        'exhibition_category',
        'exhibition_start_date',
        'exhibition_end_date',
        'exhibition_start_time',
        'exhibition_end_time',
        'exhibition_location',
        'exhibition_price',
        'gallery_id',
        'exhibition_tag',
        'exhibition_status',
    ];

    // 타임스탬프 커스텀 필드명 정의
    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
