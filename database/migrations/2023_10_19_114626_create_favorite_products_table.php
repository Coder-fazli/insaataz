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
        Schema::create('favorite_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Kullanıcının ID'si
            $table->unsignedBigInteger('product_id'); // Ürünün ID'si
            $table->timestamps();
        
            // Kullanıcı ve ürün ilişkileri için indeksler
            $table->index('client_id');
            $table->index('product_id');
            
            // Kullanıcı ve ürün ilişkileri için dış anahtarlar
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_products', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('favorite_products');
    }
};
