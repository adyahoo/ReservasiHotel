<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    public function kamar()
    {
        $kamars = Kamar::with('jenisKamar')->get();
        $jenisKamars = JenisKamar::all();

        return view('admin.kamar', compact('kamars', 'jenisKamars'));
    }

    public function store(Request $request)
    {

        $errorMsg = [
            'required' => ':attribute Harus Diisi',
            'unique' => ':attribute Sudah Ada'
        ];

        $validator = Validator::make($request->all(), [
            'nomor_kamar' => 'required|unique:kamars',
            'id_jenis_kamar' => 'required',
        ], $errorMsg);

        if ($validator->fails()) {
            return redirect()->back()->with('error', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => $validator->errors()->all()
            ]);
        }

        $kamar = new Kamar();
        $kamar->id_jenis_kamar = $request->id_jenis_kamar;
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->keterangan_kamar = $request->keterangan;
        $kamar->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Menambahkan Data Kamar'
        ]);
    }

    public function edit($id, Request $request)
    {
        // dd($request);
        $kamar = Kamar::find($id);

        $errorMsg = [
            'required' => ':attribute Harus Diisi',
            'unique' => ':attribute Sudah Ada'
        ];

        $validator = Validator::make($request->all(), [
            'nomor_kamar' => 'required|unique:kamars',
            'id_jenis_kamar' => 'required',
        ], $errorMsg);

        if ($validator->fails()) {
            return redirect()->back()->with('error', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => $validator->errors()->all()
            ]);
        }

        $kamar->id_jenis_kamar = $request->id_jenis_kamar;
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->keterangan_kamar = $request->keterangan;
        $kamar->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Mengubah Data Kamar'
        ]);
    }

    public function delete($id)
    {
        Kamar::find($id)->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Menghapus Data Kamar'
        ]);
    }
}
