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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->json('title');
            $table->json('desc')->nullable();
            $table->json('slug')->nullable();
            $table->boolean('status')->default(\App\Enum\Status::ACTIVE);
            $table->boolean('is_chosen')->default(\App\Enum\Status::INACTIVE);
            $table->boolean('is_best_seller')->default(\App\Enum\Status::INACTIVE);
          
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->json('title');
            $table->json('desc')->nullable();
//            $table->foreignId('product_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });

        Schema::create('product_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->json('image');
            $table->boolean('is_front')->default(\App\Enum\Status::INACTIVE);
            $table->boolean('is_back')->default(\App\Enum\Status::INACTIVE);
//            $table->foreignId('product_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_features');
        Schema::dropIfExists('product_photos');
    }
};
