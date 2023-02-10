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
        Schema::create('chara_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_characters_id');
            $table->foreign('user_characters_id')->on('user_characters')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('data_items_id');
            $table->softDeletes();
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
        Schema::dropIfExists('chara_inventories');
    }
};
