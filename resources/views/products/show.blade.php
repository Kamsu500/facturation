@extends('layouts.app')

@section('title')
    produits details
@endsection

@section('content')
        <div class="container">
          <div class="border border-info mt-2 rounded ">
            <div class="row col mt-3 no-gutters rounded align-items-center justify-content-around">
                <div class="col-md-5 form-group justify-content-lg-start">
                    <img src="{{ (asset('storage/images/'.$products->image)) }}" alt="pas d\'image" class="h-50 w-50 mx-auto d-block">
                </div>
                <div class="col-md-5">
                    <h4>Désignation :  {{ $products->designation }}</h4>
                    <p><strong>Prix :  ${{ getPrice($products->price) }}</strong></p>
                    <form  method="POST" action="{{ route('cart.store',['id_produit'=>$products->id_produit]) }}" id="add">
                        @csrf
                        <div class="form-group">
                            <label for="qty">Quantité</label>
                            <input id="qty" name="qty" type="number" value="1" min="1" class="form-control" required><br>
                            <button class="btn btn-outline-primary btn-block" type="submit" id="addcart"><span class="fa fa-plus-circle"></span>
                                Ajouter au panier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
            <form action="{{ route('add',$products) }} " method="post">
                @csrf
                <label for="body">vous pouvez laisser un commentaire</label>
                <div class="form-group">
                    <input type="hidden" name="id_prod">
                    <textarea name="body" id="textarea" placeholder="laissez votre commentaire" class="form-control  @error('body') is-invalid @enderror" style="height:200px">{{ old('body') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-warning btn-block">soumettre votre commentaire</button>
            </form>
            <br>
            @forelse($products->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $comment->body }}
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {{ Carbon\Carbon::parse($comment->created_at)->format('d/m/Y à H:i') }}</small>
                            <div class="badge badge-primary">par {{ $comment->user->name }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Aucun commentaire pour ce produit</div>
            @endforelse
        </div>
@endsection

