<?php

namespace App;

class Cart
{
	public $products = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->products = $oldCart->products;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($product, $id)
	{
		$storedProduct = ['qty' => 0, 'price' => $product['price'], 'product' => $product];
		if ($this->products) {
			if (array_key_exists($id, $this->products)) {
				$storedProduct = $this->products[$id];
			}
		}
		$storedProduct['qty']++;
		$storedProduct['price'] = $product['price'] * $storedProduct['qty'];
		$this->products[$id] = $storedProduct;
		$this->totalQty++;
		$this->totalPrice += $product['price'];
	}

	public function reduceByOne($id) {
		$this->products[$id]['qty']--;
		$this->products[$id]['price'] -= $this->products[$id]['product']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->products[$id]['product']['price'];

		if ($this->products[$id]['qty'] <= 0){
			unset($this->products[$id]);
		}
	}

    public function removeProduct($id) {
        $this->totalQty -= $this->products[$id]['qty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
