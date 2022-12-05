<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cms_accounts_heads_id');
            $table->tinyInteger('cms_transaction_types_id');
            $table->integer('transaction_amount');
            $table->char('voucher_no');
            $table->date('transaction_date');
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
        Schema::dropIfExists('cms_transactions');
    }
}
