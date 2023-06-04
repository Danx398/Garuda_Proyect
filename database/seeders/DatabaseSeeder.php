<?php

namespace Database\Seeders;

use Database\Factories\Cat_estatusFactory;
use Database\Factories\personaFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dPersona = [
            'nombre' => 'Roldan',
            'paterno' => 'Aquino',
            'materno' => 'Segura',
            'num_celular' => '5520807656',
            'genero' => 'Masculino',
            'fechaNac' => now()
        ];
        DB::table('t_personas')->insert($dPersona);

        $dUser = [
            'name' => 'Super',
            'email' => 'Super@gmail.com',
            'email_verified_at' => now(),
            'fk_persona' => 1,
            'rol' => 'Sadmin',
            'password' => Hash::make(12345678), // password
            'remember_token' => Str::random(10),
        ];
        DB::table('users')->insert($dUser);

        $dEstatus = [
            [
                'estatus' => 'Proceso',
                'descripcion' => 'El estudiante aun no inicia su tramite'
            ],[
                'estatus' => 'Tramite',
                'descripcion' => 'El estudiante esta tramitando'
            ],[
                'estatus' => 'Liberado',
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
