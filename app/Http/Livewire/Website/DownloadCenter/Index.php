<?php

namespace App\Http\Livewire\Website\DownloadCenter;

use App\Models\DownloadableFile;
use Illuminate\Support\Collection;
use Livewire\Component;


class Index extends Component
{

    public string $search = '';
    public Collection $files;

    public function mount(): void
    {

        $this->files = collect();
    }

    public function render()
    {

        if($this->search) {
            $this->files = DownloadableFile::where('name', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.website.download-center.index')->extends('layouts.master')->section('content');
    }
}
