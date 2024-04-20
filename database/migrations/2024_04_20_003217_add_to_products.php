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
        Schema::table('products', function (Blueprint $table) {
            $table->string('artwork_type')->nullable();
            $table->string('digital_work_file')->nullable();
            $table->boolean('is_created_by_artist')->default(true);
            $table->date('creation_date')->nullable();
            $table->string('artwork_dimensions')->nullable();
            $table->decimal('price_after_discount', 8, 2)->nullable();
            $table->boolean('product_visibility')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('artwork_type');
            $table->dropColumn('digital_work_file');
            $table->dropColumn('is_created_by_artist');
            $table->dropColumn('creation_date');
            $table->dropColumn('artwork_dimensions');
            $table->dropColumn('price_after_discount');
            $table->dropColumn('product_visibility');
        });
    }
};
