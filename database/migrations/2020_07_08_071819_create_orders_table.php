<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('order_no'); 
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('country');
            $table->string('zone');
            $table->string('area');
            $table->string('postal_code');
            $table->string('address');
            $table->string('phone');
            $table->string('message'); 
            $table->date('order_on');
            $table->string('payment_method');
            $table->integer('total_items'); 
            $table->string('status')->default('new'); //pendinding , shiipped , new
            $table->string('notes');
            $table->date('shipped_on'); 
            $table->integer('customer_id')->unsigned()->nullable()->default(null);
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
}
