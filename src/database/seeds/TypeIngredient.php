<?php

use Illuminate\Database\Seeder;

class TypeIngredient extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeIngredient = new App\TypeIngredient();
        $typeIngredient->name = 'Alcoholes';
        $typeIngredient->save();

        $typeIngredient = new App\TypeIngredient();
        $typeIngredient->name = 'Despensa';
        $typeIngredient->save();
    }
}
