<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IspitController extends Controller
{

    public function ispitiZaPrijavu($brojIndeksa)
    {
        $sviIspiti = DB::table('ispitis')->get();

        $polozeniIspitiStudenta = DB::table('polozeni_ispitis')->where('student_broj_indeksa', $brojIndeksa)->get();

        $ispitiZaPrijavu = array();

        foreach ($sviIspiti as $ispit) {
            $postoji = false;
            foreach ($polozeniIspitiStudenta as $polozeni) {
                if ($ispit->id == $polozeni->ispit_id) {
                    $postoji = true;
                    break;
                }
            }
            if (!$postoji)
                array_push($ispitiZaPrijavu, $ispit);
        }


        return response()->json([
            'rez' => 200,
            'ispiti' => $ispitiZaPrijavu
        ]);
    }



    public function vratiPolozeneIspiteStudenta($brojIndeksa)
    {
        $polozeniIspitiStudenta = DB::table('polozeni_ispitis')
            ->join('ispitis', 'polozeni_ispitis.ispit_id', 'ispitis.id')
            ->where('student_broj_indeksa', $brojIndeksa)->get();


        if (count($polozeniIspitiStudenta) > 0)
            return response()->json([
                'rez' => 200,
                'ispiti' => $polozeniIspitiStudenta
            ]);

        else
            return response()->json([
                'rez' => 404,
                'ispiti' => 'Nema ispita'
            ]);
    }
}
