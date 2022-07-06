<?php

namespace App\Http\Controllers;

use App\Models\JenisKamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function createReservasi($id)
    {
        $jenisKamars = JenisKamar::all();
        return view('client.reservasi', compact('jenisKamars', 'id'));
    }

    public function storeReservasi(Request $request)
    {
        $filename = '';
        if ($request->file('userIdentity')) {
            $file = $request->file('userIdentity');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
        }

        $checkInDate = strtotime($request->check_in);
        $checkOutDate = strtotime($request->check_out);
        $totalDays = (int)(($checkOutDate - $checkInDate) / 86400);

        $request->merge([
            'total_hari_stay' => $totalDays,
            'status' => 'validating',
            'identity' => $filename,
        ]);

        $reservasi = Reservasi::create($request->all());

        return redirect()->route('assessment', ['id_tamu' => $request->id_tamu, 'id_reservasi' => $reservasi->id]);
    }

    public function successReserve($id_reservasi)
    {
        $reservasi = Reservasi::find($id_reservasi);
        return view('client.succes_reservasi', compact('reservasi'));
    }
}
