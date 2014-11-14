<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
         Schema::create('rooms', function($table) {
             
         
	$table->increments('id');
 
        # created_at, updated_at columns
        $table->timestamps();
 
        # General data...
        $table->string('name');
        $table->string('admin');
        
         });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	Schema::drop('rooms');
	}

}
