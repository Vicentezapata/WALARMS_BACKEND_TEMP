<?php
use App\IngredientsRecipe;
use Illuminate\Database\Seeder;

class IngredientRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredientRecipe = new IngredientsRecipe();
        $ingredientRecipe->id_ingredients = 2;
        $ingredientRecipe->id_recipes = 1;
        $ingredientRecipe->save();

        $ingredientRecipe = new IngredientsRecipe();
        $ingredientRecipe->id_ingredients = 3;
        $ingredientRecipe->id_recipes = 1;
        $ingredientRecipe->save();

        $ingredientRecipe = new IngredientsRecipe();
        $ingredientRecipe->id_ingredients = 4;
        $ingredientRecipe->id_recipes = 1;
        $ingredientRecipe->save();
    }
}
