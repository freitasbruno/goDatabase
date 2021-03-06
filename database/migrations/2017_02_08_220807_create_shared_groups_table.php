<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parent');
            $table->integer('id_group');
            $table->integer('id_owner');
            $table->integer('id_user');
            $table->string('name');
            $table->enum('privileges', array('view', 'edit'));
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
        Schema::dropIfExists('shared_groups');
    }
}