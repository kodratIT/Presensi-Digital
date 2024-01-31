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
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->string('id_absent_event');
            $table->string('id_user');
            $table->string('absent');
            $table->string('tipe');
            $table->timestamps();

            // Menambahkan constraint unik pada kombinasi id_absent_event, id_user, dan tipe
            $table->unique(['id_absent_event', 'id_user']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
