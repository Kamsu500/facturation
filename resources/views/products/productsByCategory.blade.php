@extends('layouts.app')

@section('title')
    produits par categorie
@endsection

@section('content')

@include('flash::message')

    @if($products->count()>0)
    <div class="row col-lg-12 mt-4 mx-auto">
    @foreach($products as $product)
        <div class="card mb-3 ml-2 h-auto border-info" style="width: 540px;">
            <div class="row no-gutters">
               <div class="col-md-4 mx-auto d-block">
                <img src="{{ (asset('storage/'.$product->image)) }}" class="card-img-top h-100" alt="pas d\'image" height="150" width="100">
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
    @endforeach
</div>
    @else
        <div class="alert alert-danger mt-3">Aucun produit pour cette categorie pour l'instant</div>
    @endif
@endsection
