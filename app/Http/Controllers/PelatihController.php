<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Pelatih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pelatih = Pelatih::select('users.email', 'jenis.jenis', 'pelatihs.nama_pelatih', 'pelatihs.tlp_pelatih', 'pelatihs.almt_pelatih', 'pelatihs.created_at')
        //             ->where('pelatihs.user_id', 'users.id')
        //             ->where('pelatih.jenis_id', 'jenises.id')
        //             ->get();
        $pelatih = DB::select("
            SELECT u.email, j.jenis, p.nama_pelatih, p.tlp_pelatih, p.almt_pelatih, p.id
            FROM users u, jenises j, pelatihs p
            WHERE p.user_id = u.id AND p.jenis_id = j.id
        ");
        $no = 1;
        return view('pelatih.index', compact(['pelatih', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('pelatih.addOrEdit', compact(['jenis']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pelatih'      => 'required',
            'jenis_id'          => 'required',
            'email'             => 'required|unique:users,email',
            'tlp_pelatih'       => 'required|numeric',
            'almt_pelatih'      => 'required'
        ], [
            'nama_pelatih.required'     => 'Nama Pelatih Harus Diisi!',
            'jenis_id.required'         => 'Jenis Pelatih Harus Dipilih!',
            'email.required'            => 'Email Harus Diisi!',
            'email.unique'              => 'Email Sudah Tersedia!',
            'tlp_pelatih.required'      => 'Telepon Pelatih Harus Diisi!',
            'tlp_pelatih.numeric'       => 'Telepon Pelatih Harus Berupa Angka!',
            'almt_pelatih.required'     => 'Alamat Pelatih Harus Diisi!'
        ]);

        try {
            $user = New User();
            $user->role_id  = 3;
            $user->name     = $request->nama_pelatih;
            $user->email    = $request->email;
            $user->username = str_replace(' ', '', $request->nama_pelatih);
            $user->password = bcrypt('pelatih');
            $user->save();
            
            Pelatih::insert([
                'user_id'           => $user->id,
                'jenis_id'          => $request->jenis_id,
                'nama_pelatih'      => $request->nama_pelatih,
                'tlp_pelatih'       => $request->tlp_pelatih,
                'almt_pelatih'      => $request->almt_pelatih
            ]);

            Session::put('sweetalert', 'success');
            return redirect()->route('pelatih')->with('alert', 'Sukses Menambahkan Data Pelatih!');
        } catch (\Throwable $th) {
            // throw $th;
            Session::put('sweetalert', 'error');
            return redirect()->back()->with('alert', 'Gagal Menambahkan Data Pelatih!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelatih    = Pelatih::find($id);
        $jenis      = Jenis::all();
        $user       = User::find($pelatih->user_id);
        return view('pelatih.addOrEdit', compact(['pelatih', 'user', 'jenis']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_pelatih'      => 'required',
            'jenis_id'          => 'required',
            'email'             => 'required',
            'tlp_pelatih'       => 'required|numeric',
            'almt_pelatih'      => 'required'
        ], [
            'nama_pelatih.required'     => 'Nama Pelatih Harus Diisi!',
            'jenis_id.required'         => 'Jenis Pelatih Harus Dipilih!',
            'email.required'            => 'Email Harus Diisi!',
            'email.unique'              => 'Email Sudah Tersedia!',
            'tlp_pelatih.required'      => 'Telepon Pelatih Harus Diisi!',
            'tlp_pelatih.numeric'       => 'Telepon Pelatih Harus Berupa Angka!',
            'almt_pelatih.required'     => 'Alamat Pelatih Harus Diisi!'
        ]);

        try {
            $pelatih = Pelatih::where('id', $id)->first();
            $uptPelatih = Pelatih::where('id', $id)->update([
                'jenis_id'          => $request->jenis_id,
                'nama_pelatih'      => $request->nama_pelatih,
                'tlp_pelatih'       => $request->tlp_pelatih,
                'almt_pelatih'      => $request->almt_pelatih
            ]);
            $user = User::where('id', $pelatih->user_id)->update([
                'name'  => $request->nama_pelatih,
                'email' => $request->email,
                'username'  => str_replace(' ', '', $request->nama_pelatih)
            ]);
            Session::put('sweetalert', 'success');
            return redirect()->route('pelatih')->with('alert', 'Sukses Edit Data Pelatih!');
        } catch (\Throwable $th) {
            // throw $th;
            Session::put('sweetalert', 'error');
            return redirect()->back()->with('alert', 'Gagal Edit Data Pelatih!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelatih = Pelatih::where('id', $id)->first();
        Pelatih::where('id',$id)->delete();
        User::where('id', $pelatih->user_id)->delete();
    }
}
