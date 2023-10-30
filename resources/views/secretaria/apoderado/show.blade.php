@extends('layouts.ace',['title'=>'Secretaria | Apoderado'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.secretaria.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.secretaria.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Padre
@endslot
@slot('subpage_name')
 
      Perfil
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
                <img class="radius-round bord1er-2 brc-warning-m1 img-thumbnail" src="{{url(Storage::url('sistem/photos/'.$Persona->foto))}}" width="100%">
                   
                </img>
            </div>
            <div class="text-center mt-2">
                <h5 class="text-120 text-secondary-d3">
                    {{$Persona->nombres}}
                </h5>
                <span class="text-80 text-default-d1 text-600">
                    {{$Persona->apellidos}}
                </span>
            </div>
            <div>
            </div>
         
                 
                    <hr class="w-90 mx-auto mb-1 border-dotted">
                        <div class="row w-90 text-center">
                            <div class="col">
                                <div class="px-1 pt-2">
                                    <span class="text-150 text-grey-d1">
                                       {{$Persona->fechanacimiento->age}} Años
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
                           Datos
                        </span>
                        <span class="d-active text-dark-tp3">
                                Datos
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a aria-controls="home" aria-selected="false" class="d-style nav-link p-3 brc-blue" data-toggle="tab" href="#profile-tab-activity" role="tab">
                        <span class="d-n-active">
                            Hijos
                        </span>
                        <span class="d-active text-dark-tp3">
                            Hijos
                        </span>
                        <span class="badge badge-warning badge-pill ml-2px text-80">
                           {{ $Apoderado->alumnos->count() }}
                        </span>
                    </a>
                </li>
            
            </ul>
        </div>
        <div class="tab-content px-0 tab-sliding border-1 flex-grow-1 radius-b-2 border-t-0 brc-grey-l2">
            <div class="tab-pane show px-1 px-md-2 px-lg-3 active" id="profile-tab-overview">
               
                <div class="row mt-2">
                    <div class="col-12 px-4 mb-3">
                        <h4 class="text-dark-m3 text-140">
                            <i class="fa fa-info text-blue-m2 mr-3px">
                            </i>
                           Datos Personales
                        </h4>
                        <hr class="w-100 mx-auto my-1 border-dotted">
                            <div class="bgc-white px-1 bo1rder-1 brc-secondary-l2 radius-1">
                                <table class="table table table-striped-info table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <i class="fa fa-address-card text-brown">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                              Tipo de documento
                                            </td>
                                            <td class="text-secondary-d2">
                                                @php if ($Persona->tipodocumento=="pas") {
				echo "Pasaporte";
			} else {
				echo "Dni";
			}
			 @endphp
                                            </td>
                                        </tr>
                                            <tr>
                                            <td>
                                                <i class="fa fa-id-card text-yellow-l1">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Numero de documento
                                            </td>
                                            <td class="text-secondary-d2">
                                               {{$Persona->nrodocumento}}
                                            </td>
                                        </tr>
                                          <tr>
                                            <td>
                                                <i class="fa fa-address-book  text-success-l1">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Nombres
                                            </td>
                                            <td class="text-secondary-d2">
                                               {{$Persona->nombres}}
                                            </td>
                                        </tr>
                                          <tr>
                                            <td>
                                                <i class="fa fa-address-book text-success-l1">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                               Apellidos
                                            </td>
                                            <td class="text-secondary-d2">
                                               {{$Persona->apellidos}}
                                            </td>
                                        </tr>
                                          <tr>
                                            <td>
                                                <i class="fa fa-venus-mars text-dark-l1">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Genero
                                            </td>
                                            <td class="text-secondary-d2">
                                               @if ($Persona->genero=='M')Masculino @else Femenino @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-calendar text-blue-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Fecha de Nacimiento
                                            </td>
                                            <td class="text-secondary-d2 text-wrap">
                                               {{ date("d-m-Y", strtotime($Persona->fechanacimiento))}}
                                            </td>
                                        </tr>
                                           <tr>
                                            <td>
                                                <i class="fa fa-map-marker  text-danger-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Direccion
                                            </td>
                                            <td class="text-secondary-d2 text-wrap">
                                               {{$Persona->direccion}}
                                            </td>
                                        </tr>
                                           <tr>
                                            <td>
                                                <i class="fa fa-mobile  text-grey-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                               Celular
                                            </td>
                                            <td class="text-secondary-d2 text-wrap">
                                               {{$Persona->celular}}
                                            </td>
                                        </tr>
                                           <tr>
                                            <td>
                                                <i class="fa fa-phone text-blue-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                              Telefono
                                            </td>
                                            <td class="text-secondary-d2 text-wrap">
                                               {{$Persona->telefono}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-envelope text-purple-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                               Correo
                                            </td>
                                            <td class="text-secondary-d2">
                                                {{$Persona->correo}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-tags text-orange-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Estado
                                            </td>
                                            <td class="text-secondary-d2">
                                                {{$Apoderado->estado}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="far fa-clock text-secondary-m3">
                                                </i>
                                            </td>
                                            <td class="text-95 text-default-d3">
                                                Ocupacion
                                            </td>
                                            <td class="text-secondary-d2">
                                               {{$Apoderado->ocupacion}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </hr>
                    </div>
                </div>
            </div>
            <div class="tab-pane px-1 px-md-2 px-lg-3" id="profile-tab-activity">
                <div>
                    <div class="d-flex m-3">
                        <h4 class="text-dark-tp4 text-130 p-0 m-0">
                          Hijos
                        </h4>
                      
                    </div>
                    @foreach($Apoderado->alumnos as $hijo)
                    <hr class="border-dotted mx-3">
                        <div class="px-lg-3">
                            <div class="mb-2 text-grey-m1 text-95 border-l-3 brc-blue-m1 pl-3">
                                <div class="d-flex align-items-start">
                                    <img class="border-1 brc-success-m1 radius-round p-1px w-5" src="{{url(Storage::url('sistem/photos/'.$hijo->persona->foto))}}">
                                        <div class="mx-2">
                                            <span class="font-bolder text-blue-d1">
                                               {{ $hijo->persona->nombres }}
                                            </span>
                                           {{ $hijo->persona->apellidos }}
                                         
                                        </div>
                                
                                    </img>
                                </div>
                            </div>
                        </div>
                    </hr>
                    @endforeach
                </div>
            </div>
       
           
        </div>
    </div>
</div>
@stop


@section('footer')
@component('components.footer')
@endcomponent
@endsection
@section('script')
<script type="text/javascript">
    jQuery(function($) {
		



  $('#menu-persona').addClass('active open');
  $('#menu-persona').children('.submenu').addClass('show');
  $('#menu-apoderado').addClass('active open');  
  $('#menu-apoderado').children('.submenu').addClass('show');
  $('#apoderado-show').addClass('active').removeClass('d-none');

})
</script>
@stop
