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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();;
            $table->longText('description')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('image');
            $table->decimal('price',8,2)->nullable();
            $table->decimal('discount_price', 8,2)->nullable();
            $table->integer('category_id')->unsigned()->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('merchant_id')->unsigned()->onDelete('cascade');
            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('offer')->default(0);
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
        Schema::dropIfExists('products');
    }
};
