@extends('layouts.dashboard')

@section('contenido')
<link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
 <div class="col-md-8">
      <div class="pa"><h2>Paciente General</h2></div>
   <div class="card">
     <div class="card-header pa"><h4>Agregar</h4></div>
       <div class="card-body">
         <!-- Trigger the modal with a button -->
<button type="button" class="mas" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Paciente</h4>
      </div>
      <div class="modal-body">
        {{Form::open( array('url'=>'admin/paciente_general','files'=>true )) }}
        <input type="hidden" name="id" id="idEditar" value="{{$id}}">
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

            </div>





      </div>
      <div class="modal-footer">
        {{Form::submit('Enviar',array('class'=>'btn btn-primary'))  }}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         {{Form::close() }}
      </div>
    </div>

  </div>
</div>
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
         <table class="table table-condensed tabla">
        <thead>
          <tr>
              <td><h5>Id</h5></td>
              <td><h5>Edad</h5></td>
              <td><h5>Tiempo con la adiccion</h5></td>
              <td><h5>Lugar procedencia</h5></td>
              <td><h5>Ingreso</h5></td>
              <td><h5>Editar</h5></td>
              <td><h5>Eliminar</h5></td>
          <tr>
          </thead>
          <tbody>
            @forelse($pg as $pacieg)
             <tr>
               <td>{{ $pacieg->id_paciente}}</td>
               <td>{{ $pacieg->edad}}</td>
               <td>{{ $pacieg->tiempo_con_la_adiccion}}</td>
               <td>{{ $pacieg->lugar_procedencia}}</td>
               <td>{{ $pacieg->ingreso}}</td>

               <td>
               <button type="button" class="edi btnEdit"
               data-ed="{{ $pacieg->id_paciente}}"
               data-ed="{{ $pacieg->edad}}"
               data-ti="{{ $pacieg->tiempo_con_la_adiccion}}"
               data-lu="{{ $pacieg->lugar_procedencia}}"
               data-ing="{{ $pacieg->ingreso}}"
               data-toggle="modal" data-target="#myModal2">
                 <i class="fa fa-edit"></i></button>
               </td>
               <td>
                 {!! Form::open(
                   array('route'=>['admin.paciente_general.destroy',$pacieg->id_paciente],
                'method'=>'delete' )) !!}
                 <button type="submit" class="elimi">
                    <i class="fa fa-trash"></i>
                 </button>
                 {!! Form::close() !!}
               </td>
             </tr>
             @empty
             <p>Sin registros</p>
             @endforelse
           </tbody>
         </table>

           </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal2" class="modal fade" role="dialog">
        @if(count($pg)>0)
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar </h4>
          </div>

          {!! Form::open(
            array('route'=>['admin.paciente_general.edit',$pg{0}->id_paciente],
            'method'=>'GET' )) !!}
          <div class="modal-body">
              <input type="hidden" name="id" id="idEditar" value="{{$id}}">
            <div class="input-group">
              <label for="">Edad</label>
              <input type="number" name="edEditar" id="edEditar" value="" class="form-control">
             </div>
             <div class="input-group">
               <label for="">Tiempo con la adiccion</label>
               <input type="text" name="tiEditar" id="tiEditar" value="" class="form-control">
              </div>
              <div class="input-group">
                <label for="">Lugar procedencia</label>
                <input type="text" name="luEditar" id="luEditar" value="" class="form-control">
               </div>
               <div class="input-group">
                 <label for="">Ingreso</label>
                 <input type="date" name="ingEditar" id="ingEditar" value="" class="form">
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>

          {{Form::close() }}

        </div>

      </div>
        @endif
    </div>

      @endsection
      @section('scripts')
      <script type="text/javascript">
       $(document).ready(function(){
         $(".btnEdit").on('click',function(){
            var id_paciente=$(this).data('id_paciente');
           var ed=$(this).data('ed');
           var ti=$(this).data('ti');
           var lu=$(this).data('lu');
          var ing=$(this).data('ing');
          var i=$(this).data('id');
          $("#idEditar").val(i);
           $("#edEditar").val(ed);
           $("#tiEditar").val(ti);
           $("#luEditar").val(lu);
           $("#ingEditar").val(ing);
          $("#nomModal").text(id_paciente);

         });
       });
      </script>
      @endsection
