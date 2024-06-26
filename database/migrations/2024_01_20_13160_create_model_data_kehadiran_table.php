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
        Schema::create('data_kehadiran', function (Blueprint $table) {
            $table->id();
            $table->String('absensi_id')->constrained('absensi')->cascadeOnDelete();
            $table->String('peserta_id')->constrained('peserta_event')->cascadeOnDelete();
            $table->String('keterangan');
            $table->string('status');  // 1.hadir, 2.izin, 3.alpa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kehadiran');
    }
};
