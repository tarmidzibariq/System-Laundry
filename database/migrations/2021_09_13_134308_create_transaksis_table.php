<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->unsignedBigInteger('id_paket');
            // $table->string('kode_invoice');
            // $table->unsignedBigInteger('id_member')->nullable();
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar');
            $table->string('biaya');
            $table->string('diskon');
            $table->string('pajak');
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil'])->default('baru');
            $table->enum('dibayar', ['dibayar', 'belum_dibayar'])->default('belum_dibayar');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            // relationship outlet
            $table->foreign('id_outlet')->references('id')->on('outlets');

            // relationship member
            // $table->foreign('id_member')->references('id')->on('members');

            // relationship paket
            $table->foreign('id_paket')->references('id')->on('pakets');

            // relationship user
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
