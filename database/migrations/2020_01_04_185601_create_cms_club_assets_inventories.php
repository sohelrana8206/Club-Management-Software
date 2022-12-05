<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsClubAssetsInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_club_assets_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inventory_name');
            $table->tinyInteger('quantity');
            $table->tinyInteger('status')->default('1');
            $table->string('comments');
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
        Schema::dropIfExists('cms_club_assets_inventories');
    }
}
