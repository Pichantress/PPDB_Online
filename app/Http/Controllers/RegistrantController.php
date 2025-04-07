<?php

namespace App\Http\Controllers;

use App\Models\registrants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RegistrantController extends Controller
{
    public function index()
    {
        $username = Auth::user()->username;
        $data = registrants::where('username', $username)->first();
        return view('halaman_dashboard.registrant_dashboard', compact('data'));
    }
    // public function index($username){
    //     $data = registrants::where('username', $username)->first();
    //     return view('halaman_dashboard.registrant_dashboard', ['data'=>$data]);
    // }

    // public function pay($id)
    // {
    //     $data = registrants::find($id);
    //     return view('registrant.pembayaran', ['data' => $data]);
    // }

    public function edit($id)
    {
        $data = registrants::find($id);
        return view('registrant.edit_data', ['data' => $data]);

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
            'wa_ayah' => ['required', 'string', 'max:255'],
            'wa_ibu' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'agama' => ['required', 'string', 'max:255'],
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
            'kode_pos.required' => 'Kode pos wajib diisi',
            'rw.required' => 'RW wajib diisi',
            'rt.required' => 'RT wajib diisi',
            'sekolah_asal.required' => 'Asal sekolah wajib diisi',
            'nama_ayah.required' => 'Nama ayah wajib diisi',
            'nama_ibu.required' => 'Nama ibu wajib diisi',
            'wa_ayah.required' => 'Nomor Whatsapp ayah wajib diisi',
            'wa_ibu.required' => 'Nomor Whatsapp ibu wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'no_kk.required' => 'Nomor KK wajib diisi',
            'no_akta_kelahiran.required' => 'Nomor akta kelahiran wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
        ]);
    
        $user = registrants::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->kabupaten = $request->kabupaten;
        $user->kecamatan = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->kode_pos = $request->kode_pos;
        $user->rw = $request->rw;
        $user->rt = $request->rt;
        $user->sekolah_asal = $request->sekolah_asal;
        $user->nama_ayah = $request->nama_ayah;
        $user->wa_ayah = $request->wa_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->wa_ibu = $request->wa_ibu;
        $user->nik = $request->nik;
        $user->agama = $request->agama;
        $user->no_kk = $request->no_kk;
        $user->no_akta_kelahiran = $request->no_akta_kelahiran;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
    
        // Handle profile photo upload
        // if ($request->hasFile('profil_path')) {
        //     // Delete the old profile photo if it exists
        //     if ($user->profil_path) {
        //         Storage::disk('public')->delete($user->profil_path);
        //     }
    
        //     // Store the new profile photo
        //     $path = $request->file('profil_path')->store('profile_photos', 'public');
        //     $user->profil_path = $path;
        // }
    
        $user->save();

        Session::flash('success', 'Data berhasil diubah');

        return redirect('registrant');
    }
}

