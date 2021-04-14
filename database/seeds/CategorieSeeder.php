<?php

use App\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create(['nom'=>'farine']);
        Categorie::create(['nom'=>'chocolat']);
        Categorie::create(['nom'=>'électriques']);
    }
}
