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
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->string('kenal');
            $table->string('name');
            $table->foreignId('jenis_kelamin_id')->constrained('gender_types');
            $table->string('username')->unique();
            $table->enum('usertype',['admin','registrant'])->default('registrant');
            $table->string('alamat');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->string('rw');
            $table->string('rt');
            $table->string('sekolah_asal');
            $table->string('nama_ayah');
            $table->string('wa_ayah')->unique()->length(15);
            $table->string('nama_ibu');
            $table->string('wa_ibu')->unique()->length(15); // or any other suitable length
            $table->string('password');
            $table->binary('akta_kelahiran');
            $table->binary('kartu_keluarga');
            $table->foreignId('status_id')->constrained();
            $table->year('periode')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrants');
    }
};
