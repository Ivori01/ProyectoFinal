<?php
Route::get('carnet/{id}','AlumnoController@carnetPdf')->name('Carnet.Pdf');
/*
|--------------------------------------------------------------------------
| Rutas Info
|--------------------------------------------------------------------------
|
 */
Route::get('configuracion', 'InfoController@index')->name('Info.Index');
Route::post('configuracion-update/{info}', 'InfoController@update')->name('Info.Update');
/*
|--------------------------------------------------------------------------
| Rutas Persona
|--------------------------------------------------------------------------
|
 */

Route::get('profile', 'UserController@profile')->name('Profile');

Route::group(['prefix' => 'persona'], function () {
    Route::post('checkpersona', 'PersonaController@Check')->name('Persona.Check');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('get', 'UserController@getAll')->name('User.Retrieve');

    Route::post('reset-password/{id}', 'UserController@resetPassword')->name('User.ResetPassword');
    Route::post('roles/{id}', 'UserController@roles')->name('User.Roles');
    Route::post('addrol', 'UserController@addRol')->name('User.Rol.Add');
    Route::post('removerol/{rol}', 'UserController@removeRol')->name('User.Rol.Remove');

    Route::get('searchlive', 'UserController@SearchLive')->name('User.Search');
});
Route::resource('user', 'UserController', [
    'names' => [
        'index'   => 'User.Index',
        'store'   => 'User.Store',
        'update'  => 'User.Update',
        'destroy' => 'User.Destroy',
    ],
]);

/*
|--------------------------------------------------------------------------
| Rutas Alumno
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'alumno'], function () {
    Route::get('get', 'AlumnoController@getAll')->name('Alumno.Retrieve');
    Route::post('store2', 'AlumnoController@store2')->name('Alumno.Store2');
    Route::get('searchliveAlumno', 'AlumnoController@SearchLive')->name('Alumno.Search');
    Route::get('searchliveAllAlumno', 'AlumnoController@SearchLiveAll')->name('Alumno.SearchAll');

    Route::get('boleta-de-notas/get-grados', 'AlumnoController@getGrados')->name('Alumno.Grados');

    Route::post('checkalumno', 'AlumnoController@Check')->name('Alumno.Check');
});

Route::group(['prefix'=>'notas'],function(){
    Route::get('/','NotasController@index')->name('Notas.Index');

});

Route::resource(
    'alumno',
    'AlumnoController',
    ['names' => [
        'index'   => 'Alumno.Index',
        'create'  => 'Alumno.Create',
        'store'   => 'Alumno.Store',
        'show'    => 'Alumno.Show',
        'edit'    => 'Alumno.Edit',
        'update'  => 'Alumno.Update',
        'destroy' => 'Alumno.Destroy',
    ]]
);



/*
|--------------------------------------------------------------------------
| Rutas Docente
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'docente'], function () {
    Route::get('get', 'DocenteController@getAll')->name('Docente.Retrieve');
    Route::post('create2', 'DocenteController@store2')->name('Docente.Store2');

    Route::post('checkdocente', 'DocenteController@Check')->name('Docente.Check');
});
Route::resource(
    'docente',
    'DocenteController',
    ['names' => [
        'index'   => 'Docente.Index',
        'create'  => 'Docente.Create',
        'store'   => 'Docente.Store',
        'show'    => 'Docente.Show',
        'edit'    => 'Docente.Edit',
        'update'  => 'Docente.Update',
        'destroy' => 'Docente.Destroy',
    ]]
);

/*
|--------------------------------------------------------------------------
| Rutas Director
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'director'], function () {
    Route::get('get', 'DirectorController@getAll')->name('Director.Retrieve');
    Route::post('create2', 'DirectorController@store2')->name('Director.Store2');
    Route::post('checkdirector', 'DirectorController@Check')->name('Director.Check');
});
Route::resource('director', 'DirectorController', ['names' => [
    'index'   => 'Director.Index',
    'create'  => 'Director.Create',
    'store'   => 'Director.Store',
    'show'    => 'Director.Show',
    'edit'    => 'Director.Edit',
    'update'  => 'Director.Update',
    'destroy' => 'Director.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Director
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'secretaria'], function () {
    Route::get('get', 'SecretariaController@getAll')->name('Secretaria.Retrieve');
    Route::post('create2', 'SecretariaController@store2')->name('Secretaria.Store2');
    Route::post('checksecretaria', 'SecretariaController@Check')->name('Secretaria.Check');
});
Route::resource(
    'secretaria',
    'SecretariaController',
    ['names' => [
        'index'   => 'Secretaria.Index',
        'create'  => 'Secretaria.Create',
        'store'   => 'Secretaria.Store',
        'show'    => 'Secretaria.Show',
        'edit'    => 'Secretaria.Edit',
        'update'  => 'Secretaria.Update',
        'destroy' => 'Secretaria.Destroy',
    ]]
);

/*
|--------------------------------------------------------------------------
| Rutas Criterios Evaluacion
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'criterio-evaluacion'], function () {
    Route::get('get', 'CriterioEvaluacionController@getAll')->name('CriterioEvaluacion.Retrieve');
});
Route::resource(
    'criterio-evaluacion',
    'CriterioEvaluacionController',
    ['names' => [
        'index'   => 'CriterioEvaluacion.Index',
        'store'   => 'CriterioEvaluacion.Store',
        'edit'    => 'CriterioEvaluacion.Edit',
        'update'  => 'CriterioEvaluacion.Update',
        'destroy' => 'CriterioEvaluacion.Destroy',
    ]]
);

/*
|--------------------------------------------------------------------------
| Rutas Curso
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'curso'], function () {
    Route::get('get', 'CursoController@getAll')->name('Curso.Retrieve');
});

Route::resource('curso', 'CursoController', ['names' => [
    'index'   => 'Curso.Index',
    'store'   => 'Curso.Store',
    'edit'    => 'Curso.Edit',
    'update'  => 'Curso.Update',
    'destroy' => 'Curso.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Grado
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'grado'], function () {
    Route::get('get', 'GradoController@getAll')->name('Grado.Retrieve');
});

Route::resource('grado', 'GradoController', ['names' => [
    'index'   => 'Grado.Index',
    'store'   => 'Grado.Store',
    'edit'    => 'Grado.Edit',
    'update'  => 'Grado.Update',
    'destroy' => 'Grado.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Plan academico
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'plan-academico'], function () {
    Route::get('get', 'PlanAcademicoController@getAll')->name('PlanAcademico.Retrieve');

    Route::get('{plan}/grado', 'PlanAcademicoController@grado')->name('PlanAcademico.Grado');
    Route::get('grado/{grado}/curso', 'PlanAcademicoController@gradoCurso')->name('PlanAcademico.GradoCurso');
    Route::get('curso/{curso}/criterio-de-evaluacion', 'PlanAcademicoController@gradoCursoCriterio')->name('PlanAcademico.CursoCriterio');

    Route::get('print/{id}', 'PlanAcademicoController@print')->name('PlanAcademico.Print');
});

Route::resource('plan-academico', 'PlanAcademicoController', ['names' => [
    'index'   => 'PlanAcademico.Index',
    'store'   => 'PlanAcademico.Store',
    'show'    => 'PlanAcademico.Show',
    'edit'    => 'PlanAcademico.Edit',
    'update'  => 'PlanAcademico.Update',
    'destroy' => 'PlanAcademico.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Plan academico - Grado
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'plan-academico-grado'], function () {
    Route::get('get/{plan}', 'PlanAcademicoGradoController@getAll')->name('PlanAcademicoGrado.Retrieve');

    Route::post('{plan_grado}/trimestres', 'PlanAcademicoGradoController@trimestre')->name('PlanAcademicoGrado.Trimestre');

    Route::post('add-trimestre', 'PlanAcademicoGradoController@addTrimestre')->name('PlanAcademicoGrado.Trimestre.Add');

    Route::post('remove-trimestre/{trimestre}', 'PlanAcademicoGradoController@removeTrimestre')->name('PlanAcademicoGrado.Trimestre.Remove');
});

Route::resource('plan-academico-grado', 'PlanAcademicoGradoController', ['except' => ['index', 'show'], 'names' => [
    'store'   => 'PlanAcademicoGrado.Store',
    'edit'    => 'PlanAcademicoGrado.Edit',
    'update'  => 'PlanAcademicoGrado.Update',
    'destroy' => 'PlanAcademicoGrado.Destroy',

]]);

/*
|--------------------------------------------------------------------------
| Rutas Plan academico - Grado - Curso
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'plan-academico-grado-curso'], function () {
    Route::get('get/{grado_curso}', 'PlanAcademicoGradoCursoController@getAll')->name('PlanAcademicoGradoCurso.Retrieve');
});

Route::resource('plan-academico-grado-curso', 'PlanAcademicoGradoCursoController', ['only' => ['store', 'destroy'], 'names' => [
    'store'   => 'PlanAcademicoGradoCurso.Store',
    'destroy' => 'PlanAcademicoGradoCurso.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Plan academico - Grado - Curso -Criterio
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'plan-academico-curso-criterio'], function () {
    Route::get('get/{grado_curso}', 'CursoCriterioController@getAll')->name('PlanAcademicoCursoCriterio.Retrieve');
    Route::get('get2/{grado_curso}', 'CursoCriterioController@getAll2')->name('PlanAcademicoCursoCriterio.Retrieve2');

    Route::post('curso/{curso}/{trimestre}/criterio-trimestre', 'CursoCriterioController@criterioTrimestre')->name('PlanAcademicoCursoCriterio.Retrieve.CriterioTrimestre');
    Route::get('get-trimestres/{grado_curso}', 'CursoCriterioController@trimestres')->name('CursoCriterio.Trimestres');
    Route::post('save-multiple', 'CursoCriterioController@storeMultiple')->name('CursoCriterio.StoreMultiple');

    Route::post('save-for-all-trimestre', 'CursoCriterioController@storeForAll')->name('CursoCriterio.SaveForAll');

    Route::post('destroy-2/{id}', 'CursoCriterioController@destroy2')->name('CursoCriterio.Destroy2');
});

Route::resource('plan-academico-curso-criterio', 'CursoCriterioController', ['names' => [
    'store'   => 'CursoCriterio.Store',
    'destroy' => 'CursoCriterio.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Año academico
|--------------------------------------------------------------------------
|
 */

Route::group(['prefix' => 'anio-academico'], function () {
    Route::get('get', 'AnioAcademicoController@getAll')->name('AnioAcademico.Retrieve');
    Route::get('niveles/{anio}', 'AnioAcademicoController@nivel')->name('AnioAcademico.Nivel');
    Route::get('trimestres/{anio}', 'AnioAcademicoTrimestreController@index')->name('AnioAcademico.Trimestre');

    Route::get('activar', 'AnioAcademicoController@activar')->name('AnioAcademico.Activar');
    Route::post('change-estado', 'AnioAcademicoController@updateEstado')->name('AnioAcademico.Estado.Update');
});
Route::resource(
    'anio-academico',
    'AnioAcademicoController',
    ['names' => [
        'index'   => 'AnioAcademico.Index',
        'create'  => 'AnioAcademico.Create',
        'store'   => 'AnioAcademico.Store',
        'edit'    => 'AnioAcademico.Edit',
        'update'  => 'AnioAcademico.Update',
        'destroy' => 'AnioAcademico.Destroy',
    ]]
);

Route::group(['prefix' => 'anio-academico-niveles'], function () {
    Route::get('get/{anio}', 'AnioAcademicoNivelController@getAll')->name('AnioAcademicoNivel.Retrieve');
});

Route::resource(
    'anio-academico-niveles',
    'AnioAcademicoNivelController',
    ['names' => [

        'store'   => 'AnioAcademicoNivel.Store',
        'edit'    => 'AnioAcademicoNivel.Edit',
        'update'  => 'AnioAcademicoNivel.Update',
        'destroy' => 'AnioAcademicoNivel.Destroy',
    ]]
);

Route::group(['prefix' => 'anio-academico-trimestres'], function () {
    Route::get('get/{anio}', 'AnioAcademicoTrimestreController@getAll')->name('AnioAcademicoTrimestre.Retrieve');
    Route::get('trimestres/{planGrado}/{anioNivel}', 'AnioAcademicoTrimestreController@getTrimestres')->name('AnioAcademicoTrimestre.Get');
});

Route::resource(
    'anio-academico-trimestre',
    'AnioAcademicoTrimestreController',
    ['names' => [

        'store'   => 'AnioAcademicoTrimestre.Store',
        'edit'    => 'AnioAcademicoTrimestre.Edit',
        'update'  => 'AnioAcademicoTrimestre.Update',
        'destroy' => 'AnioAcademicoTrimestre.Destroy',
    ]]
);
/*
|--------------------------------------------------------------------------
| Rutas Seccion
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'seccion'], function () {
    Route::get('get', 'SeccionController@Retrieve')->name('Seccion.Retrieve');
    // Route::post('check','SeccionController@checkId')->name('checkseccion');
});
Route::resource('seccion', 'SeccionController', ['names' => [
    'index'   => 'Seccion.Index',
    'create'  => 'Seccion.Create',
    'store'   => 'Seccion.Store',
    'show'    => 'Seccion.Show',
    'edit'    => 'Seccion.Edit',
    'update'  => 'Seccion.Update',
    'destroy' => 'Seccion.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Seccion Docente Curso
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'seccion-docente-curso'], function () {
    Route::get('get', 'SeccionDocenteCursoController@getAll')->name('SeccionDocenteCurso.Retrieve');
});
Route::resource('seccion-docente-curso', 'SeccionDocenteCursoController', ['names' => [
    'index'   => 'SeccionDocenteCurso.Index',
    'create'  => 'SeccionDocenteCurso.Create',
    'store'   => 'SeccionDocenteCurso.Store',
    'show'    => 'SeccionDocenteCurso.Show',
    'edit'    => 'SeccionDocenteCurso.Edit',
    'update'  => 'SeccionDocenteCurso.Update',
    'destroy' => 'SeccionDocenteCurso.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Nivel
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'nivel'], function () {
    Route::get('get', 'NivelController@getAll')->name('Nivel.Retrieve');
});
Route::resource('nivel', 'NivelController', ['names' => [
    'index'   => 'Nivel.Index',
    'store'   => 'Nivel.Store',
    'edit'    => 'Nivel.Edit',
    'update'  => 'Nivel.Update',
    'destroy' => 'Nivel.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Trimestre
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'periodo-academico'], function () {
    Route::get('get', 'TrimestreController@getAll')->name('Trimestre.Retrieve');
});
Route::resource('periodo-academico', 'TrimestreController', ['names' => [
    'index'   => 'Trimestre.Index',
    'store'   => 'Trimestre.Store',
    'edit'    => 'Trimestre.Edit',
    'update'  => 'Trimestre.Update',
    'destroy' => 'Trimestre.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Horario
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'horario'], function () {
    Route::get('get', 'HorarioController@getAll')->name('Horario.Retrieve');

    Route::get('asignar/{seccion}', 'HorarioController@create')->name('Horario.Create');
    Route::post('resize/{id}', 'HorarioController@update2')->name('Horario.Resize');
    Route::get('horario', 'HorarioController@getAll')->name('retrievehorario');
});

Route::resource('horario', 'HorarioController', ['names' => [
    'index'   => 'Horario.Index',
    'store'   => 'Horario.Store',
    'show'    => 'Horario.Show',
    'update'  => 'Horario.Update',
    'destroy' => 'Horario.Destroy',

]]);

/*
|--------------------------------------------------------------------------
| Rutas Matricula
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'matricula'], function () {
    Route::get('get', 'MatriculaController@getAll')->name('Matricula.Retrieve');
    Route::post('check', 'MatriculaController@checkId')->name('checkmatricula');
});
Route::resource('matricula', 'MatriculaController', ['names' => [
    'index'   => 'Matricula.Index',
    'store'   => 'Matricula.Store',
    'destroy' => 'Matricula.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Notas
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'notas'], function () {
    Route::get('get', 'NotasController@Retrieve')->name('Notas.Retrieve');
    Route::get('ver/{seccion}', 'NotasController@show')->name('Notas.Show');
    Route::get('asignar/{seccion}', 'NotasController@create')->name('Notas.Create');

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
Route::resource('notas', 'NotasController', ['names' => [
    'index' => 'Notas.Index',
    'store' => 'Notas.Store',
    'edit'  => 'Notas.Edit',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Pagos
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'plantilla-de-pago'], function () {
    Route::get('get', 'PlantillaPagoController@getAll')->name('PlantillaPago.Retrieve');
    Route::get('get-conceptos', 'PlantillaPagoController@getConceptos')->name('PlantillaPago.Conceptos');
});
Route::resource('plantilla-de-pago', 'PlantillaPagoController', ['names' => [
    'index'   => 'PlantillaPago.Index',
    'store'   => 'PlantillaPago.Store',
    'edit'    => 'PlantillaPago.Edit',
    'show'    => 'PlantillaPago.Show',
    'update'  => 'PlantillaPago.Update',
    'destroy' => 'PlantillaPago.Destroy',
]]);

Route::group(['prefix' => 'concepto-de-pago'], function () {
    Route::get('get', 'ConceptoController@getAll')->name('Concepto.Retrieve');
});
Route::resource('concepto-de-pago', 'ConceptoController', ['names' => [
    'index'   => 'Concepto.Index',
    'store'   => 'Concepto.Store',
    'edit'    => 'Concepto.Edit',
    'update'  => 'Concepto.Update',
    'destroy' => 'Concepto.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Descuentos
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'descuento'], function () {
    Route::get('get', 'DescuentoController@getAll')->name('Descuento.Retrieve');
});
Route::resource('descuento', 'DescuentoController', ['names' => [
    'index'   => 'Descuento.Index',
    'store'   => 'Descuento.Store',
    'edit'    => 'Descuento.Edit',
    'update'  => 'Descuento.Update',
    'destroy' => 'Descuento.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Aignar Descuentos
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'cuenta-por-cobrar-descuento'], function () {
    Route::get('get', 'CuentaPorCobrarDescuentoController@getAll')->name('CuentaDescuento.Retrieve');
    Route::get('get-descuentos/{cuenta}', 'CuentaPorCobrarDescuentoController@getDescuentos')->name('Cuenta.Descuentos');
});
Route::resource('cuenta-por-cobrar-descuento', 'CuentaPorCobrarDescuentoController', ['names' => [
    'index'   => 'CuentaDescuento.Index',
    'store'   => 'CuentaDescuento.Store',
    'edit'    => 'CuentaDescuento.Edit',
    'update'  => 'CuentaDescuento.Update',
    'destroy' => 'CuentaDescuento.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Descuentos
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'cuentas-por-cobrar'], function () {
    Route::get('get', 'CuentaPorCobrarController@getAll')->name('CuentaPorCobrar.Retrieve');
    Route::get('getalumnos', 'CuentaPorCobrarController@getAlumno')->name('CuentaPorCobrar.Alumnos');
    Route::get('getsecciones', 'CuentaPorCobrarController@getSeccion')->name('CuentaPorCobrar.Secciones');
    Route::post('store2', 'CuentaPorCobrarController@store2')->name('CuentaPorCobrar.Store2');

    Route::post('deudasalumno', 'CuentaPorCobrarController@alumnoCuentaPorCobrars')->name('CuentaPorCobrar.Alumno.Duedas');
});
Route::resource('cuentas-por-cobrar', 'CuentaPorCobrarController', ['names' => [
    'index'   => 'CuentaPorCobrar.Index',
    'store'   => 'CuentaPorCobrar.Store',
    'edit'    => 'CuentaPorCobrar.Edit',
    'update'  => 'CuentaPorCobrar.Update',
    'destroy' => 'CuentaPorCobrar.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Cobro
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
    Route::post('getdata', 'HomeController@check')->name('home.getdata');
    Route::view('ic', 'ic')->name('ic');
});
