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
        Schema::table('job_titles', function (Blueprint $table) {
            $table->boolean('is_online')->default(true); // Add the new column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_titles', function (Blueprint $table) {
            $table->dropColumn('is_online'); // Remove the column if needed
        });
    }
};
