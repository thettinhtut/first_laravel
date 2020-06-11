<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('ingredients');
            $table->text('category');
           // $table->unsignedBigInteger('category');
            $table->timestamps();
            //  $table->foreign('category')
            // ->references('id')->on('category')
            // ->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipes');
    }
}
