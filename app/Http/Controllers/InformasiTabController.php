<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use App\Models\Periode;
use App\Models\informations as ModelInformations;

class InformasiTabController extends Controller
{
    public function index()
    {
        $data = ModelInformations::all();
        return view('admin.data_informasi', ['data' => $data]);
    }

    public function info()
    {
        $pendaftaranOnline = ModelInformations::where('Agenda', 'Pendaftaran Online')->first();
        $registrationStatus = 'Pendaftaran belum dibuka';
        $registrationClosed = true;

        if ($pendaftaranOnline) {
            $currentDate = Carbon::now();
            $startDate = Carbon::parse($pendaftaranOnline->start_date);
            $endDate = Carbon::parse($pendaftaranOnline->end_date);

            if ($currentDate->lt($startDate)) {
                $registrationStatus = 'Pendaftaran belum dibuka';
            } elseif ($currentDate->lte($endDate)) {
                $registrationStatus = 'Pendaftaran dibuka';
                $registrationClosed = false;
            } else {
                $registrationStatus = 'Pendaftaran sudah ditutup';
            }
        }

        $data = ModelInformations::all();
        return view('halaman_depan.index', [
            'data' => $data,
            'registrationClosed' => $registrationClosed,
            'registrationStatus' => $registrationStatus
        ]);
    }

    public function create()
    {
        return view('admin.tambah_info');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'Agenda' => ['required', 'string', 'max:255'],
        ], [
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'end_date.required' => 'Tanggal selesai wajib diisi',
            'Agenda.required' => 'Agenda wajib diisi',
        ]);

        $info = new ModelInformations();
        $info->start_date = $request->start_date;
        $info->end_date = $request->end_date;
        $info->Agenda = $request->Agenda;
        $info->save();

        if ($request->Agenda === 'Pendaftaran Online') {
            Periode::updateOrCreate(
                ['tahun_ajaran' => date('Y', strtotime($request->start_date))],
                [
                    'pendaftaran_mulai' => $request->start_date,
                    'pendaftaran_selesai' => $request->end_date
                ]
            );
        }

        Session::flash('success', 'Informasi berhasil ditambahkan');

        return redirect()->route('datainformasi');
    }

    public function edit($id)
    {
        $data = ModelInformations::find($id);
        return view('admin.edit_info', ['data' => $data]);

    }

    function change(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'Agenda' => ['required', 'string', 'max:255'],
        ], [
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'end_date.required' => 'Tanggal selesai wajib diisi',
            'Agenda.required' => 'Agenda wajib diisi',
        ]);

        $info = ModelInformations::find($request->id);
        $info->start_date = $request->start_date;
        $info->end_date = $request->end_date;
        $info->Agenda = $request->Agenda;
        $info->save();

        if ($request->Agenda === 'Pendaftaran Online') {
            Periode::updateOrCreate(
                ['tahun_ajaran' => date('Y', strtotime($request->start_date))],
                [
                    'pendaftaran_mulai' => $request->start_date,
                    'pendaftaran_selesai' => $request->end_date
                ]
            );
        }

        Session::flash('success', 'Data Informasi berhasil diedit');

        return redirect()->route('datainformasi');
    }
    public function hapus(Request $request)
    {
        ModelInformations::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('datainformasi');
    }
}
