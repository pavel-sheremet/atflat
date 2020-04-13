<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('used')->default(false);
            $table->boolean('user_id')->unsigned()->required();
            $table->bigInteger('bytes');
            $table->string('fileable_type')->nullable();
            $table->bigInteger('fileable_id')->unsigned()->nullable();
            $table->string('mime_type');
            $table->string('disk');
            $table->string('path')->unique();
            $table->string('client_name');
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
        Schema::dropIfExists('files');
    }
}
