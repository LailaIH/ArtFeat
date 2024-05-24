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
            $table->unsignedBigInteger('artwork_provided_id')->nullable();
            $table->foreign('artwork_provided_id')->references('id')->on('artwork_provided')->onDelete('set null');

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
            $table->dropForeign(['artwork_provided_id']);

            // Drop the foreign key column
            $table->dropColumn('artwork_provided_id');
        });
    }
};
