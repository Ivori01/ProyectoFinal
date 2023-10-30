@extends('layouts.ace',['title'=>'Docente | Aula Virtual'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('Docente.AulaVirtual.Index')])
@endcomponent
@endsection

@section('navbar-menu')
@component('components.docente.a-virtual.navbar-menu')
@endcomponent
@endsection



@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
<a href="{{ route('Docente.AulaVirtual.Index')}}">Aula virtual</a>
@endslot
@slot('subpage_name')

<a href="{{ route('Docente.AulaVirtual.Curso.Index',['id'=>$tarea->subContenido->datosContenido->datosCurso->id]) }}">
  
{{ $tarea->subContenido->datosContenido->datosCurso->cursoinfo->datosCurso->nombre }} | {{$tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->nombre}} {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->letra }} | {{ $tarea->subContenido->datosContenido->datosCurso->seccionInfo->datosGrado->DatosNivel->nombre }}</a>
<i class="fa fa-angle-double-right text-80">
        </i> <a href="{{ route('Docente.TareaEntrega.Index',['id'=>$tarea->subContenido->datosContenido->datosCurso->id]) }}">Tareas</a>
 <i class="fa fa-angle-double-right text-80">
        </i> {{ $tarea->nombre }}
@endslot
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap">

@endsection

@section('content')
 <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

<div class="mt-4 mx-md-2 border-t-1 brc-secondary-l1">
            
<div class="bgc-success-d1 text-white px-3 py-25">
              <span class="text-90">Alumnos</span>
            
            </div>
              <div class="table-responsive">
                <table id="datatable" class="table table-bordered  table-hover text-dark-m2">
                  <thead class="text-dark-m3 bgc-grey-l3">
                    <tr>
                      
                      <th class=" bgc-h-default-l3">Alumno</th>
                      <th class=" bgc-h-default-l3">Estado</th>
                      <th class=" bgc-h-default-l3">Fecha Entrega</th>
                      <th class=" bgc-h-default-l3">Archivos</th>
                      <th class=" bgc-h-default-l3" style=" width: 70px; ">Nota</th>
                      <th>Comentario</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($seccion->alumnos as $alumno)
                    <tr class="d-style bgc-h-default-l4">
                    
                      <td>
                      {{ $alumno->datosalumno->persona->nombres }} {{ $alumno->datosalumno->persona->apellidos }}
                        
                      </td>
                      @php 
                      $entrega=$t_entrega->where('alumno',$alumno->datosalumno->id)->where('tarea',$tarea->id)->first(); 

                      @endphp
                      <td >
                        
                        <div>
                          @if(optional($entrega)->exists())
                          <span class='badge badge badge-success arrowed-in arrowed-in-right'>Entregado</span>
                          @else
                          <span class='badge badge badge-danger arrowed-in arrowed-in-right'>No entregado</span>
                          @endif
                        </div>
                      </td>
                      <td >
                         @if(optional($entrega)->exists())
                    {{  $entrega->created_at->format('Y/m/d g:i:s A')}} 
                          @else
                         -
                          @endif
                      </td>
                     
                      <td>
                         @if(optional($entrega)->exists())
                         @if($entrega->archivo_name != null)

                                        <a data-rel="tooltip" data-action="edit" title="Edit" href="{{ route('Docente.TareaEntrega.Download',['id'=>$entrega->id]) }}" ><i class="fa fa-download text-blue-m1 "></i>
    </a>
                         @else
                                        <a data-rel="tooltip" data-action="edit" title="Edit" href="#" >
                   <span class="fa-stack ">
  <i class="fa fa-download fa-stack-1x"></i>
  <i class="fa fa-ban fa-stack-2x text-danger"></i>
</span></a>
                         @endif


        @if($entrega->contenido != null)

                                        <a data-rel="tooltip" data-action="edit" title="Edit" href="#" data-target="#modal-show-cont" data-toggle="modal" onclick="getContenido('{{ route('Docente.TareaEntrega.Contenido',['id'=>$entrega->id]) }}')"><i class="fa fa-eye text-blue-m1 "></i>
    </a>
                         @else
                                        <a data-rel="tooltip" data-action="edit" title="Edit" href="#" >
                   <span class="fa-stack ">
  <i class="fa fa-eye fa-stack-1x"></i>
  <i class="fa fa-ban fa-stack-2x text-danger"></i>
</span></a>
                         @endif

    
                          @else
                         -
     @endif
                      </td>  
                     <td  style="width: 80px;" >
                        
                        <input type="number" class=" form-control form-control-sm text-center" style="width: 70px;" value="@if($tarea->revision->where('alumno',$alumno->id_alumno)->first()){{$tarea->revision->where('alumno',$alumno->id_alumno)->first()->nota}}@endif" autocomplete="off" onchange="saveNota('{{ $alumno->id_alumno }}','{{$tarea->id}}',this)" />
                      </td>
                      <td>
                        <textarea class="form-control form-control-sm pt-0" onchange="saveComent('{{ $alumno->id_alumno }}','{{$tarea->id}}',this)">
                          @if($tarea->revision->where('alumno',$alumno->id_alumno)->first())
                        {{  $tarea->revision->where('alumno',$alumno->id_alumno)->first()->comentario}}
                        @endif
                        </textarea>
                      </td>
                    </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>


     
        <div class="modal fade modal-fs" id="modal-show-cont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Contenido</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" id="shw-contenido">
                       
                         
                        </div>
                        <div class="modal-footer">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>       
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')

 <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}">
        </script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}">

  </script>
       <script src="{{ asset('assets/js/dataTables.select.min.js')}}">

  </script>    
<script type="text/javascript">
    var myTable; 
    jQuery(function($) {
          

  @component('components.js.table',['route'=>'','idTable'=>'datatable'])
  @endcomponent
        });


    function getContenido(ruta) {
      token = $("#token").val();
              $.ajax({
               url: ruta,
               method: 'get',
               dataType: 'json',
               data: {
                _token:token,
                  
               }, success: function (msg) {
                 
                   
                    $('#shw-contenido').html(msg.contenido);
                   
               }
              
            });
    }



    function saveNota(alumno,tarea,el) {
      nota=$(el).val();
      token = $("#token").val();
              $.ajax({
               url: "{{ route('Docente.RevisionTarea.Store') }}",
               method: 'post',
               dataType: 'json',
               data: {
                _token:token,
                nota:nota,
                alumno:alumno,
                tarea:tarea,
                  
               }, success: function (msg) {
                 
                   
                                   Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: msg.message,
  showConfirmButton: false,
  timer: 700
})
    
                   
               }
              
            });
    }

        function saveComent(alumno,tarea,el) {
      nota=$(el).val();
      token = $("#token").val();
              $.ajax({
               url: "{{ route('Docente.RevisionTarea.Store') }}",
               method: 'post',
               dataType: 'json',
               data: {
                _token:token,
                comentario:nota,
                alumno:alumno,
                tarea:tarea,
                  
               }, success: function (msg) {
                                   Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: msg.message,
  showConfirmButton: false,
  timer: 700
})
    
                   
                    //$('#shw-contenido').html(msg.contenido);
                   
               }
              
            });
    }
</script>
@endsection
