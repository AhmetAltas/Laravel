<?php

namespace App;

use Session;

class Cart
{
	public $products = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct()
	{
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		if ($oldCart) {
			$this->products = $oldCart->products;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($product, $cart)
	{
		$storedProduct = ['qty' => 0, 'price' => $product['price'], 'product' => $product];
		if ($this->products) {
			if (array_key_exists($product->id , $this->products)) {
				$storedProduct = $this->products[$product->id];
			}
		}
		$storedProduct['qty']++;
		$storedProduct['price'] = $product['price'] * $storedProduct['qty'];
		$this->products[$product->id] = $storedProduct;
		$this->totalQty++;
		$this->totalPrice += $product['price'];
		Session::put('cart' , $cart);
	}

	public function reduceByOne($product, $cart) {
		$this->products[$product->id]['qty']--;
		$this->products[$product->id]['price'] -= $this->products[$product->id]['product']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->products[$product->id]['product']['price'];

		if ($this->products[$product->id]['qty'] <= 0){
			unset($this->products[$product->id]);
		}
		if (count($cart->products) > 0) {
	            Session::put('cart', $cart);
	        } else {
	            Session::forget('cart');
	        }
	}

    public function removeProduct($product, $cart) {
        $this->totalQty -= $this->products[$product->id]['qty'];
        $this->totalPrice -= $this->products[$product->id]['price'];
        unset($this->products[$product->id]);
        if (count($cart->products) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
    }
}
