<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chara_inventories', function (Blueprint $table) {
            $table->foreign('data_items_id')->on('data_items')->references('id')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chara_inventories', function (Blueprint $table) {
            $table->dropForeign(['data_items_id']);
        });
    }
};
