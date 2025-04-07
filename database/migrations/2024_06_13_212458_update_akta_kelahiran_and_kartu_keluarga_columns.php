<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('registrants', function (Blueprint $table) {
            $table->string('akta_kelahiran')->nullable()->change();
            $table->string('kartu_keluarga')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrants', function (Blueprint $table) {
            // Change back to the original type if needed
            $table->string('akta_kelahiran')->nullable(false)->change();
            $table->string('kartu_keluarga')->nullable(false)->change();
        });
    }
};
