<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label for="state">Tipo de Documento</label>
  </div>
  <div class="col-sm-4 col-12 tag-input-style">
    <select  class="select2 form-control " data-placeholder="Seleccione" name="tipodocumento" id="tipodocumento" required="">
      <option value=''></option>	
      <option value='dpi' @if(isset($Persona))@if ($Persona->tipodocumento=='dpi') selected=""  @endif  @endif> Dpi</option>
      <option value='pas'  @if (isset($Persona))@if ($Persona->tipodocumento=='pas') selected=""  @endif  @endif> Pasaporte</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Numero de documento:</label>
  </div>
  <div class="col-sm-9">
    <input type="text" class="form-control w-50"   id="nrodocumento" name="nrodocumento" value="{{ $Persona->nrodocumento ?? ''}}">
  </div>
</div>		



<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Nombres:</label>
  </div>
  <div class="col-sm-9">
    <input type="text" class="form-control w-75"    name="nombres" id="nombres"  value="{{ $Persona->nombres ?? ''}}">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Apellidos:</label>
  </div>
  <div class="col-sm-9">
    <input type="text" class="form-control w-75" name="apellidos" id="apellidos"  value="{{ $Persona->apellidos ?? ''}}">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Genero:</label>
  </div>
  <div class="col-sm-9">
   <div>
        <label>
          <input name="genero" value="M" type="radio" class="input-xlg text-success" @if (isset($Persona))@if ($Persona->genero=='M')checked=""  @endif  @endif>
         Masculino
        </label>
      </div><div>
        <label>
          <input name="genero" value="F" type="radio" class="input-xlg text-success" @if (isset($Persona))@if ($Persona->genero=='F')checked=""  @endif  @endif>
          Femenino
        </label>
      </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
      <label class="mb-0" >
         Fecha de nacimiento :
      </label>
  </div>
  <div class="col-sm-9">
    <div class="input-group date datetimepicker w-50" id="id-timepicker">
      <input type="text"  id="fechanacimiento" name="fechanacimiento"
      value="@if(isset($Persona)){{date("Y-m-d", strtotime($Persona->fechanacimiento)) ?? ''}}@endif" 
      data-date-format="YYYY-MM-DD" class="form-control w-75" >
      <div class="input-group-addon input-group-append">
        <div class="input-group-text">
          <i class="far fa-clock"></i>
        </div>
      </div>
    </div>
  </div>
</div>
 
<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Direccion:</label>
  </div>
  <div class="col-sm-9">
    <input type="text" class="form-control " name="direccion" id="direccion"   value="{{ $Persona->direccion ?? ''}}">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Celular:</label>
  </div>
  <div class="col-sm-4">
    <input type="text" class="form-control col-sm-8 col-md-6 nro" id="celular" name="celular"   value="{{ $Persona->celular ?? ''}}">
  </div>
</div>

<div class="form-group row ">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Telefono:</label>
  </div>
  <div class="col-sm-4">
    <input type="text" class="form-control col-sm-8 col-md-6 nro" id="telefono" name="telefono"    value="{{ $Persona->telefono ?? ''}}">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-3 col-form-label text-sm-right pr-0">
    <label  class="mb-0">Correo:</label>
  </div>

  <div class="col-sm-9">
    <input type="text" class="form-control w-75" name="correo" id="correo"    value="{{ $Persona->correo ?? ''}}">
  </div>
</div>

<div class="form-group row" >
    <div class="col-sm-3 col-form-label text-sm-right pr-0">
        <label class="mb-0" >
            Foto :
        </label>
    </div>
    <div class="col-sm-9" id="g-f">
        <input class="form-control ace-file-input" id="foto" name="foto" type="file"/>
    </div>
</div>

