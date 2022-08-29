<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TamuController extends Controller
{
    public function createTamu()
    {
        return view('client.datadiri');
    }

    public function storeTamu(Request $request)
    {
        $isGroup = $request->is_group != "pribadi" ? true : false;

        $request->validate([
            'nama_depan' => !$isGroup ? 'required' : 'nullable',
            'nama_belakang' => !$isGroup ? 'required' : 'nullable',
            'nama_grup' => $isGroup ? 'required' : 'nullable',
            'email' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'is_group' => 'required',
        ]);
        $request->merge([
            'is_group' => $isGroup,
        ]);

        $tamu = Tamu::create($request->all());

        return redirect()->route('client_reservasi', $tamu->id);
    }

    public function editTamu($id)
    {
        $reservasi = Reservasi::find($id);
        $tamu = Tamu::find($reservasi->id_tamu);

        return view('client.edit_datadiri', compact('tamu', 'reservasi'));
    }

    public function updateTamu($id, Request $request)
    {
        // dd($request);
        $tamu = Tamu::find($id);
        $idReservasi = $request->id_reservasi;
        $idTamu = $tamu->id;
        $isGroup = $request->is_group != "pribadi" ? true : false;

        $request->validate([
            'nama_depan' => !$isGroup ? 'required' : 'nullable',
            'nama_belakang' => !$isGroup ? 'required' : 'nullable',
            'nama_grup' => $isGroup ? 'required' : 'nullable',
            'email' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'is_group' => 'required',
        ]);
        $request->merge([
            'is_group' => $isGroup,
        ]);

        $tamu->nama_depan = $request->nama_depan;
        $tamu->nama_belakang = $request->nama_belakang;
        $tamu->nama_grup = $request->nama_grup;
        $tamu->email = $request->email;
        $tamu->telepon = $request->telepon;
        $tamu->negara = $request->negara;
        $tamu->kota = $request->kota;
        $tamu->alamat = $request->alamat;
        $tamu->kode_pos = $request->kode_pos;
        $tamu->is_group = $request->is_group;
        $tamu->save();

        return redirect()->route('editReservasi', compact('idTamu', 'idReservasi'));
    }

    public function tamu()
    {
        $tamus = Tamu::all();
        return view('admin.tamu', compact('tamus'));
    }

    public function detail($id)
    {
        $tamu = Tamu::find($id);
        return view('admin.detail_tamu', compact('tamu'));
    }

    public function edit($id, Request $request)
    {
        $tamu = Tamu::find($id);

        $errorMsg = [
            'required' => ':attribute Harus Diisi',
        ];

        $validator = Validator::make($request->all(), [
            'nama_depan' => !$request->is_group ? 'required' : 'nullable',
            'nama_belakang' => !$request->is_group ? 'required' : 'nullable',
            'nama_grup' => $request->is_group ? 'required' : 'nullable',
            'email' => 'required',
            'telepon' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'negara' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'is_group' => 'required',
        ], $errorMsg);

        if ($validator->fails()) {
            return redirect()->back()->with('error', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => $validator->errors()->all()
            ]);
        }

        $tamu->nama_depan = $request->nama_depan;
        $tamu->nama_belakang = $request->nama_belakang;
        $tamu->nama_grup = $request->nama_grup;
        $tamu->email = $request->email;
        $tamu->telepon = $request->telepon;
        $tamu->nik = $request->nik;
        $tamu->pekerjaan = $request->pekerjaan;
        $tamu->negara = $request->negara;
        $tamu->kota = $request->kota;
        $tamu->alamat = $request->alamat;
        $tamu->kode_pos = $request->kode_pos;
        $tamu->is_group = $request->is_group;
        $tamu->save();

        return redirect()->route('tamu')->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Mengubah Data Tamu'
        ]);
    }

    public function delete($id)
    {
        Tamu::find($id)->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Menghapus Data Tamu'
        ]);
    }
}
