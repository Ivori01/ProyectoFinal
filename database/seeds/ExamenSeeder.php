<?php

use Illuminate\Database\Seeder;
use App\SubContenido;
use App\Evaluacion;
use App\Models\LMS\Quiz\Pregunta;
use Carbon\Carbon;
use App\Models\LMS\Quiz\PreguntaFija;
use App\Opcion;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $subcontenidos=SubContenido::all();
        foreach ($subcontenidos as $sub) {
            $evaluacion=Evaluacion::create([
             'nombre'=>$faker->sentence(),
             'indicaciones'=>'Is there a way I can get a random date between two dates in Carbon? For example, I am trying to get a random date between now and 55 mins ago.',
             'fecha_inicio'=>Carbon::now(),
             'fecha_fin'=>Carbon::now()->addMonths(2),
             'duracion'=>45,
             'intentos'=>3,
             'subcontenido_id'=>$sub->id,
             'calificacion_max'=>20,
             'modo_calificacion'=>1,
             'aleatorio'=>1,
             'n_preguntas'=>1,
             'correccion'=>1
            ]);

            for ($i=1; $i < 6; $i++) {
              
                $pregunta = PreguntaFija::create([
                    'nombre'=>$faker->sentence(),
                    'descripcion'=>'<span style="color: rgb(43, 46, 56); font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">As you can see, the&nbsp;</span><code style="border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; overflow-wrap: normal; background: rgb(251, 251, 253); color: rgb(202, 71, 63); hyphens: none; tab-size: 4; white-space: pre; word-break: normal; line-height: 1.9; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle;">Collection</code><span style="color: rgb(43, 46, 56); font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">&nbsp;class allows you to chain its methods to perform fluent mapping and reducing of the underlying array. In general, collections are immutable, meaning every&nbsp;</span><code style="border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; overflow-wrap: normal; background: rgb(251, 251, 253); color: rgb(202, 71, 63); hyphens: none; tab-size: 4; white-space: pre; word-break: normal; line-height: 1.9; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle;">Collection</code><span style="color: rgb(43, 46, 56); font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">&nbsp;method returns an entirely new&nbsp;</span><code style="border: 0px solid rgb(231, 232, 242); --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-family: source-code-pro, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 0.8rem; overflow-wrap: normal; background: rgb(251, 251, 253); color: rgb(202, 71, 63); hyphens: none; tab-size: 4; white-space: pre; word-break: normal; line-height: 1.9; padding: 0px 0.125rem; box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px; user-select: auto; display: inline-flex; max-width: 100%; overflow-x: auto; vertical-align: middle;">Collection</code><span style="color: rgb(43, 46, 56); font-family: scandia-web, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">&nbsp;instance.</span>    ',
                    'retroalimentacion'=>'Is there a way I can get a random date between two dates in Carbon? For example, I am trying to get a random date between now and 55 mins ago.',
                    'puntos'=>1,
                    'tipo'=>1
                ]);

                $pregunta->pregunta()->create(['evaluacion_id' => $evaluacion->id]);
                $ans=rand(0, 4);
                for ($j=0; $j < 5; $j++) {
                    $is_ans=($ans==$j)?1:0;
                   
                    $opcion=Opcion::create([
                     'pregunta_id'=>$pregunta->id,
                     'respuesta'=>$is_ans,
                     'detalle'=>$faker->sentence()

                   ]);
                }
            }
        }
    }
}
