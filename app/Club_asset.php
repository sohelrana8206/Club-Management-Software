<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club_asset extends Model
{
    protected $fillable = [
        'inventory_name',
        'quantity',
        'create_user',
        'status',
    ];
}
