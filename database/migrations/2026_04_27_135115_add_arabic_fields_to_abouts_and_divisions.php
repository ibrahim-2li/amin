<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('hero_title_ar')->nullable()->after('hero_title');
            $table->text('hero_subtitle_ar')->nullable()->after('hero_subtitle');
            $table->string('home_title_ar')->nullable()->after('home_title');
            $table->text('home_text_ar')->nullable()->after('home_text');
            $table->string('home_delivery_label_ar')->nullable()->after('home_delivery_label');
            $table->text('home_delivery_text_ar')->nullable()->after('home_delivery_text');
            $table->json('home_features_ar')->nullable()->after('home_features');
            $table->string('purpose_title_ar')->nullable()->after('purpose_title');
            $table->text('purpose_description_ar')->nullable()->after('purpose_description');
            $table->text('mission_ar')->nullable()->after('mission');
            $table->text('vision_ar')->nullable()->after('vision');
            $table->text('backing_ar')->nullable()->after('backing');
            $table->json('values_ar')->nullable()->after('values');
        });

        Schema::table('divisions', function (Blueprint $table) {
            $table->string('name_ar')->nullable()->after('name');
            $table->string('tagline_ar')->nullable()->after('tagline');
            $table->text('description_ar')->nullable()->after('description');
            $table->text('long_description_ar')->nullable()->after('long_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_ar', 'hero_subtitle_ar', 'home_title_ar', 'home_text_ar',
                'home_delivery_label_ar', 'home_delivery_text_ar', 'home_features_ar',
                'purpose_title_ar', 'purpose_description_ar', 'mission_ar', 'vision_ar',
                'backing_ar', 'values_ar'
            ]);
        });

        Schema::table('divisions', function (Blueprint $table) {
            $table->dropColumn(['name_ar', 'tagline_ar', 'description_ar', 'long_description_ar']);
        });
    }
};
