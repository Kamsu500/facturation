@extends('layouts.app')

@section('title')
  mon panier
@endsection

@section('content')
    @include('flash::message')
    @if(Cart::count()>0)
        <div class="px-4 px-lg-0 mt-5">
            <div class="pb-5">
                <div class="container">
                    <a href="{{ route('home') }}" class="col-md-3 mb-2 text-decoration-none text-danger">Continuer vos achats</a>
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table text-center table-white">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Id</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Designation</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Actions</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $products)
                                        <tr>
                                            <td class="border-0 align-middle"><strong>{{ $products->model->id_produit }}</strong></td>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="{{ asset('storage/'.$products->model->image) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>{{ $products->model->designation }}</strong></td>
                                            <td class="border-0 align-middle"><strong>${{ getPrice($products->price) }}</strong></td>
                                            <td class="border-0 align-middle"><strong>{{ $products->qty }}</strong></td>
                                            <td class="border-0 align-middle">
                                            <div class="row col d-inline-block">
                                            <form action="{{ route('cart.destroy',$products->rowId) }}" method="post" onsubmit="return confirm('êtes vous-sûr de vouloir supprimer ce produit?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="submit" value="supprimer" class="btn btn-outline-danger btn-xs d-inline-flex ">
                                                </form>
                                                    <a href="{{ route('cart.edit',$products->model->id_produit) }}" class="btn btn-outline-info btn-xs d-inline-flex mt-1" title="modifier la quantité">modifier</a>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>${{ getPrice(Cart::subTotal()) }}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>${{ getPrice(Cart::Tax()) }}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">${{ getPrice(Cart::Total()) }}</h5>
                                    </li>
                                </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block"><span class="fa fa-calculator"></span> Passer à la caisse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
      <div class="alert alert-info mt-5 text-center text-uppercase h1">your cart is now empty</div>
    @endif
@endsection

