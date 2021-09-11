<?php
use App\Recipe;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe = new Recipe();
        $recipe->id_cocktail = 1;
        $recipe->description ='Si tienes una coctelera en casa, utilízala. Si estás en una fiesta y sois muchísimos a beber, he visto cómo se preparaba el mojito en una cacerola de gran tamaño y el resultado fue igualmente estupendo.
        Sea cual sea el recipiente escogido, añade el zumo de la lima o el limón, el ron, el azúcar, el hielo picado (que puedes picar tú mismo en casa de manera muy original si sabes darle vida a tu creatividad y  no tienes picadora de hielo) junto con la hierbabuena.        
        Agita o remueve, depende de en donde lo estés preparando, hasta que el azúcar se haya disuelto completamente. Añade agua con gas o sifón para que sea un auténtico mojito cubano, agitas y listo. Este último ingrediente aporta más frescor a la bebida, por lo que no lo dejéis a un lado.
        Se sirve en vasos pequeños o en copas bajas, decorado con hojas de hierbabuena fresca. Para la preparación del mojito también se pueden usar hojas secas, pero lo mejor es la planta viva para lograr un mejor sabor.';
        $recipe->measure = 'Onza';
        $recipe->save();
    }
}
