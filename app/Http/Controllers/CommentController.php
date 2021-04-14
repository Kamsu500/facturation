<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Produit;

class CommentController extends Controller
{
     public function store(Produit $products)
     {
         request()->validate([
             'body'=>'required|min:5'
         ]);
         $comment=new Comment();
         $comment->body=request('body');
         $comment->user_id=auth()->id();
         $products->comments()->save($comment);

         return redirect()->route('products.show',$products);
     }
}
