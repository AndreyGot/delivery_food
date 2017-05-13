<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentFixes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->integer('restaurant_id', false, true)->nullable();
            $table->integer('comment_id', false, true)->nullable();

            $table->foreign('restaurant_id')->references('id')->on('restaurant');
            $table->foreign('comment_id')->references('id')->on('comment');
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
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['comment_id']);

            $table->dropColumn('restaurant_id');
            $table->dropColumn('comment_id');

        });
    }
}
