<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//

//Middleware= admin
Route::middleware(['auth', 'admin'])->namespace('admin')->group(function () {
    //Especialidad
    Route::resource('/especialidad','EspecialidadController');
    //Doctor
    Route::resource('/Doctor','DoctorController');
    //Paciente
    Route::resource('/Paciente','PacienteController');
});

//Middleware= Doctor
Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function () {
    //Programacion
    Route::get('/programacion','ProgramacionController@edit');
    Route::post('/programacion','ProgramacionController@store');

});

