<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('periods', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->date('start');
        $table->date('end');
        $table->text('description');
        $table->timestamps();
      });

      Schema::table('periods', function($table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periods');
    }
}