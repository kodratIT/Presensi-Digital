<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->Unique(); //qr
            $table->string('id_posisition')->unique();
            $table->string('full_name')->nullable();
            $table->integer('id_nft')->nullable(); // nft
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // posisition
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
