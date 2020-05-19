<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('salsa_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('salsa_id')->references('id')->on('salsas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('deliveries_detail');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
