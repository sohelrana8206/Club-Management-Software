<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    protected $fillable = [
        'member_id',
        'member_name',
        'member_address',
        'member_email',
        'member_mobile',
        'member_photo',
        'membership_type_id',
        'member_join_date',
        'membership_reference',
        'membership_fee',
        'status',
        'create_user',
    ];

    public function membership_type_name(){
        return $this->belongsTo('App\Membership_type','membership_type_id');
    }

    public function transactions($memberID)
    {
        $members = DB::table('transactions')
            ->join('members','transactions.transactionable_id' , '=','members.id','LEFT')
            ->where('transactions.transactionable_id', $memberID)
            ->where('transactions.transactionable_type', 'Member')
            ->orderBy('transactions.id', 'desc')
            ->select('transactions.*','members.*')
            ->get();

        return $members;
    }

    public function all_members_due()
    {
        $members = DB::table('transactions')
            ->where('transactionable_type', 'Member')
            ->select('*')
            ->get();

        return $members;
    }
}
