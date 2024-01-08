<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name_event');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('detail');
            $table->timestamps();
        });
        Schema::create('sesi_absent_event', function (Blueprint $table) {
            $table->id(); //id absent
            $table->string('id_event');
            $table->date('title');
            $table->date('time_start');
            $table->date('time_end');
            $table->timestamps();
        });
        // voluntir event
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('sesi_absent_event');
    }
};
