<?php

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

Route::get('agendar', 'AgendarController@index');
Route::get('agendar/{entidad}', 'AgendarController@cita');
Route::get('agendar/{entidad}/{cita}', 'AgendarController@company');
Route::get('agendar/{entidad}/{cita}/{company}', 'AgendarController@servicio');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}', 'AgendarController@sede');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}', 'AgendarController@calendario');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}', 'AgendarController@identificacion');
Route::post('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}', 'AgendarController@dni');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}/{dni}', 'AgendarController@dataPatient');
Route::put('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}/{dni}', 'AgendarController@updateDataPatient');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}/{dni}/{representante}', 'AgendarController@dataPatientRep');
Route::put('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}/{dni}/{representante}', 'AgendarController@updateDataPatientRep');
Route::get('agendar/{entidad}/{cita}/{company}/{servicio}/{sede}/{profesional}/{dni}/{representante}/confirmacion', 'AgendarController@confirmacion');
Route::post('agendar/guardar', 'AgendarController@storeCita');
Route::get('comprobante', 'AgendarController@comprobante')->name('comprobantePDF');