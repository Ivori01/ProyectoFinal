<?php

use Illuminate\Database\Seeder;
use App\Curso;
use App\Nivel;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles=Nivel::all();
        foreach ($niveles as $nivel) {
            $curso = new Curso();
            $curso->nombre = 'Personal Social';
            $curso->descripcion = 'Para la realización plena de las personas en una sociedad cambiante como la actual son
            primordiales tanto el desarrollo personal como la ciudadanía activa';
            $curso->imagen = '1.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Educación Física';
            $curso->descripcion = 'La evolución de la Educación Física está determinada actualmente por los avances sociales,
            científicos y tecnológicos en el mundo';
            $curso->imagen = '2.jpeg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Comunicación';
            $curso->descripcion = 'El área de Comunicación tiene por finalidad que los estudiantes desarrollen competencias
            comunicativas para interactuar con otras personas, comprender y construir la realidad';
            $curso->imagen = '3.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
    
            $curso = new Curso();
            $curso->nombre = 'Arte y cultura';
            $curso->descripcion = 'Desde los inicios de la humanidad y a lo largo de la historia, los hombres y las mujeres
            han representado simbólicamente su realidad mediante la palabra';
            $curso->imagen = '4.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Castellano como segunda lengua';
            $curso->descripcion = 'Nuestro país tiene una gran diversidad lingüística y cultural, por ello, en las aulas se cuenta
            con estudiantes que,  hablan una lengua originaria ';
            $curso->imagen = '5.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Inglés';
            $curso->descripcion = 'El idioma inglés es uno de los más hablados en el mundo y ha logrado convertirse en una
            lengua internacional utilizada en diversos ámbitos';
            $curso->imagen = '6.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Matemática';
            $curso->descripcion = 'La matemática es una actividad humana y ocupa un lugar relevante en el desarrollo del
            conocimiento y de la cultura de las sociedades';
            $curso->imagen = '7.jpeg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
    
            $curso = new Curso();
            $curso->nombre = 'Ciencia Y Tecnología';
            $curso->descripcion = 'La ciencia y la tecnología están presentes en diversos contextos de la actividad humana y
            ocupan un lugar importante en el desarrollo del conocimiento';
            $curso->imagen = '8.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
    
            $curso = new Curso();
            $curso->nombre = 'Educación Religiosa ';
            $curso->descripcion = 'El ser humano posee, gracias a su condición espiritual, la
            capacidad de captar el fundamento de todas las cosas procedentes de un Creador universal';
            $curso->imagen = '9.jpg';
            $curso->estado='Activo';
            $curso->nivel=$nivel->id;
            $curso->save();
        }
    }
}
