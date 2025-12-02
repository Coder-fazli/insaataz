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
        Schema::table('product_filters', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->after('id');
            $table->foreign('group_id','filter_group_key')->references('id')->on('attribute_group')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_filters', function (Blueprint $table) {
            $table->dropColumn('group_id');
            $table->dropForeign('filter_group_key');
        });
    }
};
