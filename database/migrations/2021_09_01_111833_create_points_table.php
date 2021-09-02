<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ride_id')->unsigned();
            $table->foreign('ride_id')->references('id')->on('rides')->cascadeOnDelete();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->double('lat', 9, 4);
            $table->double('long', 9, 4);

            $table->decimal('distance')->default(0);
            $table->decimal('duration')->default(0);
            $table->dateTime('arrivalTime')->useCurrent();
            $table->string('place')->nullable();
            $table->string('address')->default('Unknown');

            $table->longText('polyline')->nullable();

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
        Schema::dropIfExists('points');
    }
}
