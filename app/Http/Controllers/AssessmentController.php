<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Reservasi;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AssessmentController extends Controller
{
    public function createAssessment($id_tamu, $id_reservasi)
    {
        $tamus = Tamu::where('id', $id_tamu)->get();
        return view('client.assessment', compact('tamus', 'id_reservasi'));
    }

    public function storeAssessment(Request $request)
    {
        $tamu = Tamu::find($request->id_tamu);
        $tamu->update([
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan
        ]);

        $totalSkor = (int)$request->assessment_1 + (int)$request->assessment_2 + (int)$request->assessment_3 + (int)$request->assessment_4 + (int)$request->assessment_5 + (int)$request->assessment_6;
        $assessment = new Assessment();
        $assessmentData = $assessment->create([
            'assessment_1' => (int)$request->assessment_1,
            'assessment_2' => (int)$request->assessment_2,
            'assessment_3' => (int)$request->assessment_3,
            'assessment_4' => (int)$request->assessment_4,
            'assessment_5' => (int)$request->assessment_5,
            'assessment_6' => (int)$request->assessment_6,
            'total' => $totalSkor,
        ]);

        $reservasi = Reservasi::find($request->id_reservasi);
        $reservasi->update([
            'id_assessment' => $assessmentData->id
        ]);

        return redirect()->route('successReservasi', ['id_reservasi' => $request->id_reservasi]);
    }

    public function editAssessment($id_tamu, $id_reservasi)
    {
        $tamus = Tamu::where('id', $id_tamu)->get();
        $reservasi = Reservasi::find($id_reservasi);
        $assessment = Assessment::find($reservasi->id_assessment);
        return view('client.edit_assessment', compact('tamus', 'id_reservasi', 'assessment'));
    }

    public function updateAssessment($idAssessment, Request $request)
    {
        // dd($request);
        $tamu = Tamu::find($request->id_tamu);
        $tamu->update([
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan
        ]);

        $totalSkor = (int)$request->assessment_1 + (int)$request->assessment_2 + (int)$request->assessment_3 + (int)$request->assessment_4 + (int)$request->assessment_5 + (int)$request->assessment_6;
        $assessment = Assessment::find($idAssessment);
        $assessment->assessment_1 = (int)$request->assessment_1;
        $assessment->assessment_2 = (int)$request->assessment_2;
        $assessment->assessment_3 = (int)$request->assessment_3;
        $assessment->assessment_4 = (int)$request->assessment_4;
        $assessment->assessment_5 = (int)$request->assessment_5;
        $assessment->assessment_6 = (int)$request->assessment_6;
        $assessment->total = $totalSkor;
        $assessment->save();

        $reservasi = Reservasi::find($request->id_reservasi);
        $reservasi->update([
            'id_assessment' => $assessment->id,
            'status' => 'validating'
        ]);

        return redirect()->route('successReservasi', ['id_reservasi' => $request->id_reservasi]);
    }
}
