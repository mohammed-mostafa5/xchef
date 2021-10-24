<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionalProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritional_profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedTinyInteger('status')
                ->default(1)
                ->comment('0 => Inactive, 1 => Active');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('nutritional_profile_translations', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('nutritional_profile_id');
            $table->string('locale', 2)->index();

            $table->string('name');

            // $table->unique(['nutritional_profile_id', 'locale']);

            $table->foreign('nutritional_profile_id')->references('id')->on('nutritional_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nutritional_profile_translations');
        Schema::drop('nutritional_profiles');
    }
}
