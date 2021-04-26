<?php

namespace App\Http\Controllers;

use App\Order;
use DateTime;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

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
            return redirect()->route('products.index');
        }
        Stripe::setApiKey('sk_test_51IVktLB40bs0XFL7uMXWJy495eS62uaClnYywu2ITPzvPaQ74f3GaA7Pw64fdR2h7zMMjidfvRV6xcOrOc6stztq00S2DYECFz');

        $intent =PaymentIntent::create([
            'amount' =>round(Cart::Total()),
            'currency' => 'EUR',
        ]);
        
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
     * @param  \Illuminate\Http\Request  $request
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
            
            return view('order.index');
        }
        else
        {
            return view('cart.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return\Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
