@extends('layouts.app')

@section('content')
<div class="container">
 <div class="col-md-8">
   <div class="card">
     <div class="card-header">Pacientes General</div>
       <div class="card-body">
          @if($errors->any())
              <div class="alert alert-warning alert-dismissable">
                <ul>
                 @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                   @endforeach
                </ul>
             </div>
          @endif
          @if(session()->has('mensaje'))
           <div class="alert alert-success">
             {{ session()->get('mensaje') }}
           </div>
         @endif
          {{Form::open( array('url'=>'admin/pacientes_general','files'=>true )) }}
          <div class="input-group col-md-12">
            <label for='edad'>Edad</label><br>
             {{Form::number('edad','',array('class'=>'form-control',
             'placeholder'=>'edad') ) }}
           </div>
            <div class="input-group col-md-12">
              <label for='tiempo_con_la_adiccion'>Tiempo con la adiccion</label><br>
               {{Form::text('tiempo_con_la_adiccion','',array('class'=>'form-control',
               'placeholder'=>'tiempo_con_la_adiccion') ) }}
             </div>
             <div class="input-group col-md-12">
               <label for='lugar_procedencia'>Lugar procedencia</label><br>
                {{Form::text('lugar_procedencia','',array('class'=>'form-control',
                'placeholder'=>'lugar_procedencia') ) }}
              </div>
              <div class="input-group col-md-12">
                <label for='ingreso'>Ingreso</label><br>
                 {{Form::date('ingreso','',array('class'=>'form-control',
                 'placeholder'=>'ingreso') ) }}
               </div>
              <div class="input-group col-md-12">
               {{Form::submit('Enviar',array('class'=>'btn btn-primary'))  }}
              </div>
                  
             {{Form::close() }}
           </div>
        </div>
      </div>
    </div>
  @endsection
