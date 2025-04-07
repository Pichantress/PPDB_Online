<?php

namespace App\Http\Controllers;

use App\Models\registrants;
use App\Models\FormulirPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FormulirController extends Controller
{
    public function index()
    {
        $username = Auth::user()->username;
        $data = registrants::where('username', $username)->first();
        return view('registrant/formulir', compact('data'));
    }

    public function downloadPDF(Request $request)
    {
        set_time_limit(120);
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin_id' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_kk'=>'required|numeric|regex:/^[0-9]*$/',
            'nik'=>'required|numeric|regex:/^[0-9]*$/',
            'no_akta'=>'required|numeric|regex:/^[0-9]*$/',
            'agama' => 'required|string',
            'sekolah_asal' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'wa_ayah' => 'required|numeric|regex:/^[0-9]*$/',
            'nama_ibu' => 'required|string|max:255',
            'wa_ibu' => 'required|numeric|regex:/^[0-9]*$/',
        ]);

        $data = $request->all();

        $pdf = PDF::loadView('registrant.formulir_pdf', compact('data'));

        return $pdf->download('formulir.pdf');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $username = Auth::user()->username;
        $registrant = registrants::where('username', $username)->first();

        $registrant->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            // Add other fields as needed
        ]);

        return redirect()->route('formulir.index')->with('success', 'Data updated successfully');
    }

    public function showUploadForm()
    {
        $username = Auth::user()->username;
        $data = registrants::where('username', $username)->first();
        return view('registrant.upload_formulir', compact('data'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'formulir_upload' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'formulir_upload.required' => 'Formulir Pendaftaran harus pdf,jpg,jpeg,png dan maks. 5mb',
        ]);

        if ($request->file('formulir_upload')) {
            $file = $request->file('formulir_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads/formulirs', $filename);  // store in public/uploads/formulirs

            // Update the registrant record with the file path
            $username = Auth::user()->username;
            $registrant = registrants::where('username', $username)->first();
            $registrant->formulir_path = $filePath;
            $registrant->status_id = 2;
            $registrant->save();

            FormulirPendaftaran::create([
                'registrant_id' => $registrant->id,
                'username' => $registrant->username,
                'name' => $registrant->name,
                'file_path' => $filePath,
            ]);

            return redirect()->route('formulir.upload.form')->with('success', 'Formulir uploaded successfully!');
        }

        return redirect()->route('formulir.upload.form')->with('error', 'File upload failed.');
    }

}
