<?php

namespace App\Services;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    public function all()
    {
        return $this->cart;
    }

    public function add($productId, $item)
    {
        $this->cart[$productId] = $item;
        session()->put('cart', $this->cart);
    }

    public function remove($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);
    }

    public function clear()
    {
        session()->forget('cart');
    }

    public function total()
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $this->cart));
    }
}
