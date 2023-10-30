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
Route::group(['prefix' => 'curso'], function () {
    Route::get('get', 'CursoController@getAll')->name('Curso.Retrieve');

});

Route::group(['prefix' => 'asistencia'], function () {
    Route::get('get-secciones', 'AsistenciaController@getSecciones')->name('Asistencia.Secciones');
    Route::get('/', 'AsistenciaController@index')->name('Asistencia.Index');
    Route::get('{id}/registrar','AsistenciaController@create')->name('Asistencia.Create');
    Route::post('registrar','AsistenciaController@store')->name('Asistencia.Store');
    Route::get('reporte/{id}','AsistenciaController@reporte')->name('Asistencia.Reporte');


});

Route::resource('curso', 'CursoController', ['except' => ['create', 'store', 'show', 'edit', 'update', 'destroy'],
    'names'                                               => [
        'index' => 'Curso.Index',
    ]]);

/*
|--------------------------------------------------------------------------
| Rutas Notas
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'notas'], function () {
    Route::get('get/{id}', 'NotasController@getAll')->name('Notas.Retrieve');
    Route::get('seccion/{id}', 'NotasController@index')->name('Notas.Index');
    Route::post('seccsion/{id}', 'NotasController@store')->name('Notas.Store');

});

/*
|--------------------------------------------------------------------------
| Rutas Grado
|--------------------------------------------------------------------------
|
 */
Route::resource('horario', 'HorarioController', [
    'names' => [
        'index' => 'Horario.Index',
    ]]);

Route::get('/', 'HomeController@index')->name('Home');

/*
|--------------------------------------------------------------------------
| Rutas Notas
|--------------------------------------------------------------------------
|
 */
Route::group(['prefix' => 'aula-virtual'], function () {
    Route::get('get/{id}', 'NotasController@getAll')->name('Notas.Retrieve');

    Route::group(['prefix' => 'curso'], function () {
        Route::get('{id}', 'AulaVirtualController@curso')->name('AulaVirtual.Curso.Index');
        Route::get('{id}/contenido', 'AulaVirtualController@cursoContenido')->name('AulaVirtual.Curso.Contenido');
        Route::resource('contenido', 'ContenidoController', [
            'names' => [
                'index'   => 'Contenido.Index',
                'show'    => 'Contenido.Show',
                'store'   => 'Contenido.Store',
                'destroy' => 'Contenido.Destroy',
            ]]);

    });
    Route::group(['prefix' => 'contenido'], function () {
        Route::get('get/{id}', 'ContenidoController@getAll')->name('Contenido.GetAll');
        Route::post('reorder', 'ContenidoController@updateOrder')->name('Contenido.Reorder');

    });

    Route::resource('texto', 'TextoController', [
        'names' => [
            'index'   => 'Texto.Index',
            'show'    => 'Texto.Show',
            'update'  => 'Texto.Update',
            'store'   => 'Texto.Store',
            'destroy' => 'Texto.Destroy',
        ]]);

    Route::group(['prefix' => 'evaluacion'], function () {
        Route::get('preview/start/{evaluacion}', 'EvaluacionController@preview')->name('Evaluacion.StartPreview');
        Route::get('preview/{evaluacion}', 'EvaluacionController@showQuestion')->name('Evaluacion.Preview');
        Route::post('preview/{evaluacion}/calificar', 'EvaluacionController@qualifyQuestion')->name('Evaluacion.QualifyPreview');
    Route::get('{evaluacion}/attemps', 'EvaluacionController@attemps')->name('Evaluacion.Attemps');

    Route::post('question/{id}','EvaluacionController@updateResult')->name('Evaluacion.UpdateResult');

    });
    Route::resource('evaluacion', 'EvaluacionController', [
        'names' => [
            'index'   => 'Evaluacion.Index',
            'show'    => 'Evaluacion.Show',
            'edit'    => 'Evaluacion.Edit',
            'update'  => 'Evaluacion.Update',
            'store'   => 'Evaluacion.Store',
            'destroy' => 'Evaluacion.Destroy',
        ]]);

    Route::group(['prefix' => 'preguntas'], function () {
        Route::get('opciones/{pregunta}', 'PreguntaController@getOpciones')->name('Pregunta.GetOpciones');
        Route::post('update/options', 'PreguntaController@updateOptions')->name('Pregunta.UpdateOptions');
        Route::post('save/options', 'PreguntaController@saveOptions')->name('Pregunta.SaveOptions');
        Route::post('delete-option/{opcion}', 'PreguntaController@deleteOptions')->name('Pregunta.DeleteOptions');

    });
    Route::resource('preguntas', 'PreguntaController', [
        'names' => [
            'index'   => 'Pregunta.Index',
            'show'    => 'Pregunta.Show',
            'edit'    => 'Pregunta.Edit',
            'update'  => 'Pregunta.Update',
            'store'   => 'Pregunta.Store',
            'destroy' => 'Pregunta.Destroy',
        ]]);

    Route::group(['prefix' => 'preguntas-aleatorias'], function () {
        Route::post('ad-question/{pregunta}', 'PreguntaAleatoriaController@storeQuestion')->name('PreguntaAleatoria.addQuestion');
        Route::delete('destroy/{pregunta}', 'PreguntaAleatoriaController@destroyQuestion')->name('PreguntaAleatoria.DestroyQuestion');
        /*Route::post('update/options', 'PreguntaController@updateOptions')->name('Pregunta.UpdateOptions');
    Route::post('save/options', 'PreguntaController@saveOptions')->name('Pregunta.SaveOptions');
    Route::post('delete-option/{opcion}', 'PreguntaController@deleteOptions')->name('Pregunta.DeleteOptions');*/

    });
    Route::resource('pregunta-aleatorias', 'PreguntaAleatoriaController', [
        'names' => [
            'index'   => 'PreguntaAleatoria.Index',
            'show'    => 'PreguntaAleatoria.Show',
            'edit'    => 'PreguntaAleatoria.Edit',
            'update'  => 'PreguntaAleatoria.Update',
            'store'   => 'PreguntaAleatoria.Store',
            'destroy' => 'PreguntaAleatoria.Destroy',
        ]]);

    Route::resource('tarea', 'TareaController', [
        'names' => [
            'index'   => 'Tarea.Index',
            'show'    => 'Tarea.Show',
            'edit'    => 'Tarea.Edit',
            'update'  => 'Tarea.Update',
            'store'   => 'Tarea.Store',
            'destroy' => 'Tarea.Destroy',
        ]]);

    Route::group(['prefix' => 'tarea-entrega'], function () {
        Route::get('get/{id}', 'TareaEntregaController@getAll')->name('TareaEntrega.GetAll');
        Route::get('{id}/download', 'TareaEntregaController@download')->name('TareaEntrega.Download');
        Route::get('{id}/contenido', 'TareaEntregaController@contenido')->name('TareaEntrega.Contenido');

    });
    Route::resource('tarea-entrega', 'TareaEntregaController', [
        'names' => [
            'index' => 'TareaEntrega.Index',
            'show'  => 'TareaEntrega.Show',
        ]]);

    Route::resource('revision-tarea', 'RevisionTareaController', [
        'names' => [
            'store' => 'RevisionTarea.Store',
            //'show'  => 'TareaEntrega.Show',
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
    Route::resource('multimedia', 'MultimediaController', [
        'names' => [
            //'index'   => 'Tarea.Index',
            //'show'    => 'Tarea.Show',
            //'edit'    => 'Tarea.Edit',
            //'update'  => 'Tarea.Update',
            'store'   => 'Multimedia.Store',
            'destroy' => 'Multimedia.Destroy',
        ]]);
    Route::resource('sub-contenido', 'SubContenidoController', [
        'names' => [
            'index'   => 'SubContenido.Index',
            'store'   => 'SubContenido.Store',
            'destroy' => 'SubContenido.Destroy',
        ]]);
});

Route::resource('aula-virtual', 'AulaVirtualController', [
    'names' => [
        'index' => 'AulaVirtual.Index',
    ]]);
