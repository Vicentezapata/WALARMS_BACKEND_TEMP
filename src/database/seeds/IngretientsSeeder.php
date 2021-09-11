<?php
use Illuminate\Database\Seeder;

class IngretientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ingredient = new App\Ingredient();
        $ingredient->name = 'Limon';
        $ingredient->id_type_ingredients = 3;
        $ingredient->save();
        

        $ingredient = new App\Ingredient();
        $ingredient->name = 'Azucar';
        $ingredient->id_type_ingredients = 5;
        $ingredient->save();
        

        $ingredient = new App\Ingredient();
        $ingredient->name = 'Ron';
        $ingredient->id_type_ingredients = 4;
        $ingredient->save();

        
    }
}
