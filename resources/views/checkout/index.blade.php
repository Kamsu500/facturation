@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@stop

@section('content')
    <div class="container align center">
        <div class="col-md-12 mt-1">
            <h1 class="text-info">Page de Paiement</h1>
            <div class="row">
                <div class="col-md-6">
                    <form id="payment-form" action="{{ route('checkout.store') }}" method="post">
                    @csrf
                        <div id="card-element" action="">
                        </div>
                        <div id="card-errors" role="alert"></div>
                        <button class="btn btn-success mb-1 mt-2" id="submit">Procéder au payement ${{ getPrice(Cart::Total())}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra-js')
    <script>
        var stripe = Stripe('pk_test_51IVktLB40bs0XFL7lk0fjR4Q94tplRItC4qEu1LJXla2cjlfR4pDwDusDw2gsMlcBzNcAbXPUTmncmZghw2gaey300r4HHMtmv');
        var elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create('card',{style:style});
        card.mount('#card-element');

        card.addEventListener('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });
        var submitButton=document.getElementById('submit');
        submitButton.addEventListener('click', function(ev) {
            ev.preventDefault();
            submitButton.disabled=true;
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card,
                }
            }).then(function(result) {
                if (result.error) {
                    submitButton.disabled=false;
                    console.log(result.error.message);
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        var paymentIntent=result.paymentIntent;
                        var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var form=document.getElementById('payment-form');
                        var url=form.action;
                        var redirect='/merci';

                        fetch(
                            url,
                            {
                                headers: {
                                 "Content-Type": "application/json",
                                 "Accept": "application/json, text-plain, */*",
                                 "X-Requested-With": "XMLHttpRequest",
                                 "X-CSRF-Token":token 
                                },
                                method: 'post',
                                body: JSON.stringify ({
                                
                                    paymentIntent: paymentIntent
        })
                            }
                        ).then((data)=>{
                            console.log(data)  
                            window.location.href=redirect;
                        }).catch((error)=>{
                            console.log(error)
                        })
                    }
                }
            });
        });
    </script>
@stop
