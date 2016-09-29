<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 

    public function up()
    {
        Schema::create('meters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Meter_customer_id'); 
            $table->string('meter_number');
            $table->string('meter_serial_number');
            $table->date('install_date');
            $table->string('comment'); 
            $table->float('gpsLatitude');
            $table->float('gpsLongitude');
            $table->timestamps('recordCreated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
}
