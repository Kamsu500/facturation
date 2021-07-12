@extends('layouts.app')

@section('title')
   home
@endsection

@section('content')
    @auth
    <div class="container-fluid">
    <div class="row  text-uppercase  mt-3 font-weight-bold h2">
        <div class="col w-100 text-center" id="fr">
            bienvenue sur notre application de gestion de produits !! Vous pouvez passer vos commandes sur notre plateforme
        </div>
    </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner text-uppercase">
                <div class="carousel-item active">
                    <img src="{{URL::asset('/images/jus.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos jus rafraichissants</h5>
                        <p></p>
                    </div>
                </div>
                <!--<div class="carousel-item">
                    <img src="{{URL::asset('/images/image24.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos jus de fruits</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/bis.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos biscuits</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/dolait.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos laits naturels</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/pains.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos pains</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/crioissant.png')}}" class="d-block w-100" alt="..." height="735">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Nos croissants chocolats</h5>
                        <p></p>
                    </div>
                </div>-->
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @endauth
@endsection
