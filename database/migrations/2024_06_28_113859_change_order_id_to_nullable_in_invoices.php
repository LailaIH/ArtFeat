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
        Schema::table('invoices', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['order_id']);

            // Change the column to be nullable
            $table->unsignedBigInteger('order_id')->nullable()->change();

            // Add the foreign key constraint back
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['order_id']);

            // Change the column to be non-nullable
            $table->unsignedBigInteger('order_id')->nullable(false)->change();

            // Add the foreign key constraint back
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
};
