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
        Schema::table('options', function (Blueprint $table) {
            $table->string('slide_img_1')->nullable();
            $table->string('slide_img_2')->nullable();
            $table->string('slide_img_3')->nullable();
            $table->text('slide_text_1')->nullable();
            $table->text('slide_text_2')->nullable();
            $table->text('slide_text_3')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->text('why_artfeat_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->dropColumn([
                'slide_img_1',
                'slide_img_2',
                'slide_img_3',
                'slide_text_1',
                'slide_text_2',
                'slide_text_3',
                'primary_color',
                'secondary_color',
                'why_artfeat_text',
            ]);
        });
    }
};
