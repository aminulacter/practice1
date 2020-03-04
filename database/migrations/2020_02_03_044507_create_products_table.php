<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->mediumText('details');
            $table->mediumText('description');
            $table->string('highlights')->nullable();
            $table->unsignedBigInteger('favorite_count')->default(0);
            $table->decimal('rating', 3, 1)->default(0);
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('vedio')->nullable();
            $table->string('version')->default('1.0.0');
            $table->string('layout')->nullable()->default('responsive');
            $table->boolean('retina_ready')->default(true);
            $table->text('files_included')->nullable();
            $table->text('browser')->nullable();
            $table->string('bootstrap')->default('BootStrap 4');
            $table->timestamps();
           
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
}
