<?php

namespace App\Http\Controllers;

use App\Models\registrants;
use App\Models\BuktiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $username = Auth::user()->username;
        $data = registrants::where('username', $username)->first();
        return view('registrant/pembayaran', compact('data'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'payment' => 'required|mimes:jpg,jpeg,png,gif|max:5120', // Validate as PDF file with max size of 5MB
        ]);

        $user = Auth::user();
        $registrant = registrants::where('username', $user->username)->first();

        if ($request->hasFile('payment')) {
            // Delete the old file if it exists in the registrants table
            if ($registrant->bukti_pembayaran_path) {
                Storage::disk('public')->delete($registrant->bukti_pembayaran_path);
            }

            // Store the new file
            $path = $request->file('payment')->store('bukti_pembayaran', 'public');

            // Update the registrant's record
            $registrant->bukti_pembayaran_path = $path;
            $registrant->status_id = 8;
            $registrant->save();

            // Create a new record in the bukti_pembayaran table
            BuktiPembayaran::create([
                'registrant_id' => $registrant->id,
                'username' => $registrant->username,
                'name' => $registrant->name,
                'file_path' => $path,
                'tanggal_upload' => now(),
            ]);
        }



        return redirect()->route('registrant', ['username' => $user->username])->with('success', 'Bukti pembayaran berhasil diupload! Harap Menunggu verifikasi admin.');
    }

    public function view($id)
    {
        $data = registrants::find($id);
        return view('registrant.pembayaran_upload', ['data' => $data]);
    }
}
