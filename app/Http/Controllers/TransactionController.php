<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::with('account_title')->orderBy('id','desc')->get();
        return view('admin/transactions_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts_head = DB::table('account_heads')->get();
        $tran_type = DB::table('transaction_types')->get();
        return view('admin/transaction_add_form',['accounts_head'=> $accounts_head,'tran_type'=> $tran_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accounts_head_id = $request->input('acc_head_id');
        $tran_type_id = $request->input('tran_type_id');
        $tran_amount = $request->input('tran_amount');
        $comments = $request->input('comments');
        $re_pay = $request->input('re_pay');
        $month_form = date('Y-m',strtotime($request->input('month_form')));
        $month_to = date('Y-m',strtotime($request->input('month_to')));
        if(!empty($request->input('month_to'))){
            $months_for = $month_form.'/'.$month_to;
        }else{
            $months_for = $month_form.'/';
        }
        $voucher_no = $request->input('voucher_no');
        $tran_date = date('Y-m-d',strtotime($request->input('tran_date')));
        $acc_type_id = $request->input('acc_type_id');
        if(!empty($acc_type_id)){
            $acc_type_array = explode('_',$acc_type_id);
            $acc_typeID = $acc_type_array[1];
            $acc_typeName = $acc_type_array[0];
        }else{
            $acc_typeID = 0;
            $acc_typeName = '';
        }
        $data = array(
            'transactionable_id'=>$acc_typeID,
            'transactionable_type'=>$acc_typeName,
            'account_head_id'=>$accounts_head_id,
            "transaction_type_id"=>$tran_type_id,
            "amount"=>$tran_amount,
            "voucher_no"=>$voucher_no,
            "transaction_date"=>$tran_date,
            "months_for"=>$months_for,
            "comment"=>$comments,
            "received_payment"=>$re_pay,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Transaction::create($data);

        if($accounts_head_id == 9){
            if($tran_type_id == 2){
                $tran_type_C = 1;
                $received_payment_C = 'Payment';
            }else{
                $tran_type_C = 2;
                $received_payment_C = 'Received';
            }
            $cashData = array(
                'transactionable_id'=>$acc_typeID,
                'transactionable_type'=>$acc_typeName,
                'account_head_id'=>$accounts_head_id,
                "transaction_type_id"=>$tran_type_C,
                "amount"=>$tran_amount,
                "voucher_no"=>$voucher_no,
                "transaction_date"=>$tran_date,
                "months_for"=>$months_for,
                "comment"=>$comments,
                "received_payment"=>$received_payment_C,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Transaction::create($cashData);
        }elseif($accounts_head_id == 10){
            if($tran_type_id == 1){
                $tran_type_C = 2;
                $received_payment_C = 'Payment';
            }else{
                $tran_type_C = 1;
                $received_payment_C = 'Received';
            }

            $bankData = array(
                'transactionable_id'=>$acc_typeID,
                'transactionable_type'=>$acc_typeName,
                'account_head_id'=>$accounts_head_id,
                "transaction_type_id"=>$tran_type_C,
                "amount"=>$tran_amount,
                "voucher_no"=>$voucher_no,
                "transaction_date"=>$tran_date,
                "months_for"=>$months_for,
                "comment"=>$comments,
                "received_payment"=>$received_payment_C,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Transaction::create($bankData);
        }

        return back()
            ->with('toast_success','Transactions Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaction::find($id);
        $data_type = $data->transactionable_type;
        if($data_type == 'Member'){
            $list_data = DB::table('members')
                ->select('member_name as dataName','id')
                ->get();
            $name = 'Member';
        }elseif($data_type == 'Student'){
            $list_data = DB::table('students')
                ->select('student_name as dataName','id')
                ->get();
            $name = 'Student';
        }elseif($data_type == 'Employee'){
            $list_data = DB::table('employees')
                ->select('name as dataName','id')
                ->get();
            $name = 'Employee';
        }else{
            $list_data = '';
            $name = '';
        }
        $accounts_head = DB::table('account_heads')->get();
        $tran_type = DB::table('transaction_types')->get();
        return view('admin/transaction_edit_form',['data' => $data,'accounts_head'=> $accounts_head,'tran_type'=> $tran_type, 'list_data'=> $list_data, 'name'=> $name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accounts_head_id = $request->input('acc_head_id');
        $tran_type_id = $request->input('tran_type_id');
        $tran_amount = $request->input('tran_amount');
        $comments = $request->input('comments');
        $re_pay = $request->input('re_pay');
        $month_form = date('Y-m',strtotime($request->input('month_form')));
        $month_to = date('Y-m',strtotime($request->input('month_to')));
        if(!empty($request->input('month_to'))){
            $months_for = $month_form.'/'.$month_to;
        }else{
            $months_for = $month_form.'/';
        }
        $voucher_no = $request->input('voucher_no');
        $tran_date = date('Y-m-d',strtotime($request->input('tran_date')));
        $acc_type_id = $request->input('acc_type_id');
        if(!empty($acc_type_id)){
            $acc_type_array = explode('_',$acc_type_id);
            $acc_typeID = $acc_type_array[1];
            $acc_typeName = $acc_type_array[0];
        }else{
            $acc_typeID = 0;
            $acc_typeName = '';
        }
        $data = array(
            'transactionable_id'=>$acc_typeID,
            'transactionable_type'=>$acc_typeName,
            'account_head_id'=>$accounts_head_id,
            "transaction_type_id"=>$tran_type_id,
            "amount"=>$tran_amount,
            "voucher_no"=>$voucher_no,
            "transaction_date"=>$tran_date,
            "months_for"=>$months_for,
            "comment"=>$comments,
            "received_payment"=>$re_pay,
            "update_user"=>session('userID'),
            "updated_at"=>date('Y-m-d h:i:s')
        );
        $record = Transaction::find($id);
        $record->update($data);

        return back()
            ->with('toast_success','Transactions Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accountTypeByAjax(Request $request){
        $acc_head_id = $request->input('acc_head_id');
        $accounts_head = DB::table('account_heads')->find($acc_head_id);
        if(($accounts_head->account_type_id == 1) || ($accounts_head->account_type_id == 6)){
            $member = DB::table('members')->get();
            $select = '<p class="mb-3"><b>Member Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($member as $row){
                $select .= '<option value="Member_'.$row->id.'">'.$row->member_id.' - '.$row->member_name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }elseif(($accounts_head->account_type_id == 2) || ($accounts_head->account_type_id == 7)){
            $student = DB::table('students')->get();
            $select = '<p class="mb-3"><b>Student Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($student as $row){
                $select .= '<option value="Student_'.$row->id.'">'.$row->student_name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }elseif($accounts_head->account_type_id == 5){
            $employee = DB::table('employees')->get();
            $select = '<p class="mb-3"><b>Employee Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($employee as $row){
                $select .= '<option value="Employee_'.$row->id.'">'.$row->name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }
    }

    public function lastPaymentByAjax(Request $request){
        $data_id = explode('_',$request->input('data_id'));
        $transaction_data = DB::table('transactions')
            ->where('transactionable_id', $data_id[1])
            ->where('transactionable_type', $data_id[0])
            ->orderBy('id', 'desc')
            ->select('*')
            ->get();

        if(count($transaction_data) > 0){
            $months_for = explode('/',$transaction_data[0]->months_for);
            $first_month = $months_for[0];
            $second_month = $months_for[1];

            if(!empty($second_month)){
                $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" value="'.date('M Y',strtotime($first_month)).' to '.date('M Y',strtotime($second_month)).'" readonly>';
            }else{
                $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" value="'.date('M Y',strtotime($first_month)).'" readonly>';
            }
        }else{
            $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" readonly>';
        }

        return $textBox;
    }
}
