<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'apiserver_announcement';

    protected $fillable = [
        'user_id',
        'announcement_title',
        'announcement_poster',
        'announcement_start_datetime',
        'announcement_end_datetime',
        'announcement_organizer',
        'announcement_contact',
        'announcement_support_detail',
        'announcement_site_url',
        'announcement_attachment_url',
        'content',
    ];

    // 타임스탬프 커스텀 필드명 정의
    const CREATED_AT = 'create_dttm';
    const UPDATED_AT = 'update_dttm';
}
