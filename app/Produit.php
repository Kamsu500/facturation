<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $guarded=[];

    protected $table='produits';

    protected $primaryKey='id_produit';

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->latest();
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'id_categorie');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
