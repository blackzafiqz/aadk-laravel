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
        Schema::create('pelajar', function (Blueprint $table)
        {
            $table->string('no_mykad')->primary();
            $table->string('nama')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('address_line')->nullable(false);
            $table->unsignedBigInteger('alamat_id');
            $table->foreign('alamat_id')->references('id')->on('alamat');
            $table->string('kod_sekolah');
            $table->foreign('kod_sekolah')->references('kod_sekolah')->on('sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajar');
    }
};
