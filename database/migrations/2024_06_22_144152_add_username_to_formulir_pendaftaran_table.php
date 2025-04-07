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
        Schema::table('formulir_pendaftaran', function (Blueprint $table) {
            $table->string('username')->after('registrant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formulir_pendaftaran', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
