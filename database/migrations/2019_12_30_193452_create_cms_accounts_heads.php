<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsAccountsHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_accounts_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('accounts_head_title');
            $table->tinyInteger('cms_accounts_types_id');
            $table->tinyInteger('create_user');
            $table->tinyInteger('update_user')->default('0');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('cms_accounts_heads');
    }
}
