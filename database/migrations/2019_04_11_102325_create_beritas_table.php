<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reporter_id');
            $table->string('judul');
            $table->string('slug');
            $table->string('gambar');
            $table->string('thumbnails')->nullable();
            $table->string('caption');
            $table->longText('berita');
            $table->integer('dilihat');
            $table->string('kategori')->nullable();
            $table->enum('publish', ['Public', 'Private'])->default('Private');
            $table->enum('status', ['Verifikasi', 'Block', 'Pengajuan'])->default('Pengajuan');
            $table->longText('data')->nullable();
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
}
