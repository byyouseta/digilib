<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('tahun', 4);
            $table->string('penerbit', 50);
            $table->string('penulis', 100);
            $table->integer('kategori_id');
            $table->bigInteger('dilihat')->nullable();
            $table->string('file')->nullable();
            $table->text('abstrak');
            $table->text('tag');
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
        Schema::dropIfExists('books');
    }
}
