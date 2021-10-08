<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name');
            $table->string('slug');
			$table->integer('phone');
			$table->string('breed');
			$table->string('group');
			$table->string('location');
            $table->longText('description'); 
            $table->string('image');
			$table->string('gender');
			$table->string('color');
			$table->integer('age');
			$table->string('petfor');
            $table->integer('price');
            $table->boolean('new_product');//enabled or disabled 
            $table->boolean('feature');//enabled or disabled  
            $table->boolean('status'); //enabled or disabled 
			$table->string('hypoallergenic'); //enabled or disabled 
			$table->string('housetrain'); //enabled or disabled 
			$table->string('declawed'); //enabled or disabled 
			$table->string('specialdiet'); //enabled or disabled 
			$table->string('like_to_lap'); //enabled or disabled 
			$table->string('specialneed'); //enabled or disabled 
			$table->string('medical'); //enabled or disabled 
			$table->string('neutered'); //enabled or disabled 
			$table->string('vaccinated'); //enabled or disabled 
			$table->string('highrisk'); //enabled or disabled  
            $table->integer('petcategory_id')->unsigned(); 
            $table->integer('sub_petcategory_id')->unsigned();  
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
        Schema::dropIfExists('posts');
    }
}
