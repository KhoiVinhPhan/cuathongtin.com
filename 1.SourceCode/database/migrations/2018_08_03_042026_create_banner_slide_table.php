<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerSlideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_slide', function (Blueprint $table) {
            $table->increments('banner_slide_id');
            $table->string('title')->nullable();
            $table->string('information')->nullable();
            $table->string('path_to_image')->nullable();
            $table->integer('user_id_maked')->nullable();
            $table->integer('user_id_deleted')->nullable();
            $table->integer('user_id_updated')->nullable();
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
        Schema::dropIfExists('banner_slide');
    }
}
