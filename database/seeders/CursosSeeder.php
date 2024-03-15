<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cursos')->insert([
            'cur_titulo' => 'Reposteria',
            'cur_descripcion' => 'Descripción del Curso 1',
            'cur_grupo' => 'Grupo del Curso 1',
            'cur_estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Panaderia',
            'cur_descripcion' => 'Descripción del Curso 1',
            'cur_grupo' => 'Grupo del Curso 2',
            'cur_estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        
        
    }
}
