<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\acceptedRegistrants;
use Illuminate\Support\Facades\Hash;
use App\Models\acceptedRegistrants as ModelAccRegistrants;


class SiswaController extends Controller
{
    public function index()
    {
        $data = ModelAccRegistrants::all()->groupBy(function($item) {
            return $item->periode;
        });
        return view('admin.data_siswa', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = ModelAccRegistrants::find($id);
        return view('admin.edit_siswa', ['data' => $data]);

    }
    function change(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'kabupaten' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kelurahan' => ['required', 'string', 'max:255'],
            'kode_pos' => ['required', 'string', 'alpha_num', 'max:255'],
            'rw' => ['required', 'string', 'max:255'],
            'rt' => ['required', 'string', 'max:255'],
            'sekolah_asal' => ['required', 'string', 'max:255'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'no_kk' => ['required', 'string', 'max:255'],
            'no_akta_kelahiran' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
        ], [
            'username.required' => 'Username wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'kabupaten.required' => 'Kabupaten wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'kelurahan.required' => 'Kelurahan wajib diisi',
            'kode_pos.required' => 'kode_pos wajib diisi',
            'rw.required' => 'Rw wajib diisi',
            'rt.required' => 'RT wajib diisi',
            'sekolah_asal.required' => 'Asal Sekolah wajib diisi',
            'nama_ayah.required' => 'Nama ayah wajib diisi',
            'nama_ibu.required' => 'Nama ibu wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'no_kk.required' => 'Nomor KK wajib diisi',
            'no_akta_kelahiran.required' => 'Nomor akta kelahiran wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
        ]);



        $user = ModelAccRegistrants::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->kabupaten = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->kode_pos = $request->kode_pos;
        $user->rw = $request->rw;
        $user->rt = $request->rt;
        $user->sekolah_asal = $request->sekolah_asal;
        $user->nama_ayah = $request->nama_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->nik = $request->nik;
        $user->no_kk = $request->no_kk;
        $user->no_akta_kelahiran = $request->no_akta_kelahiran;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();

        Session::flash('success', 'Data Siswa berhasil diedit');

        return redirect('datasiswa');
    }
    public function hapus(Request $request)
    {
        ModelAccRegistrants::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('datasiswa');
    }
    public function view($id){
        $data = ModelAccRegistrants::find($id);
        return view('admin.view_siswa', ['data' => $data]);
    }
}
