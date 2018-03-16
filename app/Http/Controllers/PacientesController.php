<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Paciente;
class PacientesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){
       $registros=
       \DB::table('pacientes')
       ->orderBy('nombre')
       //->take(10)
       ->get();

      return view('pacientes')
      ->with('pacientes',$registros);
    }
    public function store(Request $req){

      $validator = Validator::make($req->all(),[
        'nombre'=>'required|max:255',
        'ap_paterno'=>'required|max:255',
        'ap_materno'=>'required|max:255',
        'adiccion'=>'required|max:255'
      ]);
     if($validator->fails()){
        //quiere decir que no esta correcto

        return redirect('/admin/pacientes')
        ->withInput()
        ->withErrors($validator);
     }else{
         Paciente::create([
          'nombre'=>$req->nombre,
          'ap_paterno'=>$req->ap_paterno,
          'ap_materno'=>$req->ap_materno,
          'adiccion'=>$req->adiccion

         ]);
         return redirect() ->to('/admin/pacientes')
         ->with('mensaje','Paciente Agregado');

     }

    }
    public function destroy($id){
      $paciente=Paciente::find($id);
      $paciente->delete();
       return redirect('/admin/pacientes');
      dd($id);

    }
  public function edit(Request $req) {
   $paciente=Paciente::find($req->id);
   $paciente->nombre=$req->noEditar;
   $paciente->ap_paterno=$req->paEditar;
   $paciente->ap_materno=$req->maEditar;
   $paciente->adiccion=$req->adEditar;
   $paciente->save();
   return redirect()->to('/admin/pacientes')
   ->with('mensaje','Paciente Modificado');



  }

}
