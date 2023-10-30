@extends('layouts.print',['title'=>'Director | Plan academico'])

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
        <h3 class="text-center text-secondary">
            <u>
                Detalles del plan -  {{ $plan->nombre }} - {{  $plan->DatosNivel->nombre}}
            </u>
        </h3>
        <div class="tab-content border-0 ">
            @foreach($plan->grados()->get()->sortBy('datosGrado.numero') as $grado)
            <h4 class="text-center grey">
                <u>
                    Detalles del grado  - {{$grado->datosGrado->nombre}}
                </u>
            </h4>
            <div aria-labelledby="{{$grado->datosGrado->nombre}}-tab" class="tab-pane fade active show pb-4" id="body-{{$grado->datosGrado->nombre}}" role="tabpanel">
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
        </div>
    </div>
</div>
@stop
