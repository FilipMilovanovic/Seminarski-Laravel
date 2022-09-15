<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    public function login(Request $request)
    {

        $postoji = DB::table('users')->where('broj_indeksa', $request->broj_indeksa)->first();

        if (!$postoji) {
            return response()->json([
                'rez' => 404
            ]);
            return;
        }

        if ($request->password == $postoji->password)
            return response()->json([
                'rez' => 200,
                'broj_indeksa' => $request->broj_indeksa
            ]);
        else
            return response()->json([
                'rez' => 404
            ]);
    }
}
