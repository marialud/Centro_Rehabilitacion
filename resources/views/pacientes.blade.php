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
     <div class="card-header"><h3>Pacientes</h3></div>
       <div class="card-body">
         <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg mas" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>

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
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))  }}
           </div>

          {{Form::close() }}
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
              <td>Id</td>
              <td>Nombre</td>
              <td>Apellido Paterno</td>
              <td>Apellido Materno</td>
              <td>Adiccion</td>
              <td>Ver mas</td>
              <td>Pago</td>
              <td>Editar</td>
              <td>Eliminar </td>
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
               <td><a href="{{url ('/admin/paciente_general')}}">   <i class="fa fa-plus"></i></a> </td>
              <td><a href="{{url ('/admin/pagos/'.$pacie->id_paciente)}}">   <i class="fa fa-credit-card"></i></a> </td>
               <td>
               <button type="button" class="btn btn-info btn-lg btnEdit"
               data-no="{{ $pacie->nombre}}"
               data-pa="{{ $pacie->ap_paterno}}"
               data-ma="{{ $pacie->ap_materno}}"
               data-ad="{{ $pacie->adiccion}}"
               data-toggle="modal" data-target="#myModal2">
                 <i class="fa fa-edit"></i></button>
               </td>
               <td>
                 {!! Form::open(
                   array('route'=>['admin.pacientes.destroy',$pacie->id_paciente],
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
    <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar a :<b>luis</b> </h4>
      </div>
      <div class="modal-body">
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
    </div>

  </div>
</div>

  @endsection
  @section('scripts')
  <script type="text/javascript">
   $(document).ready(function(){
     $(".btnEdit").on('click',function(){
       var no=$(this).data('nombre');
       var pa=$(this).data('apellido_paterno');
       var ma=$(this).data('apellido_materno');
      var ad=$(this).data('adiccion');
       $("#noEditar").val(no);
       $("#paEditar").val(pa);
       $("#maEditar").val(ma);
       $("#adEditar").val(ad);

     });
   });
  </script>
  @endsection
