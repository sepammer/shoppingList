<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('list_id')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->integer('price')->default(0);
            $table->integer('maxPrice')->default(0);
            $table->string('title');
            $table->boolean('done')->default(false);
            $table->timestamps();
            $table->foreign('list_id')->references('id')->on('shopping_lists')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
