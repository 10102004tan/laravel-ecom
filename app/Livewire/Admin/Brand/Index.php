<?php
namespace App\Livewire\Admin\Brand;
use Livewire\Attributes\Layout;
use Livewire\Component;
class Index extends Component
{


    public function render()
    {
        return view('livewire.admin.brand.index')
        ->extends('layouts.admin-layout')->section('content');
    }
}
