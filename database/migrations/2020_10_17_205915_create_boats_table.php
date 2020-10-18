<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->string('mainpic', 100)->nullable();
            $table->string('thumbnails', 100);
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->integer('year');
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->integer('size');
            $table->integer('guests_qty');
            $table->integer('bedrooms_qty');
            $table->integer('sleepers_qty');
            $table->integer('showers_qty');
            $table->boolean('with_capitan')->default(false);
            $table->boolean('instant_confirmation')->default(false);
            $table->boolean('fuel_included')->default(false);
            $table->string('additionally_included', 100);
            $table->string('documents', 100);
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->nullOnDelete();
            
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boats');
    }
}
