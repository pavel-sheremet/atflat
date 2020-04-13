<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->boolean('active')->default(true);
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('main_image_id')->nullable()->unsigned();
            $table->double('price');
            $table->double('sub_price')->nullable();
            $table->double('area')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('rooms_number_id')->nullable()->unsigned();
            $table->longText('description')->nullable();
            $table->double('lat');
            $table->double('long');

            $table->string('province')->nullable();
            $table->string('geo_area')->nullable();
            $table->bigInteger('city_id');
            $table->string('vegetation')->nullable();
            $table->string('district')->nullable();
            $table->string('street');
            $table->string('house')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realties');
    }
}
