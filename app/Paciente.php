<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
  //id del paciente
  protected $primaryKey='id_paciente';
 //nombre de la tabla
 protected $table='pacientes';
 //campos que se pueden manipular de
 protected $fillable=[
   'nombre','ap_paterno','ap_materno','adiccion'
 ];
}
