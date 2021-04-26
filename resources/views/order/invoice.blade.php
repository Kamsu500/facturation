<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body{
            background-color: white; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 15px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
			font-size: 15px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
		@foreach($order as $ord)
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="heading">Invoice No : {{$ord->invoice}}</p>
                    <p class="sub-heading">Order Date :  {{$ord->payment_created_at}} </p>
                    <p class="sub-heading">Email Address : {{ auth()->user()->email}} </p>
                </div>
                <div class="col-6 float-right ">
                    <p class="sub-heading ml-5">Full Name : {{auth()->user()->name}} </p>
                    <p class="sub-heading ml-5">Phone Number :  </p>
                </div>
            </div>
        </div>
		@endforeach
        <div class="body-section">
            <h3 class="heading">Liste des produits de la commande</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Designation</th>
                        <th class="w-20">Price</th>
                        <th class="w-40" colspan="2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($order as $ord)
                            @foreach(unserialize($ord->products) as $ords)
								<tr>
									<td>{{$ords[0]}}</td>
									<td>${{$ords[1]}}</td>
									<td colspan="2">{{$ords[2]}}</td>
								</tr>
                            @endforeach
                        @endforeach
                    <tr>
                        <td colspan="4" class="text-center">Montant total : ${{getPrice($ord->amount)}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Facture. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right"></a>
            </p>
        </div>      
    </div>      
</body>
</html>