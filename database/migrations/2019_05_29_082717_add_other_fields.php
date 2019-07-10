<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add other fields to the orders table
        Schema::table('orders',function(Blueprint $table){
     
               $table->string('email');
               $table->string('first-name');
               $table->string('last-name');
               $table->string('address',120);
               $table->integer('zip');
               $table->integer('del');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Shema::table('orders',function(Blueprint $table){
        //
        });
    }
}
