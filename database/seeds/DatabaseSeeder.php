<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(InfoSeeder::class); 
       
        // $this->call(AlumnoSeeder::class);
        // $this->call(DocenteSeeder::class);
        // $this->call(SecretariaSeeder::class);
        // $this->call(NivelSeeder::class);
        //$this->call(DocenteNivelSeeder::class);
        //$this->call(CursoSeeder::class);
        //$this->call(CriterioEvaluacionSeeder::class);
        //$this->call(GradoSeeder::class);
        //$this->call(PeriodoAcademicoSeeder::class);
        //$this->call(PlanAcademicoSeeder::class);
        //$this->call(PlanGradoSeeder::class);
        //$this->call(PlanGradoCursoSeeder::class);
        //$this->call(PlanGradoTrimestreSeeder::class);
        //$this->call(PlanGradoCursoCriterioSeeder::class);
        //$this->call(AnioAcademicoSeeder::class);
        //$this->call(AnioAcademicoNivelSeeder::class);
        //$this->call(AnioAcademicoGradoFechasSeeder::class);
        //$this->call(SeccionSeeder::class);
        //$this->call(SeccionDocenteCursoSeeder::class);
       // $this->call(MatriculaSeeder::class);
        //$this->call(ConceptoPagoSeeder::class);
        //$this->call(DescuentoSeeder::class);
       // $this->call(CuentaPorCobrarSeeder::class);
       // $this->call(CuentaPorCobrarDescuentoSeeder::class);
       // $this->call(CobroSeeder::class);
        // $this->call(ContenidoSeeder::class);
        // $this->call(TextoSeeder::class);
        // $this->call(TareaSeeder::class);
        // $this->call(MultimediaSeeder::class);
        $this->call(TipoPreguntaSeeder::class);//
        // $this->call(ExamenSeeder::class);
      

    }
}
