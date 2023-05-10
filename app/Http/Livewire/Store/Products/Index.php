<?php

namespace App\Http\Livewire\Store\Products;

use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination, LivewireAlert;

    private $products;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public string $sorting_method = 'newest_top';

    public Collection $cartItems;
    public float $cartTotal = 0;
    public Authenticatable $user;

    public Collection $categories;
    public Collection $brands;

    public array $selectedCategories = [];
    public array $selectedBrands = [];

    public string $displayProductsType = 'grid';

    public function updateProductDisplayType($value): void
    {
        if (in_array($value, ['grid', 'list'])) {
            $this->displayProductsType = $value;
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

                $this->alert('success', 'item added to wishlist.');
            }


            if ($mode == 'remove') {

                $wishlist = $this->user->wishlist()->where('product_id', $product_id)->first();

                if ($wishlist) {
                    $wishlist->delete();
                }

                $this->alert('success', 'item removed from wishlist.');
            }

            $this->getCartItems();

        } else {
            $this->alert('info', 'You need to be logged in first.');
        }


    }

    public function mount(): void
    {
        $this->categories = Category::where('model', Product::class)->get();
        $this->brands = Brand::all();

        if (auth()->check()) {
            $this->user = auth()->user();
            $this->getCartItems();
        }

        $this->selectedCategories = [
            0 => 'all'
        ];

        $this->selectedBrands = [
            0 => 'all'
        ];
    }

    public function addToCart($product_id, $quantity = 1)
    {
        if (auth()->check()) {

            $product = Product::findOrFail($product_id);

            if (!$product->checkIfPurchasable()) {
                $this->alert('error', 'Cannot add item to cart, there is no available stock.');
                return false;
            }


            $existingInCart = CartItem::where('user_id', $this->user->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingInCart) {


                $existingInCart->increment('quantity', 1);


            } else {

                $cartItem = new CartItem;

                $cartItem->create([
                    'user_id' => $this->user->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);

            }

            $this->emit('refresh-header-cart');
            $this->alert('success', 'Item added to cart.');

            $this->getCartItems();
        }

    }

    public function getCartItems(): void
    {
        $this->cartItems = CartItem::where('user_id', $this->user->id)->get();

        $cartTotal = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $this->cartTotal = $cartTotal;
    }

    public function getProducts(): void
    {

        $products = Product::query();

        $products->where('is_hidden', false);

        if ($this->search) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->sorting_method == 'newest_top') {
            $products->orderBy('created_at', 'desc');
        } else if ($this->sorting_method == 'price_high_to_low') {
            $products->orderBy('price', 'desc');
        } else if ($this->sorting_method == 'price_low_to_high') {
            $products->orderBy('price', 'asc');
        }

        if (count($this->selectedCategories) > 0) {

            if (!in_array('all', $this->selectedCategories)) {
                $products->whereIn('category_id', $this->selectedCategories);
            }
        }

        if (count($this->selectedBrands) > 0) {

            if (!in_array('all', $this->selectedBrands)) {
                $products->whereIn('brand_id', $this->selectedBrands);
            }
        }

        $this->products = $products->paginate(9);

    }

    public function _updateSelectedCategories(): void
    {
//        if(in_array('all', $this->selectedCategories)) {
//            $this->selectedCategories = [
//                0 => 'all'
//            ];
//        }

        $this->resetPage();
    }

    public function _updateSelectedBrands(): void
    {
        $this->resetPage();
    }

    public function _updateSearch($search): void
    {
//        $this->search= $search;
        sleep(1);
        $this->resetPage();
    }

    public function _updateSortingMethod(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->search = '';
        $this->sorting_method = 'newest_top';
        $this->selectedCategories = [
            0 => 'all'
        ];
        $this->selectedBrands = [
            0 => 'all'
        ];

        $this->getProducts();

        $this->alert('info', 'Filters successfully removed.');
    }

    public function render()
    {
        $this->getProducts();

        return view('livewire.store.products.index', [
            'products' => $this->products,

        ])->extends('layouts.store')->section('content');
    }


}
