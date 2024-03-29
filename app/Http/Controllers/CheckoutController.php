<?php

namespace App\Http\Controllers;

use App\Order;
use DateTime;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Customer;

use function Opis\Closure\serialize;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0)
        {
            return redirect()->route('cart.index');
        }
        Stripe::setApiKey('sk_test_51HXatuEKF35vMz6PuvNNse4I5JYrAXSZ5iaxRos031doJDu7Yau7PGokCNb4qf3Rvyv8HN65K6Iecs0SFMfLtL5U005MCARqGQ');

        $customer=Customer::create([
            'email'=>auth()->user()->email
        ]);
        $intent =PaymentIntent::create([
            'amount' =>round(Cart::Total()),
            'currency' => 'eur',
            'payment_method_types' => ['card'],
            'customer'=>$customer
        ]);

        dd($intent);

        $clientSecret=Arr::get($intent,'client_secret');

        return view('checkout.index',['clientSecret'=>$clientSecret]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();

        $order=new Order();

        $order->payment_intent_id=$data['paymentIntent']['id'];
        $order->amount=$data['paymentIntent']['amount'];
        $order->payment_created_at=(new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');

        $products=array();

        $i=1;

        foreach(Cart::content() as $product)
        {
            $products['product_' . $i][]=$product->model->designation;
            $products['product_' . $i][]=getPrice($product->model->price);
            $products['product_' . $i][]=$product->qty;
            $i++;
        }

        $order->products=serialize($products);

        $order->user_id=auth()->id();

        $order->invoice=str_random(16);

        $order->save();

        if($data['paymentIntent']['status']==='succeeded')
        {
            Cart::destroy();

            Session::flash('success','votre commande a traitée avec succès');
        }
    }

    public function thank()
        {
           return Session::has('success') ? view('checkout.thank') : redirect()->route('products.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
