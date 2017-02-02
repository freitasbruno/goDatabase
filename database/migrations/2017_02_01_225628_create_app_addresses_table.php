<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parent');
            $table->string('description');
            $table->string('address01')->nullable();
            $table->string('address02')->nullable();
            $table->string('address03')->nullable();
            $table->string('city')->nullable();
            $table->string('country');
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
        Schema::dropIfExists('app_addresses');
    }
}
