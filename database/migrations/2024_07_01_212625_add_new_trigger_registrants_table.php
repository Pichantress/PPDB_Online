<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addtrigger extends Migration
{
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS Addtrigger');
        
        DB::unprepared('
            CREATE TRIGGER Addtrigger
            AFTER UPDATE ON registrants FOR EACH ROW
            BEGIN
                IF NEW.status_id = 4 THEN
                    INSERT INTO accepted_registrants (name, username, usertype, alamat, kabupaten, kecamatan, kelurahan, kode_pos, rw, rt, sekolah_asal, nama_ayah, wa_ayah, nama_ibu, wa_ibu, password, akta_kelahiran, kartu_keluarga, status_id, jenis_kelamin_id, periode, bukti_pembayaran_path, formulir_path)
                    VALUES (NEW.name, NEW.username, NEW.usertype, NEW.alamat, NEW.kabupaten, NEW.kecamatan, NEW.kelurahan, NEW.kode_pos, NEW.rw, NEW.rt, NEW.sekolah_asal, NEW.nama_ayah, NEW.wa_ayah, NEW.nama_ibu, NEW.wa_ibu, NEW.password, NEW.akta_kelahiran, NEW.kartu_keluarga, NEW.status_id, NEW.jenis_kelamin_id, NEW.periode, NEW.bukti_pembayaran_path, NEW.formulir_path);
                END IF;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS Addtrigger');
    }
}
