<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_cmd');
            $table->string('payment_intent_id')->unique();
            $table->integer('amount');
            $table->dateTime('payment_created_at');
            $table->text('products');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->engine='InnoDB';
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
}
