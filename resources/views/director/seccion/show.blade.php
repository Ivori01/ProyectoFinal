@extends('layouts.ace',['title'=>'Director | Seccion','headertitle'=>'Seccion','viewtitle'=>$Seccion->datosGrado->numero.'° '.$Seccion->datosGrado->nivel,'page'=>'Año Academico'])

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

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Seccion
@endslot
@slot('subpage_name')
 
     {{ $Seccion->datosGrado->nombre }} {{ $Seccion->letra }} - {{ $Seccion->datosGrado->datosNivel->nombre }} - {{ $Seccion->datosAnioNivel->datosAnio->anio }}
@endslot
@endcomponent
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <div class="pos-rel d-flex flex-column py-3 px-lg-3 justify-content-center align-items-center">
            <!-- OR use something like > `border-1 brc-default-l3 bgc-blue-l4 radius-2` for above -->
            <div class="d-none position-tl w-100 border-t-4 brc-blue-m2 radius-2">
            </div>
            <div class="pos-rel">
                <img class="radius-round bord1er-2 brc-warning-m1 img-thumbnail" src="{{url(Storage::url('sistem/photos/'.optional(optional($Seccion->datosTutor)->persona)->foto))}}" width="100%">
                   
                </img>
            </div>
            <div class="text-center mt-2">
                <h5 class="text-120 text-secondary-d3">
                   {{ optional(optional($Seccion->datosTutor)->persona)->nombres}}
                </h5>
                <span class="text-80 text-default-d1 text-600">
                   {{ optional(optional($Seccion->datosTutor)->persona)->apellidos}}
                </span>
            </div>
            <div>
            </div>
         
                 
                    <hr class="w-90 mx-auto mb-1 border-dotted">
                        <div class="row w-90 text-center">
                            <div class="col">
                                <div class="px-1 pt-2">
                                    <span class="text-150 text-grey-d1">
                                       Tutor
                                    </span>
                                  
                                     
                                    </br>
                                </div>
                              
                            </div>
                         
                        </div>
                     
               
            </hr>
        </div>
        <!-- .d-flex -->
    </div>
    <!-- .col -->
    <div class="col-12 col-md-8 1bgc-default-l4 pt-0 radius-1 d-flex flex-column pos-rel mt-2 mt-md-0">
        <div class="sticky-nav-md">
            <div class="sticky-trigger">
            </div>
            <div class="position-tr w-100 border-t-4 brc-blue-m2 radius-2 d-md-none">
            </div>
            <ul class="nav nav-tabs-scroll is-scrollable nav-tabs nav-tabs-simple p-1px pl-25 bgc-grey-l4 border-1 brc-grey-l2 radius-t-2" id="profile-tabs" role="tablist">
                <li class="nav-item">
                    <a aria-controls="overview" aria-selected="true" class="d-style nav-link p-3 brc-blue active" data-toggle="tab" href="#profile-tab-overview" role="tab">
                        <span class="d-n-active">
                          Alumnos
                        </span>
                        <span class="d-active text-dark-tp3">
                                Alumnos
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a aria-controls="home" aria-selected="false" class="d-style nav-link p-3 brc-blue" data-toggle="tab" href="#profile-tab-activity" role="tab">
                        <span class="d-n-active">
                           Docentes
                        </span>
                        <span class="d-active text-dark-tp3">
                           Docentes
                        </span>
                       
                    </a>
                </li>
            
            </ul>
        </div>
        <div class="tab-content px-0 tab-sliding border-1 flex-grow-1 radius-b-2 border-t-0 brc-grey-l2">
            <div class="tab-pane show px-1 px-md-2 px-lg-3 active" id="profile-tab-overview">
               
                <div class="row mt-2">
                    <div class="col-12 px-4 mb-3">
                        
                       
                            <div class="bgc-white px-1 bo1rder-1 brc-secondary-l2 radius-1">
                                <div class="row">
                          @foreach($Seccion->Alumnos as $alumno)
                         <div class="col-12 col-sm-6">

                            <div class="d-block my-1 mx-n2 border-1 brc-secondary-l1 border-l-4 brc-purple-tp2  radius-1 p-0">

                              <div class="d-flex p-2">
                              	
                                <div class="pos-rel mr-3">
                                  <img src="{{url(Storage::url('sistem/photos/'.$alumno->datosalumno->persona->foto))}}" class="radius-round border-2 p-1px brc-primary-m2 w-6 h-6">

                                  
                                </div>


                                <div>
                                  <div>
                                    <a class="mt-0 text-blue-m1 text-90 font-bolder" href="#">
                                      {{$alumno->datosalumno->persona->nombres}}
                                    </a>
                                  </div>

                                  <div class="text-success-m2 text-80 font-bolder">
                                    {{$alumno->datosalumno->persona->apellidos}}
                                  </div>

                                </div>
                              </div>

                        
                            </div>
                          </div>
                           @endforeach
                       

                        </div>
                            </div>
                       
                    </div>
                </div>
            </div>
            <div class="tab-pane px-1 px-md-2 px-lg-3" id="profile-tab-activity">
                <div>
                   
                   
                   
                        <div class="px-lg-3">
                            <div class="mb-2 text-grey-m1 text-95 border-l-3 brc-blue-m1 pl-3">
                                <div class="d-flex align-items-start">
                                    <table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Curso
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Docente
																</th>

															
															</tr>
														</thead>

														<tbody>
															@foreach($Seccion->cursos as $curso)

															<tr>
																<td>{{$curso->cursoinfo->datosCurso->nombre}}</td>

																<td>
																
																	<b class="green">	@if($curso->docenteinfo)
																		<div class="name">
																			<a href="#">{{$curso->docenteinfo->persona->nombres}} {{$curso->docenteinfo->persona->apellidos}}</a>
																		</div>

																		
																		
@endif</b>
																</td>

																
															</tr>

											@endforeach
														</tbody>
													</table>
										
                                </div>
                            </div>
                        </div>
                    
                    
                </div>
            </div>
       
           
        </div>
    </div>
</div>


		
	


@stop


@section('script')

<script type="text/javascript">

		jQuery(function($) {


			  $('#menu-seccion').addClass('active open');
  $('#menu-seccion').children('.submenu').addClass('show');

  $('#seccion-show').addClass('active').removeClass('d-none'); 






		})


  
</script>

@stop