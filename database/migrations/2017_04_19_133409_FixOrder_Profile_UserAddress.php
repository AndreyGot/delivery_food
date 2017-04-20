<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixOrderProfileUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });

        Schema::table('order', function (Blueprint $table) {
            $table->integer('user_address_id', false, true)->nullable();

            $table->foreign('user_address_id')->references('id')->on('user_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['user_address_id']);
            $table->dropColumn('user_address_id');
        });

        Schema::table('user_address', function (Blueprint $table) {
            $table->string('description')->change();
        });

        Schema::table('profile', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
}
