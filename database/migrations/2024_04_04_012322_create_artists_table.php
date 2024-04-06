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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('store_name')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('artwork_provided')->nullable();
            $table->string('language')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();
            $table->boolean('is_registered_business')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
};
