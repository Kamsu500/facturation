@extends('layouts.app')

@section('title')
   liste des commandes
@endsection

@section('content')

        <div class="container text-uppercase mt-1 font-weight-bold text-center">Nombre total de commandes: {{ $order->count()}}</div>

        @if($order->count()>0)

          @foreach($order as $order)
            <div class="container">
              <div class="row justify-content-center mt-1 mb-3 w-100">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header bg-info text-white">commande passee le {{ $order->payment_created_at }} par  {{ auth()->user()->name }} avec pour montant ${{getPrice($order->amount)}}</div>
                              <div class="card-body">
                              <div class="font-weight-bold d-inline-flex">Nombre de produits de la commande : <h5 class="text-danger font-weight-bold">{{ count(unserialize($order->products)) }}</h5></div><br>
                              <div class="font-weight-bold d-inline-flex">  {{ __('Liste des produits de la commande dans cet ordre') }}</div><br>

                                <div class="font-weight-bold d-inline-flex">{{ __('Designation') }} ; {{ __('prix') }} ; {{ __('quantite') }}</div><br>

                              @foreach(unserialize($order->products) as $order)

                                  @foreach($order as $orders=>$valeur)

                                  <div class="font-weight-bold d-inline-flex">{{ $valeur }} ;</div>

                                  @endforeach

                              @endforeach
                              </div>
                          </div>
                            <button class="btn btn-outline-success col-lg-12 mt-2">generer la facture de cette commande</button>
                      </div>
                  </div>
              </div>
            </div>
          @endforeach
        @else
                <div class="text-center text-uppercase alert alert-danger mt-3">Vous n'avez passe aucune commande pour l'instant monsieur {{ auth()->user()->name }}</div>
    @endif
@endsection
