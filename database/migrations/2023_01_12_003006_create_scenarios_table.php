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
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->text('story_text');
            $table->string('choice1');
            $table->string('choice2')->nullable();
            $table->string('choice3')->nullable();
            $table->string('choice4')->nullable();
            $table->string('response1');
            $table->string('response2')->nullable();
            $table->string('response3')->nullable();
            $table->string('response4')->nullable();
            $table->string('cons1')->nullable();
            $table->string('cons2')->nullable();
            $table->string('cons3')->nullable();
            $table->string('cons4')->nullable();
            $table->integer('effect1')->default(0);
            $table->integer('effect2')->default(0);
            $table->integer('effect3')->default(0);
            $table->integer('effect4')->default(0);
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
        Schema::dropIfExists('scenarios');
    }
};
