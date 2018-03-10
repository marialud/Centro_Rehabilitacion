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
      return view('pagos');
    }
    public function store(Request $req){

      $validator = Validator::make($req->all(),[
        'fecha'=>'required|max:255',
        'cantidad'=>'required|max:255',
        'saldo_restante'=>'required|max:255'
      ]);
     if($validator->fails()){
        //quiere decir que no esta correcto

        return redirect('/admin/pagos')
        ->withInput()
        ->withErrors($validator);
     }else{
         Pagos::create([
          'fecha'=>$req->fecha,
          'cantidad'=>$req->cantidad,
          'saldo_restante'=>$req->saldo_restante
         ]);
         return redirect() ->to('/admin/pagos')
         ->with('mensaje','Pago Agregado');

     }


    }

}
