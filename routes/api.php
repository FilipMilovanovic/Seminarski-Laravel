<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IspitController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);


Route::get('polozeniIspitiStudenta/{brojIndeksa}', [IspitController::class, 'vratiPolozeneIspiteStudenta']);
Route::get('ispitiZaPrijavu/{brojIndeksa}', [IspitController::class, 'ispitiZaPrijavu']);
Route::get('sortiranje/{brojIndeksa}/{sort}', [IspitController::class, 'sortiranje']);


Route::get('studentInfo/{brojIndeksa}', [StudentController::class, 'studentInfo']);
Route::get('sviStudenti', [StudentController::class, 'sviStudenti']);
Route::delete('obrisiStudenta/{id}', [StudentController::class, 'obrisiStudenta']);
Route::post('sacuvajStudenta', [StudentController::class, 'sacuvajStudenta']);
Route::post('sacuvajIzmene/{brojIndeksa}', [StudentController::class, 'sacuvajIzmene']);
Route::get('pretragaStudenata/{pretragaPolje}', [StudentController::class, 'pretragaStudenata']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
