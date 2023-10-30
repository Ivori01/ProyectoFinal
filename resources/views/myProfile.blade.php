@extends('layouts.ace',['title'=>'Mi perfil'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 


@section('navbar-menu')
@component('components.director.navbar-menu')
@endcomponent
@endsection



@section('page-name')
@component('components.page-name')
@slot('page_name')
Ver
@endslot
@slot('subpage_name')
 
      Mi perfil
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
                <img class="radius-round bord1er-2 brc-warning-m1" height="100" src="{{url(Storage::url('sistem/photos/'.$Persona->foto))}}" width="100">
                    <span class=" position-tr bgc-success p-1 radius-round border-2 brc-white mt-2px mr-2px">
                    </span>
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
                <div class="mx-auto mt-25 text-center action-buttons">
                    <a class="mx-1" href="https://api.whatsapp.com/send?phone=51{{ $Persona->whatsapp }}">
                        <i class="fab fa-whatsapp-square text-180 text-success-m2">
                        </i>
                    </a>
                    <a class="mx-1" href="{{ $Persona->facebook }}">
                        <i class="fab fa-facebook text-180 text-blue-d1">
                        </i>
                    </a>
                    <a class="mx-1" href="{{ $Persona->instagram }}">
                        <i class="fab fa-instagram text-180 text-purple-m1">
                        </i>
                    </a>
                </div>
            </div>
            <hr class="w-90 mx-auto border-dotted">
                {{--
                <div class="text-center">
                    <button class="btn btn-blue px-5" type="button">
                        <i class="fa fa-handshake mr-1 text-110">
                        </i>
                        Hire me!
                    </button>
                </div>
                --}}
                <hr class="w-90 mx-auto mb-1 border-dotted">
                    <div class="mt-3">
                        <a class="btn bgc-blue-l2 btn-brc-white btn-h-outline-blue radius-round py-2 px-1 text-center border-2 shadow-sm" href="#">
                            <i class="fa fa-envelope w-4 text-110 text-blue-m1">
                            </i>
                        </a>
                        <a class="btn bgc-purple-l2 btn-brc-white btn-h-outline-purple radius-round py-2 px-1 text-center border-2 shadow-sm" href="#">
                            <i class="fa fa-users w-4 text-110 text-purple-m1">
                            </i>
                        </a>
                        <a class="btn bgc-warning-l2 btn-brc-white btn-h-outline-warning radius-round py-2 px-1 text-center border-2 shadow-sm" href="#">
                            <i class="fa fa-star w-4 text-110 text-orange-m1">
                            </i>
                        </a>
                    </div>
                    <hr class="w-90 mx-auto mb-1 border-dotted">
                        <div class="mt-2 mx-3">
                            <div class="text-secondary-d2 font-bolder text-90 mb-2">
                                <h4 class="text-dark-m3 text-140">
                                    <i class="fa fa-lightbulb text-success-m2 mr-2px">
                                    </i>
                                    Mis roles
                                </h4>
                            </div>
                            <div class="text-left">
                                @foreach (auth()->user()->roles as $rol)
                                <span class="d-inline-block radius-round bgc-warning-l2 text-dark-tp3 text-85 px-25 py-3px mx-2px my-2px">
                                    {{ $rol->name }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </hr>
                </hr>
            </hr>
        </div>
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
                            Overview
                        </span>
                        <span class="d-active text-dark-tp3">
                            Overview
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content px-0 tab-sliding border-1 flex-grow-1 radius-b-2 border-t-0 brc-grey-l2">
            <div class="tab-pane show px-1 px-md-2 px-lg-3 active" id="profile-tab-overview">
                <div class="row mt-1">
                    <div class="col-12 px-4 my-3">
                        <h4 class="mt-2 text-dark-m3 text-130">
                            <i class="fa fa-check text-purple-m2 p-2px border-2 text-80 radius-1 align-bottom mr-1">
                            </i>
                            Mi descripción
                        </h4>
                        <hr class="w-100 mx-auto mt-1 border-dotted">
                            <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start mb-2 text-grey-d2 text-95">
                                <img class="radius-2 opacity-2 order-first order-sm-last mx-2" height="150" src="{{url(Storage::url('sistem/photos/'.$Persona->foto))}}">
                                    <div class="mt-2 mt-sm-0 flex-grow-1">
                                        <p class="mb-1">
                                            @if ($Persona->descripcion)
                                        		{{ $Persona->descripcion }}
                                        	@else
                                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        	@endif
                                        </p>
                                    </div>
                                </img>
                            </div>
                        </hr>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 px-4 mb-3">
                        <h4 class="text-dark-m3 text-140">
                            <i class="fa fa-info text-blue-m2 mr-3px">
                            </i>
                            Informacion
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
                                                <i class="fa fa-address-book text-success-l1">
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
                                                <i class="fa fa-map-marker text-danger-m3">
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
                                                <i class="fa fa-mobile text-grey-m3">
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
                                    </tbody>
                                </table>
                            </div>
                        </hr>
                    </div>
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
<script type="text/javascript">
    @component('components.js.validate-form')
	  @slot('formId')
	    '#form-create'   
	  @endslot
      
      @slot('rules')
	password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#pass1"
						},

	   @endslot

	  @slot('messages')
		nrodocumento: {remote: "Numero de Documento Duplicado"}
	  @endslot

       @slot('submitHandler')
			var formData = new FormData($("#form-create")[0]);

		@component('components.js.ajax')
		
		    @slot('url')
				'{!! route('Secretaria.User.Update',['id'=>auth()->user()]) !!}'
			@endslot
	        @slot('data')
				formData
			@endslot

	        @slot('beforeSend')
		        $('#edit-password').widget_box('reload');
				
	        @endslot

			@slot('success')
				$('#edit-password').trigger('reloaded.ace.widget');
				resetForm("#form-create");
				messageSucess(msg);
		    @endslot

		@endcomponent
	
	  @endslot

	@endcomponent
		$('#profile-feed-1').ace_scroll({
		height: '250px',
		mouseWheelLock: true,
		alwaysVisible : true
		});





		})
</script>
