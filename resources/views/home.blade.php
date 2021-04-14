@extends('layouts.app')

@section('title')
   home
@endsection

@section('content')
    @auth
    <div class="row w-100 text-uppercase  mt-3 font-weight-bold h1">
        <div class="col text-center" id="fr">
            bienvenue sur notre application de gestion de produits
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3" class="active"></li>
        </ol>
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{URL::asset('/images/ExpressUnion-Homepage-slide-4.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/bandeau-contact-1920x605.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/Plateau-de-Valensole-croped-1920x605.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('/images/MLB-Architectural-Beach-Coastline-Beach-Chairs-1920x605-f78f8a1.jpeg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
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
