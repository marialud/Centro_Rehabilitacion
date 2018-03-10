@extends('layouts.app')

@section('content')
<div class="container">
 <div class="col-md-8">
   <div class="card">
     <div class="card-header">Pacientes</div>
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
          {{Form::open( array('url'=>'admin/pacientes','files'=>true )) }}
          <div class="input-group col-md-12">
            <label for='nombre'>Nombre</label><br>
             {{Form::text('nombre','',array('class'=>'form-control',
             'placeholder'=>'nombre') ) }}
           </div>
            <div class="input-group col-md-12">
              <label for='apellido_paterno'>Apellido Paterno</label><br>
               {{Form::text('ap_paterno','',array('class'=>'form-control',
               'placeholder'=>'ap_paterno') ) }}
             </div>
             <div class="input-group col-md-12">
               <label for='ap_materno'>Apellido Materno</label><br>
                {{Form::text('ap_materno','',array('class'=>'form-control',
                'placeholder'=>'ap_materno') ) }}
              </div>
              <div class="input-group col-md-12">
                <label for='adiccion'>adiccion</label><br>
                 {{Form::text('adiccion','',array('class'=>'form-control',
                 'placeholder'=>'adiccion') ) }}
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
