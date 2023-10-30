<?php



Route::resource('user', 'UserController', ['except' => ['create', 'store', 'show', 'edit', 'index', 'destroy'],
    'names'                                             => [
        'update' => 'User.Update',
    ]]);
Route::get('profile', 'UserController@profile')->name('Profile');
/*
|--------------------------------------------------------------------------
| Rutas Grado
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'grado'], function () {
    Route::get('get', 'GradoController@getAll')->name('Grado.Retrieve');

});

Route::resource('grado', 'GradoController', ['except' => ['create', 'store', 'show', 'edit', 'update', 'destroy'],
    'names'                                               => [
        'index' => 'Grado.Index',
    ]]);

/*
|--------------------------------------------------------------------------
|Rutas  Notas
|--------------------------------------------------------------------------
|
 */

Route::get('notas/{id}', 'NotasController@index')->name('Notas.Index');
Route::get('boleta-notas/{id}', 'NotasController@boleta')->name('Notas.Boleta');
Route::get('detail-notas/{id}', 'NotasController@detalle')->name('Notas.Detalle');

/*
|--------------------------------------------------------------------------
|Rutas  Horario
|--------------------------------------------------------------------------
|
 */

Route::group(['prefix' => 'horario'], function () {
    Route::get('get', 'HorarioController@getAll')->name('Horario.Retrieve');

});

Route::resource('horario', 'HorarioController', ['names' => [
    'index'   => 'Horario.Index',
    'show'    => 'Horario.Show',
    'edit'    => 'Horario.Edit',
    'update'  => 'Horario.Update',
    'destroy' => 'Horario.Destroy',
]]);

/*
|--------------------------------------------------------------------------
| Rutas Deudas
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'deuda'], function () {
    Route::get('get', 'DeudaController@getAll')->name('Deuda.Retrieve');
    Route::get('boleta/{id}', 'DeudaController@invoice')->name('Deuda.Invoice');

});

Route::resource('deuda', 'DeudaController', ['except' => ['create', 'store', 'show', 'edit', 'update', 'destroy'],
    'names'                                               => [
        'index' => 'Deuda.Index',
    ]]);

Route::group(['prefix' => 'aula-virtual'], function () {

    Route::group(['prefix' => 'curso'], function () {
        Route::get('{id}', 'AulaVirtualController@curso')->name('AulaVirtual.Curso.Index');
        Route::get('{id}/contenido', 'AulaVirtualController@cursoContenido')->name('AulaVirtual.Curso.Contenido');

    });
    

    Route::group(['prefix' => 'evaluacion'], function () {
        Route::get('/{evaluacion}/start', 'EvaluacionController@preview')->name('Evaluacion.StartPreview');
        Route::get('{evaluacion}/resolviendo', 'EvaluacionController@showQuestion')->name('Evaluacion.Preview');
        Route::post('preview/{evaluacion}/calificar', 'EvaluacionController@qualifyQuestion')->name('Evaluacion.QualifyPreview');
        Route::post('saveAnswer', 'EvaluacionController@saveAnswer')->name('Evaluacion.SaveAnswer');
        Route::get('saveAttemp/{intento}', 'EvaluacionController@saveAttemp')->name('Evaluacion.FinishAttemp');
        Route::get('review/{intento}', 'EvaluacionController@reviewAttemp')->name('Evaluacion.ReviewAttemp');
    
    });

    Route::group(['prefix' => 'tarea-entrega'], function () {
        Route::get('get/{id}', 'TareaEntregaController@getAll')->name('TareaEntrega.GetAll');
        Route::get('{id}/download', 'TareaEntregaController@download')->name('TareaEntrega.Download');
        Route::get('{id}/revisiones', 'TareaEntregaController@revisiones')->name('TareaEntrega.Revisiones');

    });
    Route::resource('tarea-entrega', 'TareaEntregaController', [
        'names' => [
            'index'   => 'TareaEntrega.Index',
            'show'    => 'TareaEntrega.Show',
            'edit'    => 'TareaEntrega.Edit',
            'store'   => 'TareaEntrega.Store',
            'update'  => 'TareaEntrega.Update',
            'destroy' => 'TareaEntrega.Destroy',
        ]]);

    Route::group(['prefix' => 'archivo-tarea'], function () {
        Route::get('{id}/download', 'ArchivoTareaController@download')->name('ArchivoTarea.Download');

    });

    Route::resource('archivo-tarea', 'ArchivoTareaController', [
        'names' => [
            //'index'   => 'Tarea.Index',
            //'show'    => 'Tarea.Show',
            //'edit'    => 'Tarea.Edit',
            //'update'  => 'Tarea.Update',
            'store'   => 'ArchivoTarea.Store',
            'destroy' => 'ArchivoTarea.Destroy',
        ]]);

    Route::group(['prefix' => 'multimedia'], function () {
        Route::get('{id}/download', 'MultimediaController@download')->name('Multimedia.Download');

    });

});

Route::resource('aula-virtual', 'AulaVirtualController', [
    'names' => [
        'index' => 'AulaVirtual.Index',
    ]]);
Route::get('/', 'HomeController@index')->name('Home');
