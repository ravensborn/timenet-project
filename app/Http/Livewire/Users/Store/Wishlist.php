<?php

namespace App\Http\Livewire\Users\Store;

use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.users.store.wishlist')->extends('layouts.store')->section('content');
    }
}
