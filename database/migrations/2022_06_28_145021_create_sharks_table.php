<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharks', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('name',255);
            $table->string('email',255);
            $table->integer('age');

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
        Schema::table('sharks', function (Blueprint $table) {
            //
        });
    }
};
