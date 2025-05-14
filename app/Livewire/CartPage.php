<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart Page - SembakoHub')]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;
    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id)
    {
        $this->cart_items = CartManagement::removeItemFromCart($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }
    public function increaseQty($product_id)
    {
        $this->cart_items = CartManagement::incrementItemQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        // $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }
    public function decreaseQty($product_id)
    {
        $this->cart_items = CartManagement::decrementItemQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        // $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
