<?php

namespace App\Http\Controllers;

use App\Models\Admin as ModelAdmins;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\registrants as ModelRegistrants;
use App\Models\informations as ModelInformations;
use App\Models\acceptedRegistrants as ModelAccRegistrants;


class AdminController extends Controller
{
    public function index()
    {
        $dataAdmin = ModelAdmins::all();
        $dataPendaftar = ModelRegistrants::where('usertype', 'registrant')->get();
        $dataSiswa = ModelAccRegistrants::all();
        $dataInformasi = ModelInformations::all();
        
        return view('halaman_dashboard.admin_dashboard', [
            'dataAdmin' => $dataAdmin,
            'dataPendaftar' => $dataPendaftar,
            'dataSiswa' => $dataSiswa,
            'dataInformasi' => $dataInformasi,
        ]);
    }

    // public function edit($id)
    // {
    //     $data = ModelAdmins::find($id);
    //     return view('admin.edit_user', ['data' => $data]);

    // }
    public function edit($id){
        $data=ModelAdmins::find($id);
        return view('admin.edit_user', ['data'=>$data]);
    }

    function change(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ], [
            'username.required' => 'Username wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $user = ModelAdmins::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        // Hash the password before saving it
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success', 'Data User berhasil diedit');

        return redirect('admin');
    }
    public function hapus(Request $request)
    {
        ModelAdmins::where('id', $request->id)->delete();

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('admin');
    }

    function tambah()
    {
        return view('admin.tambah_admin');
    }

    function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:' . ModelAdmins::class],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ], [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah dipakai',
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        try {
            // Use a transaction to ensure atomicity
            DB::beginTransaction();
    
            // Proceed with creating the new admin
            DB::table('admins')->insert([
                'username' => $request->username,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Commit the transaction
            DB::commit();
    
            // Redirect or respond with success
            return redirect('/admin')->with('success', 'Berhasil Menambahkan Data');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();
    
            // Check if the error is due to a duplicate entry
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                // Redirect back with a user-friendly error message for duplicate username
                return redirect()->back()->with('error', 'Maaf, username ini sudah digunakan. Silakan pilih username lain.');
            }
    
            // Redirect back with a generic error message for other exceptions
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }
}
