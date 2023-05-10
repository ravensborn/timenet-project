<?php

namespace App\Http\Livewire\Store\CartItems;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Index extends Component
{

    use LivewireAlert;

    public Collection $cartItems;
    public float $cartTotal = 0;
    public Authenticatable $user;

    public string $promoCode = '';

    public function checkout(): void
    {

        if (!$this->checkStockAvailability()) {

            $this->alert('error', 'One or more items is out of stock, please check your cart again.');

        } else {

            redirect()->route('store.checkout.index');
        }

    }

    public function checkStockAvailability(): bool
    {
        $this->getCartItems();

        $cartItems = $this->cartItems;

        foreach ($cartItems as $item) {
            if (!$item->checkStockAvailability()) {
                return false;
            }
        }

        return true;
    }

    public function updateQuantity($product_id, $mode = 'increment'): void
    {

        $cartItem = CartItem::where('user_id', $this->user->id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {

            if ($mode == 'increment') {

                $product = Product::find($product_id);

                if (!$product->checkIfPurchasable()) {
                    $this->alert('error', 'Cannot add item to cart, there is no available stock.');

                } else {
                    $cartItem->increment('quantity', 1);
                }

            }

            if ($mode == 'decrement') {

                if (($cartItem->quantity - 1) <= 0) {

                    $cartItem->delete();

                } else {

                    $cartItem->decrement('quantity', 1);
                }
            }

            if ($mode == 'delete') {
                $cartItem->delete();
            }

            $this->emit('refresh-header-cart');
            $this->getCartItems();

        } else {

            $this->alert('error', 'An issue while updating cart.');
        }


    }

    public function toWishlist($product_id, $mode = 'add'): void
    {


        if (auth()->check()) {
            if ($mode == 'add') {
                $wishlist = new Wishlist;
                $wishlist->create([
                    'user_id' => $this->user->id,
                    'product_id' => $product_id
                ]);

                $this->alert('success', 'Successfully added to wishlist.');
            }


            if ($mode == 'remove') {

                $wishlist = $this->user->wishlist()->where('product_id', $product_id)->first();

                if ($wishlist) {
                    $wishlist->delete();
                }

                $this->alert('success', 'Successfully removed from wishlist.');
            }

            $this->getCartItems();
        } else {
            $this->alert('info', 'You need to be logged in first.');
        }

    }

    public function mount(): void
    {

        if (auth()->check()) {
            $this->user = auth()->user();
        }

        $this->getCartItems();

    }

    public function getCartItems()
    {

        if (!auth()->check()) {
            return false;
        }

        $this->cartItems = CartItem::where('user_id', $this->user->id)->get();

        $cartTotal = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $this->cartTotal = $cartTotal;
    }

    public function render()
    {
        return view('livewire.store.cart-items.index')->extends('layouts.store')->section('content');
    }

}
