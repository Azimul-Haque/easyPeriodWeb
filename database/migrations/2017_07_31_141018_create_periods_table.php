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
        $table->datetime('start')->unique();
        $table->datetime('end');
        $table->text('description');
        $table->string('email');
        $table->string('uniquekey')->unique();
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
