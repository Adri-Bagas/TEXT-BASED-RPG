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
        Schema::table('chara_equipment', function (Blueprint $table) {
            $table->dropForeign(['legs']);
            $table->dropColumn('legs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chara_equipment', function (Blueprint $table) {
            $table->unsignedBigInteger('legs')->after('accessories2')->nullable();
            $table->foreign('legs')->on('chara_inventories')->references('id')->restrictOnDelete();
        });
    }
};
