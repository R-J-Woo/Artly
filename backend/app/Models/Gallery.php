<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'apiserver_gallery';

    protected $fillable = [
        'gallery_name',
        'gallery_image',
        'gallery_address',
        'gallery_start_time',
        'gallery_end_time',
        'gallery_closed_day',
        'gallery_category',
        'gallery_description',
        // 시간 관련 필드는 fillable 제외 (백엔드 자동 관리)
    ];

    // 타임스탬프 커스텀 필드명 정의
    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
