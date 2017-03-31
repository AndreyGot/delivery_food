<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixCategoriesUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->dropUnique('unique_alias');
            $table->unique(['restaurant_id', 'alias'], 'unique_restairantid_alias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->dropUnique(['restaurant_id', 'alias'], 'unique_restairantid_alias');
            $table->unique('unique_alias');
        });
    }
}
