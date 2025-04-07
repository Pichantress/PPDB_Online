<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToBuktiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bukti_pembayaran', function (Blueprint $table) {
            $table->string('username')->after('registrant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bukti_pembayaran', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
}