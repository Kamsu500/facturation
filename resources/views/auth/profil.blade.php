@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
</head>
<body>
    <div class="container">
        <div class="row col-lg-12 justify-content-around mt-3 mx-auto">
            <div class="container">
                <img class="rounded-circle img-thumbnail mx-auto d-block" src="/img/circle.png" style="width: 200px; height:200px;">
            </div>
            <div class="form-group">
                <input class="btn btn-outline-info mt-1" type="file">
            </div>
            <div class="container">
                <h3 class="text-black-50">My name</h3>
                <div class="form-group">
                    <input type="text" class="form-control col-md-12" readonly value="{{ auth()->user()->name }}" name="name">
                </div>
                <h3 class="text-black-50">My email</h3>
                <div class="form-group">
                    <input type="text" class="form-control col-md-12" readonly value="{{ auth()->user()->email }}" >
                </div>
                <h3 class="text-black-50">New password</h3>
                <div class="form-group">
                    <input type="password" class="form-control col-md-12" required minlength="8" name="password">
                </div>
                <div class="form-group">
                    <a href="{{ route('updateProfil',auth()->id())}}" class="btn btn-info btn-block">Edit your informations</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop

