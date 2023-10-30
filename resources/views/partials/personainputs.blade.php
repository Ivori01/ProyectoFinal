

<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" >Tipo de Documento</label>
		<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 ">
			<div class="clearfix">
				<select class="select2  col-xs-4 col-sm-4"   data-placeholder="Seleccione" name="tipodocumento" id="tipodocumento">
				<option value=''></option>	
				<option value='dni' @if (isset($Persona))@if ($Persona->tipodocumento=='dni') selected=""  @endif  @endif> Dni</option>
				<option value='pas'  @if (isset($Persona))@if ($Persona->tipodocumento=='pas') selected=""  @endif  @endif> Pasaporte</option>
				</select>
			</div>
		</div>
		<span class="block input-icon input-icon-right">
	    </span>    
</div>

																

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">numero de Documento:</label>
	<div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 ">
		<div class="clearfix">
		<input type="text" id="nrodocumento" name="nrodocumento" class="col-xs-12 col-sm-5" value="{{ $Persona->nrodocumento ?? ''}}" />
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>  

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">nombres:</label>
	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="nombres" id="nombres"  class="col-xs-12 col-sm-6"  value="{{ $Persona->nombres ?? ''}}" >
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">apellidos:</label>
	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="apellidos" id="apellidos" class="col-xs-12 col-sm-6" value="{{ $Persona->apellidos ?? ''}}"/>
	    </div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right">Genero</label>
	<div class="col-xs-12 col-sm-9">
				
		<div>
			<label class="line-height-1 blue">
			<input name="genero" value="M" type="radio" class="ace"  @if (isset($Persona))@if ($Persona->genero=='M')checked=""  @endif  @endif/>
			<span class="lbl"> Masculino</span>
			</label>
		</div>
		<div>
			<label class="line-height-1 blue">
			<input name="genero" value="F" type="radio" class="ace" @if (isset($Persona))@if ($Persona->genero=='F')checked=""  @endif  @endif />
			<span class="lbl"> Femenino</span>
			</label>
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Fecha de nacimiento</label>
	<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
		<div class="input-group">
			<input class="form-control date-picker col-xs-4 col-sm-4" id="fechanacimiento" name="fechanacimiento" type="text" data-date-format="dd-mm-yyyy" value="@if(isset($Persona)){{date("d-m-Y", strtotime($Persona->fechanacimiento)) ?? ''}}@endif">
			<span class="input-group-addon">
			<i class="fa fa-calendar bigger-110"></i>
			</span>
		</div>
		
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Direccion:</label>
	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="direccion" id="direccion" class="col-xs-12 col-sm-6"  value="{{ $Persona->direccion ?? ''}}"/>
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right"  > Celular</label>
	<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 ">
		<div class="input-group">
			<input type="tel" id="celular" name="celular" class="form-control col-xs-4 col-sm-4 nro" value="{{ $Persona->celular ?? ''}}" />
			<span class="input-group-addon">
				<i class="ace-icon fa fa-phone"></i>
			</span>

		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>


<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right"  > Telefono</label>
	<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 ">
		<div class="input-group">
			
			<input type="tel" id="telefono" name="telefono" class="form-control col-xs-4 col-sm-4 nro" value="{{ $Persona->telefono ?? ''}}" />
			<span class="input-group-addon">
				<i class="ace-icon fa fa-phone"></i>
			</span>
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email" >Correo:</label>
	<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<input type="text" name="correo" id="correo" class="col-xs-12 col-sm-6" value="{{ $Persona->correo ?? ''}}" />
		</div>
	</div>
	<span class="block input-icon input-icon-right">
	</span>
</div>

<div class="space-2"></div>

<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment">Imagen</label>
	<div class="col-xs-12 col-sm-5">
		<input type="file" id="foto" name="foto" />
	</div>
</div>

<div class="space-2"></div>