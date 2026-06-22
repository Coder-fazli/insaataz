<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Feature cards (3+ cards in the "Features" section)
        if (!Schema::hasTable('about_feature_cards')) {
            Schema::create('about_feature_cards', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->nullable();
                $table->json('title');
                $table->json('description')->nullable();
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Checklist items (the "Why us" bullet list)
        if (!Schema::hasTable('about_checklist_items')) {
            Schema::create('about_checklist_items', function (Blueprint $table) {
                $table->id();
                $table->json('text');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Stat cards (the floating "500+", "50+" cards)
        if (!Schema::hasTable('about_stat_cards')) {
            Schema::create('about_stat_cards', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->nullable();
                $table->string('value');
                $table->json('label');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_stat_cards');
        Schema::dropIfExists('about_checklist_items');
        Schema::dropIfExists('about_feature_cards');
    }
};
