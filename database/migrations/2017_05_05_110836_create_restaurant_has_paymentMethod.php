<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantHasPaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_has_payment', function (Blueprint $table) {
            $table->integer('restaurant_id', false, true);
            $table->integer('payment_id', false, true);

            $table->foreign('restaurant_id')->references('id')->on('restaurant');
            $table->foreign('payment_method_id')->references('id')->on('payment_method');
            $table->primary(['restaurant_id', 'payment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_has_payment', function (Blueprint $table)
        {
            $table->drop();
        });
    }
}
