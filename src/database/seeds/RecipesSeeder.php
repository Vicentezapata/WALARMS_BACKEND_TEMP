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
        $recipe->description ='Si tienes una coctelera en casa, util�zala. Si est�s en una fiesta y sois much�simos a beber, he visto c�mo se preparaba el mojito en una cacerola de gran tama�o y el resultado fue igualmente estupendo.
        Sea cual sea el recipiente escogido, a�ade el zumo de la lima o el lim�n, el ron, el az�car, el hielo picado (que puedes picar t� mismo en casa de manera muy original si sabes darle vida a tu creatividad y  no tienes picadora de hielo) junto con la hierbabuena.        
        Agita o remueve, depende de en donde lo est�s preparando, hasta que el az�car se haya disuelto completamente. A�ade agua con gas o sif�n para que sea un aut�ntico mojito cubano, agitas y listo. Este �ltimo ingrediente aporta m�s frescor a la bebida, por lo que no lo dej�is a un lado.
        Se sirve en vasos peque�os o en copas bajas, decorado con hojas de hierbabuena fresca. Para la preparaci�n del mojito tambi�n se pueden usar hojas secas, pero lo mejor es la planta viva para lograr un mejor sabor.';
        $recipe->measure = 'Onza';
        $recipe->save();
    }
}
