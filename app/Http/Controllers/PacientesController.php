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
      return view('pacientes');
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








}
