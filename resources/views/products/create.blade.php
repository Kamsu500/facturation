@extends('layouts.app')

@section('title')
    add product
@stop

@section('content')
    <div class="container mt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('Ajouter un produit') }}</div>

                    <div class="card-body">
                        <form action="{{ route ('products.store') }}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="designation">désignation</label>
                                <input type="text" name="designation" placeholder="entrez une designation" class="form-control" id="designation">
                                {!!$errors->first('designation','<p class="error">:message</p>')!!}
                            </div>
                            <div class="form-group">
                                <label for="price">prix</label>
                                <input type="number" name="price" placeholder="entrez un prix" class="form-control" id="price">
                                {!!$errors->first('price','<p class="error">:message</p>')!!}
                            </div>
                            <div class="form-group">
                                <label for="categorie">catégorie</label>
                                <select name="id_categorie" id="categorie" class="form-control">
                                    <option value=""></option>
                                    @foreach(App\Categorie::all()->sortBy('nom') as $cat)
                                        <option value="{{ $cat->id_categorie }}">{{ $cat->nom }}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first('id_categorie','<p class="error">:message</p>')!!}
                            </div>
                            <div class="form-group">
                                <label for="image">image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                {!!$errors->first('image','<p class="error">:message</p>')!!}
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success btn-block">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
