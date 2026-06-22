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
        if (Schema::hasColumn('about', 'hero_title')) {
            return;
        }

        Schema::table('about', function (Blueprint $table) {
            // Hero section
            $table->json('hero_badge')->nullable();
            $table->json('hero_title')->nullable();
            $table->json('hero_title_highlight')->nullable();
            $table->json('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            // Content ("Why us") section
            $table->json('whyus_badge')->nullable();
            $table->json('whyus_title')->nullable();
            $table->json('whyus_title_highlight')->nullable();
            $table->json('whyus_lead')->nullable();

            // Quality guarantee card (inside content section)
            $table->string('guarantee_icon')->nullable();
            $table->json('guarantee_title')->nullable();
            $table->json('guarantee_subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about', function (Blueprint $table) {
            $table->dropColumn([
                'hero_badge',
                'hero_title',
                'hero_title_highlight',
                'hero_description',
                'hero_image',
                'whyus_badge',
                'whyus_title',
                'whyus_title_highlight',
                'whyus_lead',
                'guarantee_icon',
                'guarantee_title',
                'guarantee_subtitle',
            ]);
        });
    }
};
