<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente_general extends Model
{
  //id del paciente
  protected $primaryKey='id_paciente';
 //nombre de la tabla
 protected $table='paciente_general';
 //campos que se pueden manipular de
 protected $fillable=[
   'edad','tiempo_con_la_adiccion','lugar_procedencia','ingreso','id_paciente'
 ];
}
