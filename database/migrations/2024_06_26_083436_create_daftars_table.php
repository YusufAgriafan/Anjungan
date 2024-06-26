<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->string('no_rkm_medis')->unique();
            $table->string('nm_pasien');
            $table->string('metode_pembayaran');
            $table->date('tanggal_kunjungan');
            $table->string('kd_poli');
            $table->string('kd_dokter');
            $table->text('alamat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
