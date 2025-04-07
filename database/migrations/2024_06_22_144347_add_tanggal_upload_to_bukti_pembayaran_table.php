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
        Schema::table('bukti_pembayaran', function (Blueprint $table) {
            $table->timestamp('tanggal_upload')->nullable()->after('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bukti_pembayaran', function (Blueprint $table) {
            $table->dropColumn('tanggal_upload');
        });
    }
};
