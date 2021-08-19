<?php

namespace App\Http\Controllers;

use App\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param\Illuminate\Http\Request
     * @return\Illuminate\Http\Response
     * @param Request $request
     * @return\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {/* $duplicata=Cart::search(function ($cartItem)use($request)
        {
            return $cartItem->id_produit === $request->id_prod;
        });

        if($duplicata->isNotEmpty())
        {
            return redirect::route('cart.index')->with('success','le produit a déjà été ajouté');
        }*/

       $products=Produit::find($request->id_produit);

       Cart::add($products->id_produit,$products->designation,$request->qty,$products->price)
        ->associate('App\Produit');

       return redirect::route('cart.index')->with('success','le produit a été bien ajouté');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Produit::findOrFail($id);

        return view('cart.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return\Illuminate\Http\RedirectResponse
     * @return\Illuminate\Http\RedirectResponse
     * @return\Illuminate\Http\Response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $cart = Cart::content()->where('rowId',$id);

        $qty=$request->qty;

        if($cart->isNotEmpty())
        {
            Cart::update($id,$qty);
        }

        flash('la quantité de ce produit est passée à  '.$qty.' ')->success()->important();

        return redirect::route('cart.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return\Illuminate\Http\RedirectResponse
     * @return\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::content()->where('rowId',$id);

        if($cart->isNotEmpty())
        {
            Cart::remove($id);
        }

        flash('produit supprime avec success')->success()->important();

        return redirect::route('cart.index');
    }
}
