<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('customer_name');
            $table->string('phone');
            $table->string('region')->nullable();
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('flat')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('creation_date');
            $table->dateTime('delivery_date');
            $table->integer('payment_method_id', false, true);
            $table->smallInteger('order_status_id', false, true);

            $table->unique('number', 'unique_number');
            $table->foreign('payment_method_id')->references('id')->on('payment_method');
            $table->foreign('order_status_id')->references('id')->on('order_status');
        });

        Schema::create('fast_order_has_food', function (Blueprint $table) {
            $table->integer('fast_order_id', false, true);
            $table->integer('food_id', false, true);
            $table->double('actual_price');
            $table->integer('quantity');

            $table->foreign('fast_order_id')->references('id')->on('fast_order');
            $table->foreign('food_id')->references('id')->on('food');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fast_order_has_food', function (Blueprint $table) {
            $table->dropForeign(['fast_order_id']);
            $table->dropForeign(['food_id']);
            $table->drop();
        });

        Schema::table('fast_order', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
            $table->dropForeign(['order_status_id']);

            $table->drop();
        });
    }
}
