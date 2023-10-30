<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row ">

		<div class="profile-info-name " >Tipo de documento </div>

		<div class="profile-info-value ">
			<span >@php if ($Persona->tipodocumento=="pas") {
				echo "Pasaporte";
			} else {
				echo "Dni";
			}
			 @endphp</span>
		</div>
	</div>

	<div class="profile-info-row ">

		<div class="profile-info-name " >Numero de documento </div>

		<div class="profile-info-value ">
			<i class="ace-icon fa fa-address-card bigger-110 purple" ></i>
			<span >{{$Persona->nrodocumento}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Nombres </div>

		<div class="profile-info-value">
			
			<span >{{$Persona->nombres}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Apellidos </div>

		<div class="profile-info-value">
				<i class="ace-icon fa fa-user-o bigger-110 danger badge-yellow" ></i>
			<span >{{$Persona->apellidos}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Genero </div>

		<div class="profile-info-value">
			<i class="ace-icon fa fa-intersex bigger-110 green" ></i>
			<span >@if ($Persona->genero=='M')Masculino @else Femenino @endif</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Fecha de Nacimiento </div>
         
		<div class="profile-info-value">
			<span >{{ date("d-m-Y", strtotime($Persona->fechanacimiento))}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Direccion</div>

		<div class="profile-info-value">
			<i class="fa fa-map-marker light-orange bigger-110"></i>
			<span >{{$Persona->direccion}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Celular</div>

		<div class="profile-info-value">
			<span >{{$Persona->celular}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name">Telefono</div>

		<div class="profile-info-value">
			<span >{{$Persona->telefono}}</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> Correo</div>

		<div class="profile-info-value">
			<span >{{$Persona->correo}}</span>
		</div>
	</div>

</div>