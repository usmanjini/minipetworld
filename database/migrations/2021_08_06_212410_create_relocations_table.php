<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relocations', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('petname');
			$table->integer('petage');
			$table->integer('phone');
			$table->string('city'); 
			$table->string('location');
			$table->string('relocation');
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
        Schema::dropIfExists('relocations');
    }
}
