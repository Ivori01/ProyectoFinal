<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Director']);
        $role = Role::create(['name' => 'Docente']);
        $role = Role::create(['name' => 'Alumno']);
        $role = Role::create(['name' => 'Apoderado']);
        $role = Role::create(['name' => 'Secretaria']);
    }
}
