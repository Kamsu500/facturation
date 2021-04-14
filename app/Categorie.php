<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
   protected $fillable=['nom'];

   protected $table='categories';

   protected $primaryKey='id_categorie';


   public function produits()
   {
       return $this->hasMany(Produit::class,'id_categorie');
   }
}
