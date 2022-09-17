<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{


    public function studentInfo($brojIndeksa)
    {
        $student = DB::table('users')->where('broj_indeksa', $brojIndeksa)->first();

        return response()->json([
            'rez' => 200,
            'student' => $student
        ]);
    }


    public function sviStudenti()
    {
        $studenti = DB::table('users')->where('broj_indeksa', '!=', 'admin')->get();

        return response()->json([
            'rez' => 200,
            'studenti' => $studenti
        ]);
    }




    public function obrisiStudenta($id)
    {
        if (DB::table('users')->where('id', $id)->delete())
            return response()->json([
                'rez' => 200
            ]);

        else
            return response()->json([
                'rez' => 400
            ]);
    }



    public function sacuvajStudenta(Request $request)
    {
        if (DB::table('users')->insert([
            'name' => $request->name,
            'broj_indeksa' => $request->broj_indeksa,
            'email' => $request->email,
            'password' => $request->password,
        ]))
            return response()->json([
                'rez' => 200
            ]);

        else
            return response()->json([
                'rez' => 400
            ]);
    }
}
