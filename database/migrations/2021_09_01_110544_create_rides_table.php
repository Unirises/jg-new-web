<?php

use App\Enums\PaymentStatus;
use App\Enums\ServiceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->foreign('driver_id')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('index')->default(0);
            $table->double('lat', 10, 7);
            $table->double('long', 10, 7);
            $table->integer('heading')->default(0);
            $table->integer('vehicle_type');
            $table->integer('service_status')->default(ServiceStatus::Awaiting);
            $table->timestamp('available_at')->useCurrent();

            $table->decimal('fee', 9, 2)->default(0);
            $table->decimal('subtotal', 9, 2)->default(0);
            $table->integer('payment_status');
            $table->integer('service_type');
            $table->integer('payment_method');
            $table->boolean('is_commission_paid')->default(false);

            $table->text('special_instructions')->nullable();

            $table->decimal('total_distance')->default(0);
            $table->decimal('total_duration')->default(0);

            $table->bigInteger('store_id')->nullable()->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnDelete();

            $table->longText('review')->nullable();
            $table->tinyInteger('rating')->default(5);

            $table->boolean('is_reported')->default(false);

            $table->string('payment_id')->nullable();

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
        Schema::dropIfExists('rides');
    }
}
