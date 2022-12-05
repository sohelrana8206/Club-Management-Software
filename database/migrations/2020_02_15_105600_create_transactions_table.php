<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transactionable_id');
            $table->char('transactionable_type');
            $table->integer('amount');
            $table->date('transaction_date');
            $table->char('months_for');
            $table->tinyInteger('accounts_head_id');
            $table->tinyInteger('transaction_type_id');
            $table->char('voucher_no');
            $table->text('comment');
            $table->boolean('status')->default('1');
            $table->tinyInteger('create_user');
            $table->tinyInteger('update_user')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
