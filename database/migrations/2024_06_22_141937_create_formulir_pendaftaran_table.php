<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirPendaftaranTable extends Migration
{
    public function up(): void
    {
        Schema::create('formulir_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrant_id')->constrained('registrants')->onDelete('cascade');
            $table->string('name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formulir_pendaftaran');
    }
}

