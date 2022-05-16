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
        Schema::create('device_leasing', function (Blueprint $table) {
            $table->string('device_id');
            $table->bigInteger('leasing_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('leasing_id')->references('id')->on('leasings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices_leasings');
    }
};
