<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\acceptedRegistrants;
use App\Models\BuktiPembayaran;
use Illuminate\Support\Facades\Hash;
use App\Models\registrants as ModelRegistrants;
use App\Models\acceptedRegistrants as ModelAccRegistrants;


class DataPendaftarController extends Controller
{
    public function index()
    {
        $data = ModelRegistrants::where('usertype', 'registrant')->orderBy('status_id', 'asc') // Sort by status_id ascending
            ->orderBy('periode', 'desc') // Sort by status_id ascending
            ->get()
            ->groupBy(function ($item) {
                return $item->periode;
            });
        return view('admin.data_pendaftar', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = ModelRegistrants::find($id);
        return view('admin.edit', ['data' => $data]);

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



        $user = ModelRegistrants::find($request->id);
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

        Session::flash('success', 'Data Pendaftar berhasil diedit');

        return redirect('datapendaftar');
    }
    public function hapus(Request $request)
    {
        ModelRegistrants::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('datapendaftar');
    }
    public function markAsPending($id)
    {
        try {
            $moveData = ModelRegistrants::find($id);

            if (!$moveData) {
                return redirect()->back()->with('error', 'Record not found.');
            }

            \DB::beginTransaction();
            try {
                $moveData->status_id = 3;
                $moveData->save();

                \DB::commit();

                return redirect()->route('datapendaftar')->with('success', 'Record marked as verified.');
            } catch (\Exception $e) {
                \DB::rollback();

                return redirect()->back()->with('error', 'Failed to mark record as verified.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function markAsFailed($id)
    {
        try {
            $moveData = ModelRegistrants::find($id);

            if (!$moveData) {
                return redirect()->back()->with('error', 'Record not found.');
            }

            \DB::beginTransaction();
            try {
                $moveData->status_id = 5;
                $moveData->save();

                \DB::commit();

                return redirect()->route('datapendaftar')->with('success', 'Record marked as Failed.');
            } catch (\Exception $e) {
                \DB::rollback();

                return redirect()->back()->with('error', 'Failed to mark record as Failed.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function markAsAccepted($id)
    {
        try {
            $moveData = ModelRegistrants::find($id);

            if (!$moveData) {
                return redirect()->back()->with('error', 'Record not found.');
            }

            \DB::beginTransaction();
            try {
                $moveData->status_id = 6;
                $moveData->save();

                \DB::commit();

                return redirect()->route('datapendaftar')->with('success', 'Record marked as Verified.');
            } catch (\Exception $e) {
                \DB::rollback();

                return redirect()->back()->with('error', 'Failed to mark record as Accepted.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function markAsRejected($id)
    {
        try {
            $moveData = ModelRegistrants::find($id);

            if (!$moveData) {
                return redirect()->back()->with('error', 'Record not found.');
            }

            \DB::beginTransaction();
            try {
                $moveData->status_id = 7;
                $moveData->save();

                \DB::table('bukti_pembayaran')->where('registrant_id', $moveData->id)->delete();

                \DB::commit();

                return redirect()->route('datapendaftar')->with('success', 'Record marked as Rejected.');
            } catch (\Exception $e) {
                \DB::rollback();

                return redirect()->back()->with('error', 'Failed to mark record as Accepted.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function view($id)
    {
        $data = ModelRegistrants::find($id);
        return view('admin.view_pendaftar', ['data' => $data]);
    }

    public function viewPembayaran($registrant_id)
    {
        $data = BuktiPembayaran::where('registrant_id', $registrant_id)->first();
        return view('admin.data_pembayaran', ['data' => $data]);
    }

    public function dataPembayaran()
    {
        $data = ModelRegistrants::whereNotNull('bukti_pembayaran_path')->get()->groupBy(function ($item) {
            return $item->periode;
        });
        return view('admin.pembayaran', ['data' => $data]);
    }
}
