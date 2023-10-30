<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
Route::get('reset', function () {
    $user           = User::findOrFail(1);
    $persona        = $user->persona;
    $user->password = '12345';
    $user->estado=1;
    $user->save();

    return response()->json(['message' => 'Registro actualizado correctamente', 'success' => true]);
});



Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('key:generate');
    $exitCode = Artisan::call('storage:link');

    return '<br><h1 style="color:#62dd43;text-align:center"aling="center">Configuracion Actualizada Correctamente</h1>';
});

Route::get('init-site', 'InitController@initData');

// Route::get('/', function () {
//     return view('index');
// })->name('siteIndex');

Route::get('/', function () {
    return redirect()->route('login');
})->name('Site.Index');
Route::get('nosotros', function () {
    return view('site.about');
})->name('Site.About');

Route::get('servicios', function () {
    return view('site.service');
})->name('Site.Service');
Route::get('detalle-servicio', function () {
    return view('site.service-detail');
})->name('Site.Service.Detail');
Route::get('blog', function () {
    return view('site.blog');
})->name('Site.Blog');
Route::get('detalles-blog', function () {
    return view('site.blog-detail');
})->name('Site.Blog.Detail');
Route::get('contacto', function () {
    return view('site.contact');
})->name('Site.Contact');

Route::get('/layout', function () {
    return view('layouts.ace');
});

Route::get('/welcome', function () {
    return redirect()->route('home');
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('my-profile', 'UserController@myProfile')->name('MyProfile');
    Route::get('my-settings', 'UserController@mySettings')->name('MySettings');
    Route::post('my-settings', 'UserController@updateInfo')->name('UpdateMyInfo');
    Route::post('update-password', 'UserController@update')->name('UpdateMyPassword');


    Route::get('pdf-alumnos/{id}','Director\SeccionController@alumnosPDF')->name('alumnosPdf');
    Route::get('pdf-padres/{id}','Director\SeccionController@padresPDF')->name('padresPdf');
    Route::get('pdf-docentes/','Director\DocenteController@docentesPDF')->name('docentesPdf');
    Route::get('pdf-deudores/','Director\CuentaPorCobrarController@deudoresPDF')->name('deudodoresPdf');

    Route::group(['prefix' => 'director', 'middleware' => ['role:Director'], 'namespace' => 'Director', 'as' => 'Director.'], function () {

        require (__DIR__ . '/routes/director.php');

    });

    Route::group(['prefix' => 'secretaria', 'middleware' => ['role:Secretaria'], 'namespace' => 'Secretaria', 'as' => 'Secretaria.'], function () {

        require (__DIR__ . '/routes/secretaria.php');

    });

    Route::group(['middleware' => ['role:Docente'], 'prefix' => 'docente', 'namespace' => 'Docente', 'as' => 'Docente.'], function () {
        require (__DIR__ . '/routes/docente.php');

    });
    Route::group(['middleware' => ['role:Alumno'], 'prefix' => 'alumno', 'namespace' => 'Alumno', 'as' => 'Alumno.'], function () {

        require (__DIR__ . '/routes/alumno.php');

    });



});

Auth::routes();
