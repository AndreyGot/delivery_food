<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssociationTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('association_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unique('name', 'unique_name');
        });

        Schema::create('category_has_association', function (Blueprint $table) {
            $table->integer('category_id', false, true);
            $table->integer('association_id', false, true);

            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('association_id')->references('id')->on('association_category');
            $table->primary(['category_id', 'association_id']);
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('category_has_association', function (Blueprint $table)
        {
            $table->drop();
        });

        Schema::table('association_category', function (Blueprint $table)
        {
            $table->drop();
        });
    }
}
