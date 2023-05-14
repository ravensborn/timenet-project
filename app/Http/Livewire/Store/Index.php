<?php

namespace App\Http\Livewire\Store;

use App\Models\Brand;
use Illuminate\Support\Collection;
use Livewire\Component;


class Index extends Component
{

    public Collection $brands;

    public function mount(): void
    {
        $this->brands = Brand::where('is_displayable_on_website', true)->get();
    }

    public function render()
    {
        return view('livewire.store.index')->extends('layouts.store')->section('content');
    }
}
