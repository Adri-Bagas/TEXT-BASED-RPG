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
        Schema::create('user_characters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->on('users')->references('id')->restrictOnDelete();
            $table->unsignedBigInteger('races_id')->nullable();
            $table->unsignedBigInteger('chara_classes_id')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('intelligence')->nullable();
            $table->integer('dexterity')->nullable();
            $table->integer('charisma')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('max_health')->nullable();
            $table->integer('current_health')->nullable();
            $table->integer('max_mana')->nullable();
            $table->integer('current_mana')->nullable();
            $table->integer('level')->nullable();
            $table->integer('exp_count')->nullable();
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
        Schema::dropIfExists('user_characters');
    }
};
