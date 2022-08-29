<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisKamarController extends Controller
{
    public function jenisKamar()
    {
        $jenisKamars = JenisKamar::all();
        return view('admin.jenis_kamar', compact('jenisKamars'));
    }

    public function store(Request $request)
    {
        $errorMsg = [
            'required' => ':attribute Harus Diisi',
            'unique' => ':attribute Sudah Ada'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:jenis_kamars',
        ], $errorMsg);

        if ($validator->fails()) {
            return redirect()->back()->with('error', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => $validator->errors()->all()
            ]);
        }

        JenisKamar::create($request->all());

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Berhasil Menambahkan Jenis Kamar'
        ]);
    }

    public function edit($id, Request $request)
    {
        $jenisKamar = JenisKamar::find($id);

        $errorMsg = [
            'required' => ':attribute Harus Diisi',
            'unique' => ':attribute Sudah Ada'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:jenis_kamars',
            'nama' => [
                Rule::unique('jenis_kamars')->ignore($jenisKamar->id),
            ]
        ], $errorMsg);

        if ($validator->fails()) {
            return redirect()->back()->with('error', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => $validator->errors()->all()
            ]);
        }

        JenisKamar::where('id', $id)->update(['nama' => $request->namaEdit]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Berhasil Mengubah Jenis Kamar'
        ]);
    }

    function delete($id)
    {
        JenisKamar::find($id)->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Berhasil Menghapus Jenis Kamar'
        ]);
    }
}
