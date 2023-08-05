<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->text('deskripsi');
            $table->string('author');
            $table->string('gambar')->nullable();
            $table->string('pdf')->nullable();
            $table->string('id_penerbit')->default(0)->change();
            $table->string('id_kategori')->default(0)->change();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
