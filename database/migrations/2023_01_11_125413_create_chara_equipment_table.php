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
        Schema::create('chara_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_characters_id')->nullable();
            $table->foreign('user_characters_id')->on('user_characters')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('head')->nullable();
            $table->foreign('head')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('body')->nullable();
            $table->foreign('body')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('weapon')->nullable();
            $table->foreign('weapon')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('accessories1')->nullable();
            $table->foreign('accessories1')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('accessories2')->nullable();
            $table->foreign('accessories2')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('legs')->nullable();
            $table->foreign('legs')->on('chara_inventories')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('foot')->nullable();
            $table->foreign('foot')->on('chara_inventories')->references('id')->restrictOnDelete();
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
        Schema::dropIfExists('chara_equipment');
    }
};
