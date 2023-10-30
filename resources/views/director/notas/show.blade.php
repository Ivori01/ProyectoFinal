@extends('layouts.ace',['title'=>'Director | Niveles','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.director.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.director.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('head')
<link href="{{ asset('assets/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/venobox.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Notas
@endslot
@slot('subpage_name')
 
  Ver
@endslot
@endcomponent
@endsection

@section('content')
<div class="row">
  <div class="col">
    <h4 class="text-purple-m1 text-130 pb-2 mb-3">Accordions</h4>

    <div class="accordion" id="accordionExample">

      @foreach ($cursos as $curso)
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="card-title">
            <a class="accordion-toggle collapsed" href="#collapse{{$loop->iteration}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fa fa-angle-right toggle-icon mr-1"></i>
             {{$curso->gradoCurso->datosCurso->nombre}}
            </a>
          </h2>
        </div>
      
        <div id="collapse{{$loop->iteration}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
          <div class="dcard">
                  <ul class="nav nav-tabs bgc-secondary-l3 border-y-1 brc-secondary-l3" role="tablist">
   
                    @foreach($trimestres as $trimestre)
                    @php
                      $class='';
                      if($loop->first){
                          $class='active';
                      }
                    @endphp
                     
                    <li class="nav-item mr-2px">
                      <a id="{{$curso->id}}-{{$trimestre->id}}-tab-btn" 
                      class="d-style btn btn-tp btn-light-secondary btn-h-white btn-a-text-dark btn-a-white text-95 px-3 px-sm-4 py-25 radius-0 border-0 {{$class}}" 
                      data-toggle="tab" href="#body{{$curso->id}}{{$trimestre->id}}" role="tab" aria-controls="body{{$curso->id}}{{$trimestre->id}}" aria-selected="false">
                        <span class="v-active position-tl w-100 border-t-3 brc-blue mt-n2px"></span>
                      {{$trimestre->datosTrimestre->nombre}}  {{$trimestre->datosTrimestre->periodo}}
                      </a>
                    </li>
                    @endforeach
                  </ul>

                  <div class="tab-content bgc-white p-35 border-0">
               
                    @foreach($trimestres as $trimestre)
                    @php
                    $class='';
                      if($loop->first){
                          $class='active show';
                      }
                     $criterios=$trimestre->criterios->where('curso', $curso->id);
                    @endphp
                    <div class="tab-pane fade text-95 {{$class}}" id="body{{$curso->id}}{{$trimestre->id}}" role="tabpanel" aria-labelledby="{{$curso->id}}-{{$trimestre->id}}-tab-btn">
                      <div class="mt-4 mt-lg-0 card dcard h-auto overflow-hidden shadow border-t-0">
                  <div class="card-body p-0 table-responsive-xl">
                    <table class="table text-dark-m1 brc-black-tp10 mb-1">
                      <thead>
                        <tr class="bgc-white text-secondary-d3 text-95">
                          <th class="py-3 pl-35">
                            Alumno
                          </th>
                          @foreach($criterios as $criterio)
                             <th>
                           {{$criterio->datosCriterio->nombre}}
                          </th>
                          @endforeach
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($alumnos as $alumno)
                        <tr class="bgc-h-orange-l4">
                          <td class="pl-35">
              
                            <a href="#" class="text-secondary-d2 text-95 text-600">
                             {{$alumno->datosAlumno->persona->apellidos_nombres}}
                            </a>
                          </td>
                           @foreach($criterios as $criterio)
                             <td class="text-dark-m3">
                         {{$notas->where('trimestre', $trimestre->id)->where('curso', $curso->id)
                         ->where('criterio',$criterio->id)->where('matricula',$alumno->id)->first()['nota']}}
                          </td>
                          @endforeach

                        

                        </tr>
                      @endforeach
                                               
                      </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div>
                    </div>
                    @endforeach

                  </div>
                </div>
            </div>
        </div>
       
      
      </div>
      @endforeach
    </div>

  </div>
</div>
    
@endsection


@section('footer')
@component('components.footer')
@endcomponent
@endsection

@section('script')

<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
    </script>
<script src="{{ asset('assets/js/initinput.js')}}">
</script>
  <script type="text/javascript">
	var myTable;   
	var routeUpdate;
	
	jQuery(function($) {




    $('#menu-notas').addClass('active open');
    $('#menu-notas').children('.submenu').addClass('show');
    $('#menu-notas-ver').addClass('active').removeClass('d-none'); 

 @component('components.js.b-table',['route'=>route('Director.Notas.Retrieve')])
        @endcomponent

   // in `tabs-below` and `tabs-right` example we have button[data-toggle=next] elements
        $('[data-toggle=next]')
          .on('click', function(e) {
            e.preventDefault()

            $(this)
              .closest('.card-body')
              .find('a[data-toggle=tab][href="' + this.getAttribute('href') + '"]')
              .tab('show')
          })


	})







  </script>

@stop