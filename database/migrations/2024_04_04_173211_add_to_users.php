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
        Schema::table('users', function (Blueprint $table) {
            $table->string('store_name')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('artwork_provided')->nullable();
            $table->boolean('registered_business')->default(false);
            $table->string('language')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('store_name');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('artwork_provided');
            $table->dropColumn('registered_business');
            $table->dropColumn('language');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('tiktok');
        });
    }
};
