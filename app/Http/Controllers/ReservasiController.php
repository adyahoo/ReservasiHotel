<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function createReservasi()
    {
        $jenisKamars = JenisKamar::all();
        return view('client.reservasi', compact('jenisKamars'));
    }

    public function storeReservasi(Request $request)
    {
        dd($request);
    }
}
