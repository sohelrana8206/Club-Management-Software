<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('cms_admin','AdminController');

Route::resource('user','UserController')->middleware('checkAuth');

Route::resource('accounts_head','AccountsHeadController')->middleware('checkAuth');

Route::resource('club_assets','ClubAssetController')->middleware('checkAuth');

Route::resource('student','StudentController')->middleware('checkAuth');

Route::resource('employee','EmployeeController')->middleware('checkAuth');

Route::resource('club_members','ClubMembersController')->middleware('checkAuth');

Route::resource('ec_members','ExecutiveCommitteeMemberController')->middleware('checkAuth');

Route::resource('transactions','TransactionController')->middleware('checkAuth');

Route::resource('notice','NoticeController')->middleware('checkAuth');

Route::get('/noticeDetailsModal','NoticeController@noticeDetailsModal')->middleware('checkAuth');

Route::resource('activity','ActivityController')->middleware('checkAuth');

Route::resource('gallery','GalleryController')->middleware('checkAuth');

Route::post('accountTypeByAjax','TransactionController@accountTypeByAjax')->middleware('checkAuth');

Route::post('lastPaymentByAjax','TransactionController@lastPaymentByAjax')->middleware('checkAuth');

Route::get('/members_payment_history','ClubMembersController@members_payment_history')->middleware('checkAuth');

Route::get('/students_payment_history','StudentController@students_payment_history')->middleware('checkAuth');

Route::get('/employees_payment_history','EmployeeController@employees_payment_history')->middleware('checkAuth');

Route::get('incomeExpenditure','ReportsController@incomeExpenditure')->middleware('checkAuth');

Route::get('incomeExpenseAjaxResult','ReportsController@incomeExpenseAjaxResult')->middleware('checkAuth');

Route::get('ledgerBalance','ReportsController@ledgerBalance')->middleware('checkAuth');

Route::get('ledgerAjaxResult','ReportsController@ledgerAjaxResult')->middleware('checkAuth');

Route::get('cashBank_transactions','ReportsController@cashBank_transactions')->middleware('checkAuth');

Route::get('cashBankAjaxResult','ReportsController@cashBankAjaxResult')->middleware('checkAuth');

Route::get('all_students_total_due','ReportsController@all_students_total_due')->middleware('checkAuth');

Route::get('all_members_total_due','ReportsController@all_members_total_due')->middleware('checkAuth');

Route::get('/dashboard','AdminController@dashboard')->middleware('checkAuth');

Route::get('/logout','AdminController@logout');
