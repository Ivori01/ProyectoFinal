<?php
Route::get('carnet/{id}','AlumnoController@carnetPdf')->name('Carnet.Pdf');
/*
|--------------------------------------------------------------------------
| Rutas Persona
|--------------------------------------------------------------------------
|
*/ 

  Route::get('profile','UserController@profile')->name('Profile');

Route::group(['prefix' => 'persona'], function () {
  Route::post('checkpersona','PersonaController@Check')->name('Persona.Check');
  
});



Route::group(['prefix' => 'user'], function () {
  Route::get('get','UserController@getAll')->name('User.Retrieve');

  Route::post('roles/{id}','UserController@roles')->name('User.Roles');
  Route::post('addrol','UserController@addRol')->name('User.Rol.Add');
  Route::post('removerol/{rol}','UserController@removeRol')->name('User.Rol.Remove');

  Route::get('searchlive','UserController@SearchLive')->name('User.Search');

});
Route::resource('user','UserController',[
'names'=>[
  'index'=>'User.Index',
  'store'=>'User.Store',
  'update'=>'User.Update',
  'destroy'=>'User.Destroy'
]]);


/*
|--------------------------------------------------------------------------
| Rutas Alumno
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'alumno'], function () {
   Route::get('get','AlumnoController@getAll')->name('Alumno.Retrieve');
   Route::post('store2','AlumnoController@store2')->name('Alumno.Store2');
   Route::get('searchliveAlumno','AlumnoController@SearchLive')->name('Alumno.Search');
      Route::post('checkalumno', 'AlumnoController@Check')->name('Alumno.Check');
   
       Route::get('searchliveAllAlumno', 'AlumnoController@SearchLiveAll')->name('Alumno.SearchAll');

           Route::get('boleta-de-notas/get-grados', 'AlumnoController@getGrados')->name('Alumno.Grados');
});

Route::resource('alumno','AlumnoController',
  ['names'=>[
  'index'=>'Alumno.Index',
  'create'=>'Alumno.Create',
  'store'=>'Alumno.Store',
  'show'=>'Alumno.Show',
  'edit'=>'Alumno.Edit',
  'update'=>'Alumno.Update',
  'destroy'=>'Alumno.Destroy'
]]);


/*
|--------------------------------------------------------------------------
| Rutas Apoderado
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'apoderado'], function () {
  Route::get('get','ApoderadoController@retrieve')->name('Apoderado.Retrieve');
  Route::post('store2','ApoderadoController@store2')->name('Apoderado.Store2');
  Route::get('searchliveApoderado','ApoderadoController@SearchLive')->name('Apoderado.Search');
  Route::post('checkapoderado', 'ApoderadoController@Check')->name('Apoderado.Check');
});  
Route::resource('apoderado','ApoderadoController',
['names'=>[
  'index'=>'Apoderado.Index',
  'create'=>'Apoderado.Create',
  'store'=>'Apoderado.Store',
  'show'=>'Apoderado.Show',
  'edit'=>'Apoderado.Edit',
  'update'=>'Apoderado.Update',
  'destroy'=>'Apoderado.Destroy'
]]);







   /*
|--------------------------------------------------------------------------
| Rutas Matricula
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'matricula'], function () {
   Route::get('get','MatriculaController@getAll')->name('Matricula.Retrieve');
   Route::post('check','MatriculaController@checkId')->name('checkmatricula');
});
  Route::resource('matricula','MatriculaController',['names'=>[
'index'=>'Matricula.Index',
'store'=>'Matricula.Store',
'destroy'=>'Matricula.Destroy'
]]);



/*
|--------------------------------------------------------------------------
| Rutas Notas
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'notas'], function () {
   

    Route::group(['prefix' => 'reporte'], function () {
        Route::get('boleta-de-notas', 'ReporteNotasController@boletaNotas')->name('BoletaNotas.Index');
        Route::post('boleta-de-notas/generarurl', 'ReporteNotasController@generarUrLBoleta')->name('Boleta.Url');
        Route::get('boleta-de-notas/{matricula}/ver', 'ReporteNotasController@generarBoleta')->name('Boleta.Pdf');

        Route::get('ranking-de-notas', 'ReporteNotasController@ranking')->name('Ranking.Index');
        Route::post('ranking/generarurl', 'ReporteNotasController@generarUrLRanking')->name('Ranking.Url');
        Route::get('ranking/{seccion}', 'ReporteNotasController@generarRanking')->name('Ranking.Pdf');

        Route::get('lista-de-notas', 'ReporteNotasController@lista')->name('Lista.Index');
        Route::post('lista/generarurl', 'ReporteNotasController@generarUrLLista')->name('Lista.Url');
        Route::get('lista/{matricula}', 'ReporteNotasController@generarLista')->name('Lista.Pdf');

       // Route::get('asignar/{seccion}', 'NotasController@create')->name('Notas.Create');

    });
});






/*
|--------------------------------------------------------------------------
| Rutas Descuentos
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'deuda'], function () {

Route::post('deudasalumno','DeudaController@alumnoDeudas')->name('Deuda.Alumno.Duedas');

   
});


Route::group(['prefix' => 'cuentas-por-cobrar'], function () {
    Route::get('get', 'CuentaPorCobrarController@getAll')->name('CuentaPorCobrar.Retrieve');
    Route::get('getalumnos', 'CuentaPorCobrarController@getAlumno')->name('CuentaPorCobrar.Alumnos');
    Route::get('getsecciones', 'CuentaPorCobrarController@getSeccion')->name('CuentaPorCobrar.Secciones');
    Route::post('store2', 'CuentaPorCobrarController@store2')->name('CuentaPorCobrar.Store2');

    Route::post('deudasalumno', 'CuentaPorCobrarController@alumnoCuentaPorCobrars')->name('CuentaPorCobrar.Alumno.Duedas');
});

/*
|--------------------------------------------------------------------------
| Rutas Caja
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'factura'], function () {
    Route::get('get', 'CobroController@getAll')->name('Cobro.Retrieve');
    Route::get('invoice/{id}', 'CobroController@invoice')->name('Cobro.Invoice');
    Route::get('df', 'CobroController@fun')->name('fun');
  
    /* Route::get('get','CuentaPorCobrarController@getAll')->name('retrievedeuda');
    Route::get('getalumnos','CuentaPorCobrarController@getAlumno')->name('deuda.alumnos');
    Route::get('getsecciones','CuentaPorCobrarController@getSeccion')->name('deuda.secciones');

    Route::post('deudasalumno','CuentaPorCobrarController@alumnoCuentaPorCobrars')->name('deuda.alumnoDuedas');
    Route::post('cajashow','CuentaPorCobrarController@cajaShow')->name('deuda.cajaShow');
     */
    Route::post('showtable', 'CobroController@showTable')->name('Cobro.Showtable');
    Route::get('searchlive', 'CobroController@SearchLive')->name('Cobro.Alumno.Search');

    Route::get('print-invoice/{caja}', 'CobroController@printInvoice')->name('Cobro.Print');
});
Route::resource('cobro', 'CobroController', ['names' => [
    'index'   => 'Cobro.Index',
    'create'  => 'Cobro.Create',
    'store'   => 'Cobro.Store',
    'edit'    => 'Cobro.Edit',
    'update'  => 'Cobro.Update',
    'destroy' => 'Cobro.Destroy',
]]);





Route::get('/', 'HomeController@index')->name('Home');

Route::group(['prefix' => 'directorhome'], function () {
  Route::post('getdata','HomeController@check')->name('home.getdata'); 
 //Route::view('ic','ic')->name('ic');
});