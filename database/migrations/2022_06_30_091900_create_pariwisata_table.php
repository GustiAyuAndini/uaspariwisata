<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePariwisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pariwisata', function (Blueprint $table) {
            $table->integer('id',11)->increment();
            $table->string('nama_pengunjung',50);
            $table->string('kota_tujuan',50);
            $table->string('perusahaan_transportasi',50);
            $table->string('harga_tiket_transportasi',50);
            $table->integer('pengunjung_id',11);
            $table->integer('tujuan_id',11);
            $table->integer('transportasi_id',11);
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
        Schema::dropIfExists('pariwisata');
    }
}
