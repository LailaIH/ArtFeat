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
            $table->dropColumn(['paypal_key', 'paypal_secret','stripe_key','stripe_secret','crypto_key','crypto_secret','site_name','tags','primary_color',
        'secondary_color','is_online','slide_img_1','slide_img_2','slide_img_3'
        , 'slide_text_1','slide_text_2','slide_text_3','why_artfeat_text']);
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
            $table->string('paypal_key')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->string('crypto_key')->nullable();
            $table->string('site_name')->nullable();
            $table->string('tags')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('is_online')->nullable();
            $table->string('crypto_secret')->nullable();
            $table->string('slide_img_1')->nullable();
            $table->string('slide_img_2')->nullable();
            $table->string('slide_img_3')->nullable();
            $table->text('slide_text_1')->nullable();
            $table->text('slide_text_2')->nullable();
            $table->text('slide_text_3')->nullable();
            $table->text('why_artfeat_text')->nullable();
        });
    }
};
