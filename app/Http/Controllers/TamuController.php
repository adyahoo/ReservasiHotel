<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

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

        Tamu::create($request->all());

        return redirect()->route('tamu');
    }
}
