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
        Schema::table('user_characters', function (Blueprint $table) {
            $table->foreign('races_id')->on('races')->references('id')->restrictOnDelete();
            $table->foreign('chara_classes_id')->on('chara_classes')->references('id')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_characters', function (Blueprint $table) {
            $table->dropForeign(['chara_classes_id']);
            $table->dropForeign(['races_id']);
        });
    }
};
