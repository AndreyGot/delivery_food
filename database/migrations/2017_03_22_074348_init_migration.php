<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InitMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('restaurant', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('image');
                $table->text('description')->nullable();
                $table->string('alias');
                $table->string('working_hours');
                $table->float('rating');

                $table->unique('alias', 'unique_alias');
            });
            Schema::create('category', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->string('alias');
                $table->integer('restaurant_id', false, true);

                $table->unique('alias', 'unique_alias');
                $table->foreign('restaurant_id')->references('id')->on('restaurant');
            });
            Schema::create('food', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('image');
                $table->text('description')->nullable();
                $table->double('price')->unsigned();
                $table->smallInteger('bonus', false, true)->nullable();
                $table->integer('rating', false, true)->nullable();
                $table->integer('category_id', false, true);

                $table->foreign('category_id')->references('id')->on('category');
            });
            Schema::create('restaurant_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->nullable();
                $table->string('phone_1');
                $table->string('phone_2')->nullable();
                $table->text('description')->nullable();
                $table->integer('restaurant_id', false, true);

                $table->foreign('restaurant_id')->references('id')->on('restaurant');
            });

            Schema::create('user_status', function (Blueprint $table) {
                $table->smallIncrements('id');
                $table->string('name');

                $table->unique('name', 'unique_name');
            });

            Schema::create('user', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('second_name')->nullable();
                $table->date('birth_date')->nullable();
                $table->dateTime('registration_date');
                $table->dateTime('last_login_date')->nullable();
                $table->string('email');
                $table->string('password');
                $table->string('phone_1');
                $table->string('phone_2')->nullable();
                $table->integer('bonus_score', false, true)->default(0);
                $table->smallInteger('user_status_id', false, true);

                $table->unique('email', 'unique_email');
                $table->foreign('user_status_id')->references('id')->on('user_status');
            });

            Schema::create('cart', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id', false, true);

                $table->foreign('user_id')->references('id')->on('user');
            });

            Schema::create('cart_has_food', function (Blueprint $table) {
                $table->integer('cart_id', false, true);
                $table->integer('food_id', false, true);
                $table->integer('quantity', false, true);

                $table->foreign('cart_id')->references('id')->on('cart');
                $table->foreign('food_id')->references('id')->on('food');
                $table->primary(['cart_id', 'food_id']);
            });

            Schema::create('order_status', function (Blueprint $table) {
                $table->smallIncrements('id');
                $table->string('name');

                $table->unique('name', 'unique_name');
            });

            Schema::create('order', function (Blueprint $table) {
                $table->increments('id');
                $table->string('number');
                $table->dateTime('creation_date');
                $table->dateTime('delivery_date');
                $table->text('description')->nullable();
                $table->integer('user_id', false, true);
                $table->smallInteger('order_status_id', false, true);

                $table->unique('number', 'unique_number');
                $table->foreign('user_id')->references('id')->on('user');
                $table->foreign('order_status_id')->references('id')->on('order_status');
            });

            Schema::create('order_has_food', function (Blueprint $table) {
                $table->integer('order_id', false, true);
                $table->integer('food_id', false, true);
                $table->double('actual_price')->unsigned();
                $table->integer('quantity', false, true);

                $table->foreign('order_id')->references('id')->on('order');
                $table->foreign('food_id')->references('id')->on('food');
                $table->primary(['order_id', 'food_id']);
            });

            Schema::create('user_address', function (Blueprint $table) {
                $table->increments('id');
                $table->string('region')->nullable();
                $table->string('city');
                $table->string('street');
                $table->string('house');
                $table->string('flat')->nullable();
                $table->text('description');
                $table->integer('user_id', false, true);

                $table->foreign('user_id')->references('id')->on('user');
            });

            Schema::create('payment_method', function (Blueprint $table) {
                $table->increments('id');
            });

            Schema::create('user_has_payment_method', function (Blueprint $table) {
                $table->integer('user_id', false, true);
                $table->integer('payment_method_id', false, true);

                $table->foreign('user_id')->references('id')->on('user');
                $table->foreign('payment_method_id')->references('id')->on('payment_method');
                $table->primary(['user_id', 'payment_method_id']);
            });

            Schema::create('special', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description')->nullable();
                $table->date('start_date');
                $table->date('end_date')->nullable();
                $table->string('image')->nullable();
                $table->boolean('status')->default(0);
                $table->integer('bonus_rate');
                $table->smallInteger('discount');
            });

            Schema::create('special_has_restaurant', function (Blueprint $table) {
                $table->integer('special_id', false, true);
                $table->integer('restaurant_id', false, true);

                $table->foreign('special_id')->references('id')->on('special');
                $table->foreign('restaurant_id')->references('id')->on('restaurant');
                $table->primary(['special_id', 'restaurant_id']);
            });

            Schema::create('special_has_category', function (Blueprint $table) {
                $table->integer('special_id', false, true);
                $table->integer('category_id', false, true);

                $table->foreign('special_id')->references('id')->on('special');
                $table->foreign('category_id')->references('id')->on('category');
                $table->primary(['special_id', 'category_id']);
            });

            Schema::create('special_has_food', function (Blueprint $table) {
                $table->integer('special_id', false, true);
                $table->integer('food_id', false, true);

                $table->foreign('special_id')->references('id')->on('special');
                $table->foreign('food_id')->references('id')->on('food');
                $table->primary(['special_id', 'food_id']);
            });

            Schema::create('admin', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email');
                $table->string('password');
                $table->smallInteger('user_status_id', false, true);

                $table->foreign('user_status_id')->references('id')->on('user_status');
            });
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropForeign(['user_status_id']);
            $table->drop();
        });

        Schema::table('special_has_food', function (Blueprint $table) {
            $table->dropForeign(['special_id']);
            $table->dropForeign(['food_id']);
            $table->drop();
        });

        Schema::table('special_has_category', function (Blueprint $table) {
            $table->dropForeign(['special_id']);
            $table->dropForeign(['category_id']);
            $table->drop();
        });

        Schema::table('special_has_restaurant', function (Blueprint $table) {
            $table->dropForeign(['special_id']);
            $table->dropForeign(['restaurant_id']);
            $table->drop();
        });

        Schema::table('special', function (Blueprint $table) {
            $table->drop();
        });

        Schema::table('user_has_payment_method', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['payment_method_id']);
            $table->drop();
        });

        Schema::table('payment_method', function (Blueprint $table) {
            $table->drop();
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->drop();
        });

        Schema::table('order_has_food', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['food_id']);
            $table->drop();
        });

        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['order_status_id']);
            $table->drop();
        });

        Schema::table('order_status', function (Blueprint $table) {
            $table->drop();
        });

        Schema::table('cart_has_food', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropForeign(['food_id']);
            $table->drop();
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->drop();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['user_status_id']);
            $table->drop();
        });

        Schema::table('user_status', function (Blueprint $table) {
            $table->drop();
        });

        Schema::table('restaurant_contacts', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->drop();
        });

        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->drop();
        });

        Schema::table('category', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->drop();
        });

        Schema::table('restaurant', function (Blueprint $table) {
            $table->drop();
        });
    }
}