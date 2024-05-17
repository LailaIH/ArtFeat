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
        Schema::table('artists', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->json('expertise')->nullable();
            $table->string('website')->nullable();
            $table->string('behance')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('years_of_experience');
            $table->dropColumn('expertise');
            $table->dropColumn('website');
            $table->dropColumn('behance');
        });
    }
};
