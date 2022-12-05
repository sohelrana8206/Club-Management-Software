<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transactionable_id',
        'transactionable_type',
        'amount',
        'transaction_date',
        'months_for',
        'account_head_id',
        'transaction_type_id',
        'voucher_no',
        'comment',
        'received_payment',
        'status',
        'create_user',
    ];

    public function account_title(){
        return $this->belongsTo('App\Account_head','account_head_id');
    }
}
