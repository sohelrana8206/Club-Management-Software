<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'notice_title',
        'notice_details',
        'publish_date',
        'create_user',
        'update_user',
    ];
}
