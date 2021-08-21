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
                <img class="rounded-circle mx-auto d-block img-thumbnail" src="/images/user.png">
            </div>
            <div class="form-group">
                <input class="btn btn-outline-info mt-1" type="file">
            </div>
            <div class="container">
                <div class="form-group">
                    <input type="text" class="form-control col-md-12" readonly value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control col-md-12" readonly value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block">Edit Your Informations</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop

