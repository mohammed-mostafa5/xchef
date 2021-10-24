<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisinesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisines', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedTinyInteger('status')
            ->default(1)
            ->comment('0 => Inactive, 1 => Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cuisine_translations', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('cuisine_id');
            $table->string('locale', 2)->index();

            $table->string('name');

            $table->unique(['cuisine_id', 'locale']);

            $table->foreign('cuisine_id')->references('id')->on('cuisines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuisine_translations');
        Schema::drop('cuisines');
    }
}
