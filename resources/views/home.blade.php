@extends('layouts.app')

@section('title')
     home
@endsection

@section('content')
   <div class="container-fluid">
    <div class="row  text-uppercase  mt-3 font-weight-bold h5">
        <div class="col w-100 text-center text-black-50" id="fr">
            bienvenue sur notre application de gestion de produits !! Vous pouvez passer vos commandes sur notre plateforme
        </div>
    </div>
    </div>
    @if(!$products->isEmpty())
    <div class="row col mt-2 mb-0 justify-content-end">
        {{ $products->links() }}
    </div>
<div class="row col-lg-12 mx-auto justify-content-around" id="ht">
    @foreach($products as $product)
    <div class="col-lg-4  mt-2">
        <div class="card h-100 border-info shadow bg-white rounded">
            <div class="row no-gutters">
               <div class="col-lg-4">
                <img src="{{ (asset('/storage/images/'.$product->image)) }}" class="card-img-top h-100 w-100" alt="pas d\'image">
               </div>
                <div class="col-md-8">
                    <div class="card-body w-100">
                        <h5 class="card-title text-uppercase text-muted text-center" id="fr">{{ $product->designation }}</h5>
                        <div class="row justify-content-center">
                            <table>
                                <tr>
                                    <td class="text-uppercase">désignation</td>
                                    <td><strong class="h6 font-weight-bold text-info text-capitalize ml-5">{{ $product->designation }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">prix</td>
                                    <td class="text-black float-right font-weight-bold">${{ getPrice($product->price)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">catégorie</td>
                                    <td class="text-black float-right font-weight-bold">{{ $product->nom }}</td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('products.show',$product->id_produit)}}" class="btn btn-outline-info justify-content-center mt-2 w-100">Voir les détails</a>
                    </div>
                </div>
           </div>
        </div>
    </div>
    @endforeach
</div>
     @else
        <div class="text-center text-uppercase alert alert-danger mt-3">Aucun produit pour le moment</div>
    @endif
@endsection
