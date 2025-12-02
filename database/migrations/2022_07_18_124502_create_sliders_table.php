<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->nullable();
            $table->unsignedInteger('training_id')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->boolean('status')->default(\App\Enum\Status::ACTIVE);
            $table->string('image')->nullable();
            $table->timestamps();
        });
        DB::statement('UPDATE sliders SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
