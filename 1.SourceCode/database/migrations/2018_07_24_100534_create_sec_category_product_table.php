<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_category_product', function (Blueprint $table) {
            $table->increments('sec_category_product_id');
            $table->string('name')->nullable();
            $table->integer('category_product_id')->nullable();
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
        Schema::dropIfExists('sec_category_product');
    }
}
