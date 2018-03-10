<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Paciente_general;
class Pacientes_generalController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){
      return view('pacientes_general');
    }
    public function store(Request $req){


      $validator = Validator::make($req->all(),[
        'edad'=>'required|max:255',
        'tiempo_con_la_adiccion'=>'required|max:255',
        'lugar_procedencia'=>'required|max:255',
        'ingreso'=>'required|max:255'
      ]);
     if($validator->fails()){
        //quiere decir que no esta correcto

        return redirect('/admin/pacientes_general')
        ->withInput()
        ->withErrors($validator);
     }else{
         Paciente_general::create([
          'edad'=>$req->edad,
          'tiempo_con_la_adiccion'=>$req->tiempo_con_la_adiccion,
          'lugar_procedencia'=>$req->lugar_procedencia,
          'ingreso'=>$req->ingreso

         ]);
         return redirect() ->to('/admin/pacientes_general')
         ->with('mensaje','Paciente Agregado');

     }


    }






}
