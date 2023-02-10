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
        Schema::create('start_scenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('races_id');
            $table->foreign('races_id')->on('races')->references('id')->restrictOnDelete();
            $table->text('story_text');
            $table->string('choice');
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
        Schema::dropIfExists('start_scenes');
    }
};
