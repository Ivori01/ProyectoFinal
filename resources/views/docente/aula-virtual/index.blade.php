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
<a href=""{{ route('Docente.AulaVirtual.Index') }}>Aula Virtual</a>
@endslot
@endcomponent
@endsection

@section('head') 
<link href="{{ asset('assets/css/photoswipe.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/default-skin.min.css')}}" rel="stylesheet" type="text/css"/>
<style>
    .pricing-col {
        z-index: 0;
        transition: border-color 150ms, transform 150ms, z-index 0ms;
        transition-delay: 0ms, 0ms, 75ms;
      }

      .pricing-col:hover {
        transition-delay: 0ms;
        z-index: 1;
        transform: scale(1.06);
        /** box-shadow: 0 0 5px 0px rgba(0,0,0,0.1); **/
      }
</style>
@endsection

@section('content')

@if(count($cursos)>0)

@foreach($cursos->groupBy('seccionInfo.id') as $c)
<div class="row d-flex justify-content-center mx-1 mx-lg-0 mt-3">
    @foreach($c as $curso)
    <div class="col-12 col-sm-6 col-lg-3 px-2 pt-4 pricing-col">
        <div class="d-style w-100 border-t-3 my-1 pb-3 btn btn-outline-light btn-h-outline-blue btn-h-bgc-white btn-a-outline-blue btn-a-bgc-white">
            <div class="d-flex flex-column align-items-center">
                <span class="position-tr mt-n25 mr-5px">
                    <span class="badge badge-warning badge-lg arrowed-in arrowed-in-right">
                        {{ $curso->seccionInfo->datosGrado->DatosNivel->nombre }}
                    </span>
                </span>
                <h4 class="w-90 pb-1 text-140 text-blue-m3 mt-2 mb-3 border-b-2 brc-grey-l2">
                    <i>
                        {{  $curso->cursoInfo->datosCurso->nombre }}
                    </i>
                </h4>
                <div class="mb-2 px-2 py-25 brc-default-m4 border-b-2">
                    {{--
                    <i class="w-6 fas fa-running fa-2x">
                    </i>
                    --}}
                    <img height="120" src="{{  url(Storage::url('sistem/photos/curso/'.$curso->cursoInfo->datosCurso->imagen)) }}" width="70%">
                    </img>
                </div>
                <div class="text-secondary-m1">
                    <span class="">
                        {!!  $curso->seccionInfo->datosGrado->nombre.' '. $rep_seccion->letra($curso->seccionInfo->letra) !!}
                    </span>
                </div>
                <div class="flex-grow-1 text-grey-m1 text-90 w-90">
                    <ul class="list-unstyled text-left mx-auto mb-1">
                        <li class="mt-3 text-center">
                            <hr class="my-4 brc-grey-l2">
                                <a class="pos-abs v-n-active btn btn-outline-default px-3 btn-bold" href="{{ route('Docente.AulaVirtual.Curso.Index', ['id' => $curso->id]) }}">
                                    Configurar
                                </a>
                                <a class="pos-rel v-active btn btn-blue px-3 btn-bold" href="{{ route('Docente.AulaVirtual.Curso.Index', ['id' => $curso->id]) }}">
                                    Configurar
                                </a>
                            </hr>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<hr class="mt-4"/>

@endforeach
@endif


    

@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


@section('script')

</script>

<script type="text/javascript">

    jQuery(function($) {
     

        });
</script>
@endsection
