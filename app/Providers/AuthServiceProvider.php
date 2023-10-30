<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\SeccionDocenteCurso' => 'App\Policies\SeccionDocenteCursoPolicy',
        'App\Matricula'           => 'App\Policies\MatriculaPolicy',
        'App\CuentaPorCobrar'               => 'App\Policies\CuentaPorCobrarPolicy',
        'App\Alumno'              => 'App\Policies\AlumnoPolicy',
        'App\TareaEntrega'        => 'App\Policies\TareaEntregaPolicy',
        'App\AnioAcademico'       => 'App\Policies\AnioAcademicoPolicy',
        'App\TrimestreFechas'       => 'App\Policies\TrimestreFechasPolicy',
        'App\Evaluacion'       => 'App\Policies\EvaluacionPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
