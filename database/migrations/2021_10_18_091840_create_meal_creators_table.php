<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealCreatorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_creators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('bio');
            $table->string('phone');
            // $table->string('email');
            // $table->string('password');
            $table->text('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('photo');
            $table->string('logo');
            $table->integer('delivery_from');
            $table->integer('delivery_to');
            // $table->tinyInteger('status')
            //     ->default(1)
            //     ->comment('0 => Inactive, 1 => Active');

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
        Schema::drop('meal_creators');
    }
}
