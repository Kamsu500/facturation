
@extends('layouts.app')

@section('title')
    contact
@endsection

@section('content')
    @include('flash::message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h3 class="text-info text-center text-capitalize h3 mt-1">contactez nous</h3>
                <form action="{{ route('mail') }}" method="post" class="mt-3 mb-3">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" placeholder="entrez votre nom" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="entrez votre email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="textarea" cols="30" rows="10" placeholder="entrez votre message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Envoyer votre message</button>
                </form>
            </div>
        </div>
    </div>
@endsection



