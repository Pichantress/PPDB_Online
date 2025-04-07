<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\registrants;
use App\Models\Admin;
use App\Models\Periode;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\informations as ModelInformations;

// use Illuminate\View\View;

class AuthController extends Controller
{
    public function index()
    {
        return view("halaman_auth/login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $redirectRoute = $user->usertype === 'admin' ? 'admin' : 'registrant';

            return redirect()->route($redirectRoute)->with('success', 'Berhasil login');
        } else {
            return redirect()->route('auth')->withErrors('Username atau password salah!');
        }
    }

    public function create()
    {
        $pendaftaranOnline = ModelInformations::where('Agenda', 'Pendaftaran Online')->first();

        if ($pendaftaranOnline) {
            $currentDate = Carbon::now();
            $endDate = Carbon::parse($pendaftaranOnline->end_date);

            if ($currentDate->gt($endDate)) {
                $registrationClosed = true;
            } else {
                $registrationClosed = false;
            }
        } else {
            $registrationClosed = true; // Default to closed if no "Pendaftaran Online" found
        }
        return view("halaman_depan/index", compact("registrationClosed"));
    }

    public function register(Request $request)
    {
        $request->validate([
            'kenal' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin_id' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kode_pos' => 'required|string|alpha_num|max:255',
            'rw' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'sekolah_asal' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'wa_ayah' => 'required|numeric|regex:/^[0-9]*$/|unique:registrants',
            'nama_ibu' => 'required|string|max:255',
            'wa_ibu' => 'required|numeric|regex:/^[0-9]*$/|unique:registrants',
            'password' => ['required', Rules\Password::defaults()],
            'akta_kelahiran' => 'required|mimes:jpg,jpeg,png,gif|max:5120',
            'kartu_keluarga' => 'required|mimes:jpg,jpeg,png,gif|max:5120',
        ], [
            'name.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'jenis_kelamin_id.required' => 'Jenis Kelamin wajib diisi',
            'kabupaten.required' => 'Kabupaten wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'kelurahan.required' => 'Kelurahan wajib diisi',
            'kode_pos.required' => 'kode_pos wajib diisi',
            'rw.required' => 'Rw wajib diisi',
            'rt.required' => 'RT wajib diisi',
            'sekolah_asal.required' => 'Asal Sekolah wajib diisi',
            'nama_ayah.required' => 'Nama ayah wajib diisi',
            'wa_ayah.required' => 'Nomor WA ayah wajib diisi',
            'nama_ibu.required' => 'Nama ibu wajib diisi',
            'wa_ibu.required' => 'Nomer WA ibu wajib diisi',
            'password.required' => 'Password wajib diisi',
            'akta_kelahiran.required' => 'Akta kelahiran wajib diiupload',
            'kartu_keluarga.required' => 'Kartu keluarga wajib diiupload',
        ]);

        $aktaKelahiranPath = $request->file('akta_kelahiran')->store('uploads/akta_kelahiran', 'public');
        $kartuKeluargaPath = $request->file('kartu_keluarga')->store('uploads/kartu_keluarga', 'public');

        $currentYear = now()->year;

        $registrants = registrants::create([
            'kenal' => $request->kenal,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'jenis_kelamin_id' => $request->jenis_kelamin_id,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'sekolah_asal' => $request->sekolah_asal,
            'nama_ayah' => $request->nama_ayah,
            'wa_ayah' => $request->wa_ayah,
            'nama_ibu' => $request->nama_ibu,
            'wa_ibu' => $request->wa_ibu,
            'password' => Hash::make($request->password),
            'akta_kelahiran' => $aktaKelahiranPath,
            'kartu_keluarga' => $kartuKeluargaPath,
            'periode' => $currentYear,
        ]);

        event(new Registered($registrants));

        return redirect()->route('auth')->with('success', 'username anda adalah ' . $registrants->username);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}


