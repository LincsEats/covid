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
        Schema::create('covid_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('testType');
            $table->string('name');
            $table->string('niNumber');
            $table->string('email');
            $table->string('streetName');
            $table->string('buildingNumber');
            $table->string('postcode');
            $table->string('city');
            $table->string('deliveryStatus');
            $table->string('serialNumber');
            $table->string('result');
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
        Schema::dropIfExists('covid_tests');
    }
};
