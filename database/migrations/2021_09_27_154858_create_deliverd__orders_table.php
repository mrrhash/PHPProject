<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverdOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverd__orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('delivery_type');
            $table->integer('product_id');
            $table->integer('order_number');
            $table->integer('quantity');
            $table->integer('user_id');
            $table->string('payment_type');
            $table->decimal('total');
            $table->string('address');
            $table->string('contact');
            $table->string('order_time');
            $table->string('order_dispatch_time');
            $table->string('order_deliverd_time');
            $table->integer('rider_id');
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
        Schema::dropIfExists('deliverd__orders');
    }
}
