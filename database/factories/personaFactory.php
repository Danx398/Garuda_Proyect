<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'Jose Alberto',
            'paterno' => 'Velazquez',
            'materno' => 'Nava',
            'num_celular' => 15120398,
            'genero' => 'Masculino',
            'fechaNac' => now()
        ];
    }
}
