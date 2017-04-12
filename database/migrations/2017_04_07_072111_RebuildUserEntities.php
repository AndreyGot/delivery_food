<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RebuildUserEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

            $table->integer('profile_id', false, true);

        });

        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

            $table->integer('profile_id', false, true);
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

            $table->integer('profile_id', false, true);
        });

        Schema::table('user_has_payment_method', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

            $table->rename('profile_has_payment_method');

            $table->integer('profile_id', false, true);
        });


        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['user_status_id']);
            $table->dropColumn(['email', 'user_status_id']);
            $table->rename('profile');

        });

        Schema::table('admin', function (Blueprint $table) {
            $table->dropForeign(['user_status_id']);

            $table->dropColumn('name');
            $table->string('nickname');

            $table->rename('user');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->integer('profile_id', false, true)->nullable();

            $table->foreign('user_status_id')->references('id')->on('user_status');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });

        Schema::table('order', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });

        Schema::table('profile_has_payment_method', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        Schema::table('profile_has_payment_method', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });

        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['user_status_id']);
            $table->dropColumn('nickname');
            $table->string('name');
            $table->rename('admin');
        });

        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['profile_id']);

            $table->foreign('user_status_id')->references('id')->on('user_status');
        });

        Schema::table('profile', function (Blueprint $table) {
            $table->rename('user');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->smallInteger('user_status_id', false, true);
            $table->string('email');
            $table->unique('email');

            $table->foreign('user_status_id')->references('id')->on('user_status');
        });

        Schema::table('profile_has_payment_method', function (Blueprint $table) {
            $table->dropColumn(['profile_id']);
            $table->rename('user_has_payment_method');
        });

        Schema::table('user_has_payment_method', function (Blueprint $table) {
            $table->integer('user_id', false, true);

            $table->foreign('user_id')->references('id')->on('user');
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->dropColumn(['profile_id']);

            $table->integer('user_id', false, true);

            $table->foreign('user_id')->references('id')->on('user');
        });

        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn(['profile_id']);

            $table->integer('user_id', false, true);

            $table->foreign('user_id')->references('id')->on('user');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropColumn(['profile_id']);

            $table->integer('user_id', false, true);

            $table->foreign('user_id')->references('id')->on('user');
        });
    }
}
