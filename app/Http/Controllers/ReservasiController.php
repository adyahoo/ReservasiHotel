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

    public function editReservasi($idTamu, $idReservasi)
    {
        $jenisKamars = JenisKamar::all();
        $reservasi = Reservasi::find($idReservasi);
        return view('client.edit_reservasi', compact('jenisKamars', 'idTamu', 'reservasi'));
    }

    public function updateReservasi($idTamu, $idReservasi, Request $request)
    {
        // dd($request);
        $reservasi = Reservasi::find($idReservasi);

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

        $reservasi->id_tamu = $idTamu;
        $reservasi->id_kamar = $request->id_kamar;
        $reservasi->check_in = $request->check_in;
        $reservasi->check_out = $request->check_out;
        $reservasi->total_hari_stay = $totalDays;
        $reservasi->total_dewasa = $request->total_dewasa;
        $reservasi->total_anak = $request->total_anak;
        $reservasi->identity = $request->identity;
        $reservasi->note = $request->note;
        $reservasi->save();

        return redirect()->route('editAssessment', ['id_tamu' => $reservasi->id_tamu, 'id_reservasi' => $reservasi->id]);
    }

    public function successReserve($id_reservasi)
    {
        $reservasi = Reservasi::find($id_reservasi);
        // dd($reservasi);
        return view('client.succes_reservasi', compact('reservasi'));
    }

    public function reservasi()
    {
        $reservasis = Reservasi::with('tamu', 'jenisKamar')->get();
        // dd($reservasis);
        return view('admin.reservasi', compact('reservasis'));
    }

    public function detail($id)
    {
        $reservasi = Reservasi::with('tamu', 'jenisKamar', 'assessment')->find($id);
        // dd($reservasi);
        return view('admin.detail_reservasi', compact('reservasi'));
    }

    public function confirmReservasi($id, Request $request)
    {
        // dd($request);
        $reservasi = Reservasi::find($id);

        $reservasi->note_validasi = $request->note_validasi;
        $reservasi->status = $request->btn_submit;
        $reservasi->save();

        return redirect()->route('reservasi')->with('message', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Berhasil Mengubah Status Reservasi'
        ]);
    }
}
