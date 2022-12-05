<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'details',
        'image',
        'video_path',
        'extra_img',
        'publish_date',
        'create_user',
        'update_user',
    ];
}
