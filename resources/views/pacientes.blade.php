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
      <div class="pa"><h2>Pacientes</h2></div>
   <div class="card">
     <div class="card-header pa"><h4>Agregar</h4></div>
       <div class="card-body">
         <!-- Trigger the modal with a button -->
<button type="button" class="mas" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>

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

           </div>


     </div>
     <div class="modal-footer">
         {{Form::submit('Agregar',array('class'=>'btn btn-primary'))  }}
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
              <td><h5>Nombre</h5></td>
              <td><h5>Apellido Paterno</h5></td>
              <td><h5>Apellido Materno</h5></td>
              <td><h5>Adiccion</h5></td>
              <td><h5>Ver mas</h5></td>
              <td><h5>Pago</h5></td>
              <td><h5>Editar</h5></td>
              <td><h5>Eliminar </h5></td>
          <tr>
          </thead>
          <tbody>
            @forelse($pacientes as $pacie)
             <tr>
               <td>{{ $pacie->id_paciente}}</td>
               <td>{{ $pacie->nombre}}</td>
               <td>{{ $pacie->ap_paterno}}</td>
               <td>{{ $pacie->ap_materno}}</td>
               <td>{{ $pacie->adiccion}}</td>
               <td><a href="{{url ('/admin/paciente_general/'.$pacie->id_paciente)}}"><i class="fa fa-plus"></i></a> </td>
              <td>
              <button type="button" class="btnpago pago"
              data-no="{{ $pacie->nombre}}"
               data-id="{{ $pacie->id_paciente}}"
               data-toggle="modal" data-target="#myModal3">
                <i class="fa fa-credit-card"></i></button>
              <td>
               <button type="button" class="btnEdit edi"
               data-no="{{ $pacie->nombre}}"
               data-pa="{{ $pacie->ap_paterno}}"
               data-ma="{{ $pacie->ap_materno}}"
               data-ad="{{ $pacie->adiccion}}"
               data-id="{{ $pacie->id_paciente}}"
               data-toggle="modal" data-target="#myModal2">
                 <i class="fa fa-edit"></i></button>
               </td>
               <td>
                 {!! Form::open(
                   array('route'=>['admin.pacientes.destroy',$pacie->id_paciente],
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
    <!-- Trigger the modal with a button -->


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
        array('route'=>['admin.pacientes.edit',$pacie->id_paciente],
        'method'=>'GET' )) !!}
      <div class="modal-body bo">
        <input type="hidden" name="id" id="idEditar" value="">
        <div class="input-group">
          <label for="">Nombre</label>
          <input type="text" name="noEditar" id="noEditar" value="" class="form-control">
         </div>
         <div class="input-group">
           <label for="">Apellido paterno</label>
           <input type="text" name="paEditar" id="paEditar" value="" class="form-control">
          </div>
          <div class="input-group">
            <label for="">Apellido Materno</label>
            <input type="text" name="maEditar" id="maEditar" value="" class="form-control">
           </div>
           <div class="input-group">
             <label for="">Adiccion</label>
             <input type="text" name="adEditar" id="adEditar" value="" class="form">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

      </div>
    </form>
    </div>

  </div>
</div>

<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pago a :<b id="nomModalpag">luis</b> </h4>
      </div>
      {{Form::open( array('url'=>'admin/pagos','files'=>true )) }}
      <div class="modal-body">
        <input type="hidden" name="id" id="idins" value="">
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

            </div>
      </div>
      <div class="modal-footer">
          {{Form::submit('Pago',array('class'=>'btn btn-primary'))  }}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
      {{Form::close() }}
    </div>

  </div>
</div>
  @endsection
  @section('scripts')
  <script type="text/javascript">
   $(document).ready(function(){
     $(".btnEdit").on('click',function(){
       var no=$(this).data('no');
       var pa=$(this).data('pa');
       var ma=$(this).data('ma');
      var ad=$(this).data('ad');
      var i=$(this).data('id');
       $("#idEditar").val(i);
       $("#noEditar").val(no);
       $("#paEditar").val(pa);
       $("#maEditar").val(ma);
       $("#adEditar").val(ad);
       $("#nomModal").text(no);

     });
     $(".btnpago").on('click',function(){

      var i=$(this).data('id');
       var no=$(this).data('no');
       $("#idins").val(i);
       $("#nomModalpag").text(no);

     });

   });
  </script>
  @endsection
