<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    //id del paciente
    protected $primaryKey='id_pago';
   //nombre de la tabla
   protected $table='pagos';
   //campos que se pueden manipular de
   protected $fillable=[
     'fecha','cantidad','saldo_restante'
   ];

}
