<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms_transaction extends Model
{
    protected $fillable = [
        'cms_accounts_heads_id',
        'cms_transaction_types_id',
        'transaction_amount',
        'voucher_no',
        'transaction_date',
        'create_user',
        'created_at',
    ];

    public function get_accounts_head(){
        return $this->belongsTo('App\Cms_accounts_head','cms_accounts_heads_id');
    }

    public function Cms_members_infos(){
        return $this->belongsToMany('App\Cms_members_info');
    }
}
