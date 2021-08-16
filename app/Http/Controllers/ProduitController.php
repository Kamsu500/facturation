<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
       /* $products=DB::table('produits as p')
                    ->join('categories as c','p.id_categorie','=','c.id_categorie','inner')
                    ->select('p.*','c.nom as nom')
                    ->orderBy('id_produit','asc')
                    ->simplePaginate(3);

        return view('products.index',compact('products'));*/
        $products=Produit::simplePaginate(3);

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return\Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $produit=new Produit();

        $produit->designation=$request->input('designation');
        $produit->price=$request->input('price');
        $produit->id_categorie=$request->input('id_categorie');

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/',$filename);
            $produit->image=$filename;
        }
        $produit->save();

        flash('produit cree avec succes')->success()->important();

        return redirect::to('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Produit::findOrFail($id);

        return view('products.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // affichage des differents produits dans les card

    public function getCard()
    {
        $products=Produit::select('produits.*','c.nom')
                           ->join('categories as c','c.id_categorie','=','produits.id_categorie')
                           ->paginate(20);
        return view('products.card',compact('products'));
    }
    // recherche des produits

    public function search()
    {
        $query=request()->input('query');
        $products=Produit::where('designation','LIKE',"%$query%")->get();
        return view('products.search',compact('products'));
    }
    // recherche des produits en fonction des differentes categories

    public function getProductsByCategory()
    {
        $products=DB::table('produits as p')
                    ->join('categories as c','p.id_categorie','=','c.id_categorie','inner')
                    ->select('p.*','c.nom as nom')
                    ->where('c.nom','=',request()->nom)
                    ->get();

        flash('nous avons '. $products->count().' produits'.' pour la categorie '. request()->nom)->success()->important();
          
        return view('products.productsByCategory',compact('products'));
    }
}
