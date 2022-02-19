<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCellulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
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
        Schema::drop('cellules');
    }
}
