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
    return view('principal');
});

Route::get('/dashboard', function () {
    return view('admin');
});
Route::get('/registro', function () {
    return view('registro');
});

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
   Route::get('/','AdminController@index');
   Route::get('/pagos/{id}','PagosController@index');
   Route::resource('pagos','PagosController');
   Route::get('/pacientes','PacientesController@index');
   Route::resource('pacientes','PacientesController');
   Route::get('/paciente_general','Paciente_generalController@index');
  Route::resource('paciente_general','Paciente_generalController');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
