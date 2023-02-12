<?php

namespace App\Http\Livewire\Store\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $search;

    public string $sorting_method = 'newest_top';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortingMethod() {

        $this->resetPage();
    }

    public function render()
    {

        $products = Product::query();

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

        $products = $products->paginate(9);

        return view('livewire.store.products.index', [
            'products' => $products,

        ])->extends('layouts.store')->section('content');
    }
}
