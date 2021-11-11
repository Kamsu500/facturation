@extends('layouts.app')

@section('title')
    card modify
@endsection

@section('content')

    @foreach(Cart::content()->where('id',$products->id_produit) as $products)
            <div class="container">
                <div class="row col mt-3 no-gutters rounded align-items-center mb-3 justify-content-around">
                    <div class="col-md-4 form-group mx-auto d-block">
                        <span class="badge badge-pill badge-danger">{{ $products->model->id_produit }}</span>
                        <img src="{{ (asset('storage/'.$products->model->image)) }}" alt="pas d\'image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4>{{ $products->model->designation }}</h4>
                        <p><strong>{{ number_format($products->price, 2, ',', ' ') }} FCFA</strong></p>
                        <form  method="POST" action="{{ route('cart.update',$products->rowId) }}" id="ad">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="qty">Quantité</label>
                                <input id="qty" name="qty" type="number" value="{{ $products->qty }}" min="1" class="form-control col-md-5"><br>
                                <button class="btn btn-primary col-md-5" type="submit" id="addcart"><span class="fa fa-plus-circle"></span>
                                    Ajouter au panier
                                </button>
                            </div>
                        </form>
                    </div>
               </div>
           </div>
    @endforeach
@endsection


