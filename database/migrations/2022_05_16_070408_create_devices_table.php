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
        Schema::create('devices', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('activationCode')->nullable();
            $table->string('deviceAPIKey')->nullable();
            $table->string('deviceTraining')->nullable();
            $table->enum('deviceType',['unset','free','leasing','restricted']);
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
