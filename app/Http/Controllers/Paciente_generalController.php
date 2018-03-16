<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Paciente_general;
class Paciente_generalController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
     $registros=
     \DB::table('paciente_general')
     ->orderBy('edad')
     //->take(10)
     ->get();

    return view('paciente_general')
    ->with('paciente_general',$registros);
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

        return redirect('/admin/paciente_general')
        ->withInput()
        ->withErrors($validator);
     }else{
         Paciente_general::create([
          'edad'=>$req->edad,
          'tiempo_con_la_adiccion'=>$req->tiempo_con_la_adiccion,
          'lugar_procedencia'=>$req->lugar_procedencia,
          'ingreso'=>$req->ingreso

         ]);
         return redirect() ->to('/admin/paciente_general')
         ->with('mensaje','Paciente Agregado');

     }


    }
    public function destroy($id){
      $paciente_general=Paciente_general::find($id);
      $paciente_general->delete();
       return redirect('/admin/paciente_general');
      dd($id);

    }

    public function edit(Request $req) {
     $paciente_general=Pacientegeneral::find($req->id);
     $paciente_general->edad=$req->noEditar;
     $paciente_general->tiempo_con_la_adiccion=$req->paEditar;
     $paciente_general->lugar_procedencia=$req->maEditar;
     $paciente_general->ingreso=$req->adEditar;
     $paciente_general->save();
     return redirect()->to('/admin/paciente_general')
     ->with('mensaje','Paciente Modificado');



    }




}
