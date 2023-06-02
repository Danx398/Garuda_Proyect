<?php

namespace Database\Seeders;

use Database\Factories\Cat_estatusFactory;
use Database\Factories\personaFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        personaFactory::factoryForModel('Persona')->create();
        UserFactory::factoryForModel('User')->create();
        // Cat_estatusFactory::factoryForModel('Cat_estatus')->create();

        $dEstatus = [
            [
                'estatus' => 'proceso',
                'descripcion' => 'El estudiante aun no inicia su tramite'
            ],[
                'estatus' => 'tramite',
                'descripcion' => 'El estudiante esta tramitando'
            ],[
                'estatus' => 'liberado',
                'descripcion' => 'El estudiante ya libero sus tramites'
            ]
        ];
        DB::table('t_cat_estatus')->insert($dEstatus);

        $dCreditos = [
            [
                'credito' => 'Civico',
                'descripcion' => 'Desfiles, Banda de guerra, Escolta',
                'horas_liberar' => 5,
                'valor_credito' => 1,
            ],[
                'credito' => 'Deportivo',
                'descripcion' => 'Futbol, Basquetbol',
                'horas_liberar' => 5,
                'valor_credito' => 1,
            ],[
                'credito' => 'Cultural',
                'descripcion' => 'Arte, Musica',
                'horas_liberar' => 5,
                'valor_credito' => 1,
            ],[
                'credito' => 'Académicas',
                'descripcion' => 'Enseñanza',
                'horas_liberar' => 10,
                'valor_credito' => 2,
            ]
        ];
        DB::table('t_cat_creditos')->insert($dCreditos);

        $dEscuelaProcedencia = [
            [
                'escuela' => 'COLBAHC14',
                'descripcion' => 'Colegio de Bachilleres 14' 
            ],[
                'escuela' => 'CONALEPMILPA',
                'descripcion' => 'Conalep de Milpa Alta' 
            ],[
                'escuela' => 'IPN15',
                'descripcion' => 'Diodoro Antunez Echegaray' 
            ]
        ];
        DB::table('t_cat_escuela_procedencias')->insert($dEscuelaProcedencia);
    }
}
