<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(); 
            $table->string('towers_customer');
            $table->string('towers_network');
            $table->string('towers_sending');
            $table->string('towers_typeleaf');
            $table->string('towers_parish');
            $table->string('towers_district');
            $table->string('towers_pravince');
            $table->string('towers_code');
            $table->string('LATDEG');
            $table->string('LONGDEG');
            $table->string('towers_license_code');
            $table->string('towers_license_date');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towers');
    }
}
