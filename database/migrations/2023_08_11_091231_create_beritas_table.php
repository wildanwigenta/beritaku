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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id('id_berita');

            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');

            // $table->foreignId('id_kategori')->constrained();

            $table->text('image');
            $table->text('judul');
            $table->text('isi');
            $table->datetime('waktu_publish');
            $table->enum('keterangan',['publish','pending']);
            $table->integer('dilihat')->nullable();
            $table->text('nama_publisher');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            
            // $table->foreignId('id')->constrained();

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
        Schema::dropIfExists('beritas');
    }
};
