<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceStationsTable extends Migration
{
    public function up()
    {
        Schema::create('service_stations', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->integer('num_fuel_pumps');
            $table->integer('fuel_storage_capacity');
            $table->string('business_hours');
            $table->unsignedBigInteger('employee_id'); // Agregar clave foránea para el empleado responsable
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_stations');
    }
}
