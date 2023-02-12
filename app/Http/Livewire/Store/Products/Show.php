<?php

namespace App\Http\Livewire\Store\Products;

use App\Models\Product;
use Livewire\Component;


class Show extends Component
{


    public function render() {


        return view('livewire.store.products.show')->extends('layouts.store')->section('content');
    }
}
