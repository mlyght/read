<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meter_id'); 
            $table->integer('agent_id'); 
            $table->string('meter_read');  
            $table->integer('status');  
            $table->integer('position');  
            $table->string('image');  
            $table->string('comment');
            $table->date('date_validated');
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
        Schema::dropIfExists('readings');
    }
}
