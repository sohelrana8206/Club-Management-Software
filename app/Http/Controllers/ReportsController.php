<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Student;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class ReportsController extends Controller
{
    public function all_members_total_due(){
        $member = New Member();
        $memberInfo = $member->where('status',1)->get();
        $data = $member->all_members_due();
        return view('admin/reports/all_members_total_due',['memberInfo'=>$memberInfo, 'data'=> $data]);
    }

    public function all_students_total_due(){
        $student = New Student();
        $studentInfo = $student->where('status',1)->get();
        $data = $student->all_students_due();
        return view('admin/reports/all_students_total_due',['studentInfo'=>$studentInfo, 'data'=> $data]);
    }

    public function cashBank_transactions(){
        return view('admin/reports/cashBank_transactions');
    }

    public function cashBankAjaxResult(Request $request){
        $tra_type = $request->input('tra_type');
        $tra_for = $request->input('tra_for');
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));

        if(empty($tra_for) && empty($request->input('from_month')) && empty($request->input('to_month'))){
            $transaction_result = Transaction::with('account_title')
                ->where('transaction_type_id',$tra_type)
                ->get();
            $totalReceived = Transaction::get()
                ->where('received_payment','Received')
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalPayment = Transaction::get()
                ->where('received_payment','Payment')
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $text = 'Closing Balance';
            $opening_balance = '';
            $closing_balance = $totalReceived - $totalPayment;
        }elseif(empty($tra_for)){
            $transaction_result = Transaction::with('account_title')
                ->where('transaction_type_id',$tra_type)
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month)
                ->get();
            $totalOpeningReceived = Transaction::get()
                ->where('received_payment','Received')
                ->where('transaction_date','<',$from_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalOpeningPayment = Transaction::get()
                ->where('received_payment','Payment')
                ->where('transaction_date','<',$from_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalReceived = Transaction::get()
                ->where('received_payment','Received')
                ->where('transaction_date','<=',$to_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalPayment = Transaction::get()
                ->where('received_payment','Payment')
                ->where('transaction_date','<=',$to_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $text = 'Closing Balance';
            $opening_balance = $totalOpeningReceived - $totalOpeningPayment;
            $closing_balance = $totalReceived - $totalPayment;
        } elseif(empty($request->input('from_month')) && empty($request->input('to_month'))){
            $transaction_result = Transaction::with('account_title')
                ->where('transaction_type_id',$tra_type)
                ->where('received_payment',$tra_for)
                ->get();
            $totalReceived = Transaction::get()
                ->where('received_payment','Received')
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalPayment = Transaction::get()
                ->where('received_payment','Payment')
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $opening_balance = '';
            if($tra_for == 'Received'){
                $text = 'Total Received';
                $closing_balance = $totalReceived;
            }else{
                $text = 'Total Payment';
                $closing_balance = $totalPayment;
            }
        }else{
            $transaction_result = Transaction::with('account_title')
                ->where('transaction_type_id',$tra_type)
                ->where('received_payment',$tra_for)
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month)
                ->get();

            $totalReceived = Transaction::get()
                ->where('received_payment','Received')
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $totalPayment = Transaction::get()
                ->where('received_payment','Payment')
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month)
                ->where('transaction_type_id',$tra_type)
                ->sum('amount');
            $opening_balance = '';
            if($tra_for == 'Received'){
                $text = 'Total Received';
                $closing_balance = $totalReceived;
            }else{
                $text = 'Total Payment';
                $closing_balance = $totalPayment;
            }
        }

        return view('admin/reports/cashBank_transactions_result',['transaction_result'=> $transaction_result,'opening_balance'=> $opening_balance,'closing_balance'=> $closing_balance,'text'=> $text]);
    }

    public function ledgerBalance(){
        $accounts_head = DB::table('account_heads')->whereNotIn('id', [9, 10])->get();
        return view('admin/reports/ledger_balance',['accounts_head'=> $accounts_head]);
    }

    public function ledgerAjaxResult(Request $request){
        $acc_head = $request->input('acc_head');
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));
        $statement_month = date('F Y',strtotime($from_month));
        $acc_head_name = DB::table('account_heads')->select('account_title')->where('id',$acc_head)->get()->first();

        if(empty($request->input('from_month')) && empty($request->input('to_month'))){
            $transaction_result = Transaction::get()->where('account_head_id',$acc_head);
            $closing_balance = Transaction::get()
                ->where('account_head_id',$acc_head)
                ->sum('amount');
            $opening_balance = '';

            if(!empty($transaction_result->first())){
                $transactionableType = $transaction_result->first()->transactionable_type;

                if($transactionableType == 'Member'){
                    $dataInfo = DB::table('members')->select('id','member_name as dataName')->get();
                }elseif($transactionableType == 'Student'){
                    $dataInfo = DB::table('students')->select('id','student_name as dataName')->get();
                }elseif($transactionableType == 'Employee'){
                    $dataInfo = DB::table('employees')->select('id','name as dataName')->get();
                }else{
                    $dataInfo = '';
                }
            }else{
                $dataInfo = '';
            }

        }else{
            $transaction_result = Transaction::get()
                ->where('account_head_id',$acc_head)
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month);

            $opening_balance = Transaction::get()
                ->where('transaction_date','<',$from_month)
                ->where('account_head_id',$acc_head)
                ->sum('amount');
            $closing_balance = Transaction::get()
                ->where('transaction_date','<=',$to_month)
                ->where('account_head_id',$acc_head)
                ->sum('amount');

            if(!empty($transaction_result->first())){
                $transactionableType = $transaction_result->first()->transactionable_type;

                if($transactionableType == 'Member'){
                    $dataInfo = DB::table('members')->select('id','member_name as dataName')->get();
                }elseif($transactionableType == 'Student'){
                    $dataInfo = DB::table('students')->select('id','student_name as dataName')->get();
                }elseif($transactionableType == 'Employee'){
                    $dataInfo = DB::table('employees')->select('id','name as dataName')->get();
                }else{
                    $dataInfo = '';
                }
            }else{
                $dataInfo = '';
            }
        }

        return view('admin/reports/ledger_account_result',[
            'transaction_result'=> $transaction_result,
            'opening_balance'=> $opening_balance,
            'closing_balance'=> $closing_balance,
            'dataInfo'=> $dataInfo,
            'acc_head_name'=> $acc_head_name
        ]);
    }

    public function incomeExpenditure(){
        return view('admin/reports/income_expenditure_account');
    }

    public function incomeExpenseAjaxResult(Request $request){
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));

        $receipts = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->whereNotIn('account_heads.id', [9, 10])
            ->where('transactions.received_payment','Received')
            ->where('transactions.transaction_date','>=',$from_month)
            ->where('transactions.transaction_date','<=',$to_month)
            ->groupBy('account_head_id')
            ->select('account_heads.account_title',DB::raw('sum(amount) as totalReceipts'))->get();

        $payments = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->whereNotIn('account_heads.id', [9, 10])
            ->where('transactions.received_payment','Payment')
            ->where('transactions.transaction_date','>=',$from_month)
            ->where('transactions.transaction_date','<=',$to_month)
            ->groupBy('account_head_id')
            ->select('account_heads.account_title',DB::raw('sum(amount) as totalPayment'))->get();

        $totalOpeningCashReceived = Transaction::get()
            ->where('received_payment','Received')
            ->where('transaction_date','<',$from_month)
            ->where('transaction_type_id',1)
            ->sum('amount');
        $totalOpeningCashPayment = Transaction::get()
            ->where('received_payment','Payment')
            ->where('transaction_date','<',$from_month)
            ->where('transaction_type_id',1)
            ->sum('amount');
        $totalClosingCashReceived = Transaction::get()
            ->where('received_payment','Received')
            ->where('transaction_date','<=',$to_month)
            ->where('transaction_type_id',1)
            ->sum('amount');
        $totalClosingCashPayment = Transaction::get()
            ->where('received_payment','Payment')
            ->where('transaction_date','<=',$to_month)
            ->where('transaction_type_id',1)
            ->sum('amount');

        $opening_cash = $totalOpeningCashReceived - $totalOpeningCashPayment;
        $closing_cash = $totalClosingCashReceived - $totalClosingCashPayment;

        $totalOpeningBankReceived = Transaction::get()
            ->where('received_payment','Received')
            ->where('transaction_date','<',$from_month)
            ->where('transaction_type_id',2)
            ->sum('amount');
        $totalOpeningBankPayment = Transaction::get()
            ->where('received_payment','Payment')
            ->where('transaction_date','<',$from_month)
            ->where('transaction_type_id',2)
            ->sum('amount');
        $totalClosingBankReceived = Transaction::get()
            ->where('received_payment','Received')
            ->where('transaction_date','<=',$to_month)
            ->where('transaction_type_id',2)
            ->sum('amount');
        $totalClosingBankPayment = Transaction::get()
            ->where('received_payment','Payment')
            ->where('transaction_date','<=',$to_month)
            ->where('transaction_type_id',2)
            ->sum('amount');

        $opening_bank = $totalOpeningBankReceived - $totalOpeningBankPayment;
        $closing_bank = $totalClosingBankReceived - $totalClosingBankPayment;

        $statement_month = date('F Y',strtotime($from_month));

        return view('admin/reports/income_expenditure_account_result',[
            'receipts'=> $receipts,
            'payments'=> $payments,
            'opening_cash'=> $opening_cash,
            'closing_cash'=> $closing_cash,
            'opening_bank'=> $opening_bank,
            'closing_bank'=> $closing_bank,
            'statement_month'=> $statement_month
        ]);
    }
}
