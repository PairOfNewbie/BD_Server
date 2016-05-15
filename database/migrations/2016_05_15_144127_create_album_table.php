<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('album_data', function (Blueprint $table) {
            $table->increments('album_id');
            $table->string('date');
            $table->string('text');
            $table->string('img_url');
            $table->string('music_url');
            $table->string('page_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	Schema::drop('album_data');
    }
}
