<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            // add column
            $table->unsignedBigInteger('restaurant_id')->nullable()->after('id');

            // specify FK constraint
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            // remove constraint
            $table->dropForeign('dishes_restaurant_id_foreign');

            // drop column
            $table->dropColumn('restaurant_id');
        });
    }
};
