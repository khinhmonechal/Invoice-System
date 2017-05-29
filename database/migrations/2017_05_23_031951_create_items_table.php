<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->string('itemName');
            $table->integer('noOfItems');
            $table->integer('price');
            $table->integer('itemTotal');
            $table->integer('subTotal');
            $table->integer('tax');      
            $table->integer('total');
            $table->integer('inv_id');
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
        Schema::dropIfExists('items');
    }
}
