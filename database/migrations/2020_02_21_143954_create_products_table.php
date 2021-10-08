<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('code')->unique(); 
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('features');
            $table->longText('terms_conditions');
            $table->string('image');
            $table->float('price' ,10, 2);   
            $table->integer('qty');
            $table->boolean('new_product');//enabled or disabled 
            $table->boolean('feature');//enabled or disabled  
            $table->boolean('status'); //enabled or disabled 
            $table->integer('category_id')->unsigned(); 
            $table->integer('sub_category_id')->unsigned();  
            $table->integer('sequence');
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
        Schema::dropIfExists('products');
    }
}
