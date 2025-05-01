<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'apiserver_user';

    protected $fillable = [
        'login_id',
        'login_pwd',
        'user_name',
        'user_gender',
        'user_age',
        'user_email',
        'user_phone',
        'user_img',
        'user_keyword',
        'admin_flag',
        'gallery_id',
    ];

    // 타임스탬프 커스텀 필드명 정의
    const CREATED_AT = 'reg_time';
    const UPDATED_AT = 'update_dttm';
}