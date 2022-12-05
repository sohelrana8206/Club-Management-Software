<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsMembersInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_members_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('members_id');
            $table->string('members_name');
            $table->text('members_address');
            $table->string('members_email')->unique();
            $table->string('members_mobile');
            $table->string('members_photo');
            $table->tinyInteger('cms_membership_types_id');
            $table->date('members_join_date');
            $table->string('membership_reference');
            $table->integer('membership_fee');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('cms_members_infos');
    }
}
