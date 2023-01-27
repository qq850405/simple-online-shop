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

        // reference https://github.com/YangYangXun/Laravel-EcommerceFashe/blob/master/database/migrations/2018_09_27_024043_create_orders_table.php
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id')->unsigned()->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')
                ->onUpdate('cascade');
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_phone');
            $table->string('billing_name_on_card');
            $table->integer('billing_total');
            $table->string('payment_gateway')->default('cash');
            $table->string('error')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
