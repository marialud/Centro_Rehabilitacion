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
     <div class="pa"><h2>Pagos</h2></div>
   <div class="card">
     <div class="card-header"></div>
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
         <table class="table table-condensed tabla">
        <thead>
          <tr>
              <td><h5>No.Folio</h5></td>
              <td><h5>Id paciente</h5></td>
              <td><h5>Fecha</h5></td>
              <td><h5>Cantidad</h5></td>
              <td><h5>Saldo Restante</h5></td>
              <td><h5>Editar</h5></td>
              <td><h5>Eliminar</h5></td>
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
                <button type="button" class="btnEdit edi"
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
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar </h4>
          </div>
          {!! Form::open(
            array('route'=>['admin.pagos.edit',$pa->id_pago],
            'method'=>'GET' )) !!}
          <div class="modal-body">
              <input type="hidden" name="id" id="idEditar" value="">
            <div class="input-group">
              <label for="">Fecha</label>
              <input type="date" name="feEditar" id="feEditar" value="" class="form-control">
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
           $("#feEditar").val(fe);
           $("#caEditar").val(ca);
           $("#saEditar").val(sa);
           $("#nomModal").text(no);


         });
       });
      </script>
      @endsection
