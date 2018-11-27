<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function getAddToCart(Request $request, Product $product)
    {   
        $cart = new Cart();
        $cart->add($product, $cart);
        return redirect()->route('products.index');
    }

    public function reduceByOne(Product $product)
    {
        $cart = new Cart();
        $cart->reduceByOne($product, $cart);
        return redirect()->route('orders.shoppingCart');
    }

    public function removeProduct(Product $product)
    {
        $cart = new Cart();
        $cart->removeProduct($product, $cart);
        return redirect()->route('orders.shoppingCart');
    }

    public function getCart() 
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $cart = new Cart();
        return view('shop.shopping-cart', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
    }

    public function storeCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $cart = new Cart();
        try {
            $order = new Order();
            $order->cart = serialize($cart);
            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
        return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('products.index')->with('success', 'Bestelling is gelukt!');
    }
}