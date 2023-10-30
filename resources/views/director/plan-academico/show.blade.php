@extends('layouts.ace',['title'=>'Director | Plan academico'])

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
Plan Academico
@endslot
@slot('subpage_name')
 
      Ver
@endslot
@endcomponent
@endsection

@section('content')

<div class="row">
              <div class="col-12">
                <div class="sticky-nav"><div class="sticky-trigger"></div>
                  <ul class="nav nav-tabs page-nav-tabs nav-tabs-boxed nav-justified nav-tabs-scroll is-scrollable mx-n3 mx-lg-0" role="tablist">
                  	@foreach($plan->grados()->get()->sortBy('datosGrado.numero') as $grado)
                    <li class="nav-item">
                    	@if ($loop->first)
                    	  <a class="nav-link  active" id="{{$grado->datosGrado->nombre}}-tab" data-toggle="tab" href="#body-{{$grado->datosGrado->nombre}}" role="tab" aria-controls="tabs" aria-selected="true">
                        <i class="text-success-m2 fa fa-home mr-2 text-110"></i>
                       {{$grado->datosGrado->nombre}}
                      </a>
                        @else
		<a class="nav-link " id="{{$grado->datosGrado->nombre}}-tab" data-toggle="tab" href="#body-{{$grado->datosGrado->nombre}}" role="tab" aria-controls="tabs" aria-selected="true">
		<i class="text-success-m2 fa fa-home mr-2 text-110"></i>
		{{$grado->datosGrado->nombre}}
		</a>
                    	@endif
			                    			
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="tab-content border-0 px-0 pt-4">
                	@foreach($plan->grados()->get()->sortBy('datosGrado.nombre') as $grado)
                	@if ($loop->first)
                  <div class="tab-pane fade active show" id="body-{{$grado->datosGrado->nombre}}" role="tabpanel" aria-labelledby="{{$grado->datosGrado->nombre}}-tab">
@else
 <div class="tab-pane fade " id="body-{{$grado->datosGrado->nombre}}" role="tabpanel" aria-labelledby="{{$grado->datosGrado->nombre}}-tab">
@endif

@if($grado->modo_criterio =='same')

 @component('components.director.plan.table-plan',['grado'=>$grado,'trimestre'=>$grado->trimestres->first()])
 @endcomponent
@else
@if($grado->modo_criterio=='different')
@component('components.director.plan.table-plan2',['grado'=>$grado])
 @endcomponent
@endif
@endif

                  

   
                  </div>
					@endforeach

                  <div class="tab-pane fade" id="alerts" role="tabpanel" aria-labelledby="alerts-tab">
                    <div class="row">

                   


                    </div>
                  </div>

              </div>

            </div>
          </div>

@stop


@section('script')

<script type="text/javascript">

		jQuery(function($) {

	
	

	  $('#menu-plan_academico').addClass('active open');
  $('#menu-plan_academico').children('.submenu').addClass('show');

  $('#menu-plan_academico-ver').addClass('active').removeClass('d-none'); 




		})

   
</script>

@stop