<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function reservasi()
    {
        return view('admin.reservasi');
    }
    public function tamu()
    {
        return view('admin.tamu');
    }
    public function kamar()
    {
        return view('admin.kamar');
    }
    public function jenisKamar()
    {
        return view('admin.jenis_kamar');
    }
}
