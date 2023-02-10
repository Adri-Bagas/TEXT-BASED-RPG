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
        Schema::table('scenarios', function (Blueprint $table) {
            $table->string('failed_text')->after('story_text')->require();
            $table->string('failed_cons')->after('failed_text')->require();
            $table->string('failed_eff')->after('failed_cons')->require();
            $table->string('req1')->after('choice1');
            $table->string('req2')->after('choice2');
            $table->string('req3')->after('choice3');
            $table->string('req4')->after('choice4');
            $table->integer('min1')->after('req1');
            $table->integer('min2')->after('req2');
            $table->integer('min3')->after('req3');
            $table->integer('min4')->after('req4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scenarios', function (Blueprint $table) {
            $table->dropColumn('min4');
            $table->dropColumn('min3');
            $table->dropColumn('min2');
            $table->dropColumn('min1');
            $table->dropColumn('req4');
            $table->dropColumn('req3');
            $table->dropColumn('req2');
            $table->dropColumn('req1');
            $table->dropColumn('failed_eff');
            $table->dropColumn('failed_cons');
            $table->dropColumn('failed_text');
        });
    }
};
