@extends('layouts.app')

@section('title')
   liste des produits
@endsection

@section('content')

    @include('flash::message')
        <div class="row col w-100 mt-3 justify-content-around">
                <h5 class="text-info ml-5">{{ $products->count() }} @choice('product|products', $products->count())</h5>
            <div class="form-group  justify-content-around">
                <a href="{{ route('pdf') }}"><button class="btn btn-outline-danger"><span class="fa fa-file-pdf-o"></span> Export to PDF</button></a>
                <a href="{{ route('products.create') }}"><button class="btn btn-outline-success"><span class="fa fa-plus-circle"></span> New product</button></a>
            </div>
        </div>
        <hr class="mt-0 w-100">
        @if($products->isNotEmpty())
            <div class="container">
                <div class="row justify-content-center">
                    <table class="table-light table-bordered table-responsive-lg table-fixed border-0 col-lg-12 w-100" id="table">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="text-center">
                                <td>{{ $product->id_produit }}</td>
                                <td><img src="{{ (asset('/storage/'.$product->image)) }}" alt="rien" height="30" width="40" /></td>
                                <td>{{ $product->designation }}</td>
                                <td>${{ getPrice($product->price) }}</td>
                                <td>{{ $product->categorie->nom }}</td>
                                <td>{{ $product->created_at}}</td>
                                <td>
                                    <form action="">
                                        <button class="btn btn-danger" title="supprimer"><span class="fa fa-trash-o"></span></button>
                                    </form>
                                    <button class="btn btn-info d-xl-inline-flex mt-1" title="modifier"><span class="fa fa-edit"></span></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row col form-group mb-2 mt-2 justify-content-end">
                        {{ $products->links() }}
                    </div>
                </div>
                @else
                    <div class="text-center text-uppercase alert alert-danger">Aucun produit pour le moment</div>
                @endif
            </div>
@endsection
