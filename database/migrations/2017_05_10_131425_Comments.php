<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->smallInteger('rating');
            $table->dateTime('creation_date');

            $table->integer('profile_id', false, true);
            $table->integer('restaurant_id', false, true);

            $table->foreign('profile_id')->references('id')->on('profile');
            $table->foreign('restaurant_id')->references('id')->on('restaurant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropForeign(['restaurant_id']);

            $table->drop();
        });
    }
}
