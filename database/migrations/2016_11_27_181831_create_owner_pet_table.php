<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_pet', function (Blueprint $table) {
            $table->integer('owner_id')->unsigned()->index();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

            $table->integer('pet_id')->unsigned()->index();
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owner_pet');
    }
}
