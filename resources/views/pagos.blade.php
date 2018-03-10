@extends('layouts.app')

@section('content')
<div class="container">
 <div class="col-md-8">
   <div class="card">
     <div class="card-header">Pagos</div>
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
          {{Form::open( array('url'=>'admin/pagos','files'=>true )) }}
          <div class="input-group col-md-12">
            <label for='fecha'>Fecha</label><br>
             {{Form::date('fecha','',array('class'=>'form-control',
             'placeholder'=>'fecha') ) }}
           </div>
            <div class="input-group col-md-12">
              <label for='cantidad'>Cantidad</label><br>
               {{Form::text('cantidad','',array('class'=>'form-control',
               'placeholder'=>'cantidad') ) }}
             </div>
             <div class="input-group col-md-12">
               <label for='saldo_restante'>Saldo_restante</label><br>
                {{Form::text('saldo_restante','',array('class'=>'form-control',
                'placeholder'=>'saldo_restante') ) }}
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
