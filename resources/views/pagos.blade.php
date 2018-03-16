@extends('layouts.dashboard')

@section('contenido')
<link rel="stylesheet" href="./../css/font-awesome.min.css">
<link rel="stylesheet" href="./../css/dashboard.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
 <div class="col-md-8">
   <div class="card">
     <div class="card-header">Pagos</div>
       <div class="card-body">
         <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        {{Form::open( array('url'=>'admin/pagos','files'=>true )) }}
        <input type="hidden" name="id_paciente" value="{{$id_paciente}}">
        <div class="input-group col-md-12">
          <label for='fecha'>Fecha</label><br>
           {{Form::date('fecha','',array('class'=>'form-control',
           'placeholder'=>'fecha') ) }}
         </div>
          <div class="input-group col-md-12">
            <label for='cantidad'>Cantidad</label><br>
             {{Form::number('cantidad','',array('class'=>'form-control',
             'placeholder'=>'cantidad') ) }}
           </div>
           <div class="input-group col-md-12">
             <label for='saldo_restante'>Saldo_restante</label><br>
              {{Form::number('saldo_restante','',array('class'=>'form-control',
              'placeholder'=>'saldo_restante') ) }}
            </div>
            <div class="input-group col-md-12">
             {{Form::submit('Enviar',array('class'=>'btn btn-primary'))  }}
            </div>

           {{Form::close() }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
         <table class="table table-condensed">
        <thead>
          <tr>
              <td>Id Pago</td>
              <td>Id paciente</td>
              <td>Fecha</td>
              <td>Cantidad</td>
              <td>Saldo Restante</td>
              <td>Eliminar</td>
          <tr>
          </thead>
          <tbody>
            @forelse($pagos as $pa)
             <tr>
               <td>{{ $pa->id_pago}}</td>
               <td>{{ $pa->id_paciente}}</td>
               <td>{{ $pa->fecha}}</td>
               <td>{{ $pa->cantidad}}</td>
               <td>{{ $pa->saldo_restante}}</td>
              <td>
                <button type="button" class="btn btn-info btn-lg btnEdit"
                data-fe="{{ $pa->fecha}}"
                data-ca="{{ $pa->cantidad}}"
                data-sa="{{ $pa->saldo_restante}}"
                data-id="{{ $pa->id_pago}}"
                data-toggle="modal" data-target="#myModal2">
                  <i class="fa fa-edit"></i></button>
              </td>
               <td>
                 {!! Form::open(
                   array('route'=>['admin.pagos.destroy',$pa->id_pago],
                'method'=>'delete' )) !!}
                 <button type="submit">
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
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar a :<b id="nomModal">luis</b> </h4>
          </div>
          {!! Form::open(
            array('route'=>['admin.pagos.edit',$pagos->id_pago],
            'method'=>'GET' )) !!}
          <div class="modal-body">
              <input type="text" name="id" id="idEditar" value="">
            <div class="input-group">
              <label for="">Fecha</label>
              <input type="number" name="feEditar" id="feEditar" value="" class="form-control">
             </div>
             <div class="input-group">
               <label for="">Cantidad</label>
               <input type="number" name="caEditar" id="caEditar" value="" class="form-control">
              </div>
              <div class="input-group">
                <label for="">Saldo Restante</label>
                <input type="number" name="saEditar" id="saEditar" value="" class="form-control">
               </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>
        </div>

      </div>
    </div>

      @endsection
      @section('scripts')
      <script type="text/javascript">
       $(document).ready(function(){
         $(".btnEdit").on('click',function(){
           var fe=$(this).data('fe');
           var ca=$(this).data('ca');
           var sa=$(this).data('sa');
          var i=$(this).data('id');

           $("#idEditar").val(i);
           $("#feEditar").val(ed);
           $("#caEditar").val(ti);
           $("#saEditar").val(lu);
           $("#nomModal").text(no);


         });
       });
      </script>
      @endsection
