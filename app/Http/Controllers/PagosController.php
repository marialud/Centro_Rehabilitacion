<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Pagos;

class PagosController extends Controller
{
  public function __construct()
  {

      $this->middleware('auth');
  }

    public function index(){
      $registros=
      \DB::table('pagos')
      ->orderBy('id_pago')
      //->take(10)
      ->get();

     return view('pagos')
     ->with('pagos',$registros);

    }
    public function store(Request $req){

      $validator = Validator::make($req->all(),[
        'fecha'=>'required|max:255',
        'cantidad'=>'required|max:255',
        'saldo_restante'=>'required|max:255'
      ]);
     if($validator->fails()){
        //quiere decir que no esta correcto

        return redirect('/admin/pacientes')
        ->withInput()
        ->withErrors($validator);
     }else{
         Pagos::create([
          'id_paciente'=>$req->id,
          'fecha'=>$req->fecha,
          'cantidad'=>$req->cantidad,
          'saldo_restante'=>$req->saldo_restante
         ]);
         return redirect() ->to('/admin/pacientes')
         ->with('mensaje','Pago Agregado');

     }


    }
    public function destroy($id){
      $pagos=Pagos::find($id);
      $pagos->delete();
       return redirect('/admin/pagos');
      dd($id);

    }
    public function edit(Request $req) {
     $Pagos=Pagos::find($req->id);
     $Pagos->fecha=$req->feEditar;
     $Pagos->cantidad=$req->caEditar;
     $Pagos->saldo_restante=$req->saEditar;
     $Pagos->save();
     return redirect()->to('/admin/pagos')
     ->with('mensaje','Paciente Modificado');



    }


}
