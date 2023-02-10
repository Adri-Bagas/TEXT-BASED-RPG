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
        Schema::create('data_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('str_boost')->default(0);
            $table->integer('int_boost')->default(0);
            $table->integer('dex_boost')->default(0);
            $table->integer('def_boost')->default(0);
            $table->integer('health_boost')->default(0);
            $table->integer('mana_boost')->default(0);
            $table->integer('char_boost')->default(0);
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
        Schema::dropIfExists('data_items');
    }
};
