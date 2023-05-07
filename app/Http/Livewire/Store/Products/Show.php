<?php

namespace App\Http\Livewire\Store\Products;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Wishlist;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Show extends Component
{

    use LivewireAlert;

    public Product $product;

    public int $quantity = 1;

    public int $userCart = 0;
    public bool $productWishlisted = false;

    public function updatedQuantity()
    {
        if ($this->quantity > 50) {
            $this->quantity = 50;
        }
    }

    public function adjustQuantity($mode = 'increment')
    {

        if ($mode == 'increment') {
            if ($this->quantity <= 49) {
                $this->quantity = $this->quantity + 1;
            }
        }
        if ($mode == 'decrement') {
            if ($this->quantity >= 2) {
                $this->quantity = $this->quantity - 1;
            }
        }
    }

    public function toWishlist()
    {

        if (auth()->check()) {

            $user = auth()->user();

            if($this->getWishlistStatus($user)) {

                $existInWishList = $user->wishlist()->where('product_id', $this->product->id)->first();

                $existInWishList->delete();

                $this->alert('success', 'item removed from wishlist.');

            } else {

                $wishlist = new Wishlist;
                $wishlist->create([
                    'user_id' => $user->id,
                    'product_id' => $this->product->id
                ]);

                $this->productWishlisted = true;

                $this->alert('success', 'item added to wishlist.');

            }


            $this->getWishlistStatus($user);

        } else {
            $this->alert('info', 'You need to be logged in first.');
        }


    }

    public function addToCart()
    {

        $quantity = 1;

        if ($this->quantity > 0) {
            $quantity = $this->quantity;
        }

        if (auth()->check()) {

            if ($quantity > 100) {
                $this->alert('error', 'An issue with processing cart.');
                return false;
            }

            $product = Product::findOrFail($this->product->id);

            $existingInCart = CartItem::where('user_id', auth()->user()->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingInCart) {

                $existingInCart->increment('quantity', 1);

            } else {

                $cartItem = new CartItem;

                $cartItem->create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);

            }

            $this->emit('refresh-header-cart');
            $this->alert('success', 'Item added to cart.');
        }

        $this->getUserCart();

    }

    public function getUserCart()
    {
        $this->userCart = auth()->user()->cartItems->count();
    }

    public function getWishlistStatus($user): bool
    {
        $existInWishList = $user->wishlist()->where('product_id', $this->product->id)->first();

        if ($existInWishList) {
            $this->productWishlisted = true;
            return true;
        }

        $this->productWishlisted = false;
        return false;
    }

    public function mount($slug): void
    {
        $product = Product::where('slug', $slug)
            ->firstOrFail();

        $user = auth()->user();

        if (auth()->check() && $user->hasRole('admin')) {

            $product = Product::where('slug', $slug)
                ->firstOrFail();
        } else {
            $product = Product::where('slug', $slug)
                ->where('is_hidden', false)
                ->firstOrFail();
        }

        $this->product = $product;

       if($user) {
           $this->getWishlistStatus($user);
           $this->getUserCart();
       }

        visitor()->visit($product);



    }

    public function render()
    {


        return view('livewire.store.products.show')->extends('layouts.store')->section('content');
    }
}
