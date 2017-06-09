<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('notifications', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('id_user');
	        $table->enum('type', array('message', 'success', 'warning', 'danger'));
	        $table->string('message');
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
        Schema::dropIfExists('notifications');
    }
}
