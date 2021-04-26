<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Stripe\Invoice;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::group(['middleware'=>'verified'], function ()
{
    Route::get('/', function ()
    {
    return view('welcome');
    });
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/admin/home', function()
    {
    return view::make('/admin/home');

    })->name('admin');

    Route::get('/cards',array('as'=>'card','uses'=>'ProduitController@getCard'));
    Route::resource('products','ProduitController',['parameters'=>['products'=>'p']]);
    Route::resource('cart', 'CartController')->only(['index','store','update','destroy','edit']);
    Route::get('/search','ProduitController@search')->name('search');
    Route::get('/contact','ContactController@create')->name('contact');
    Route::post('/contact','ContactController@store')->name('mail');
    Route::get('/dynamic_pdf','DynamicPDFController@index');
    Route::get('/dynamic_pdf/pdf','DynamicPDFController@getPdf')->name('pdf');
    Route::name('add')->post('/comments/{products}', 'CommentController@store');
    Route::get('/ProductsByCategory','ProduitController@getProductsByCategory')->name('category');
    Route::resource('checkout','CheckoutController');
    Route::get('/merci',function()
    {
        return view('checkout.thank');
    });
    Route::resource('order','OrderController');
    Route::get('/generate_invoice/{id}','OrderController@invoice')->name('invoice');
});





