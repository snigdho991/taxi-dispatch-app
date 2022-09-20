<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('arrival_date');
            $table->string('booking_id');
            $table->string('name');
            $table->bigInteger('contact_number');
            $table->string('origin');
            $table->string('destination');
            $table->string('job_time');
            $table->integer('passenger_count');
            $table->integer('luggage_count');
            $table->string('car_type');
            $table->string('flight_number');
            $table->double('price')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('bookings');
    }
}
