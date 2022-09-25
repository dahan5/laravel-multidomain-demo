<?php

namespace App\Domain\Example\Controllers;

use Livewire\Component;

class HomeController extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('example::home')
            ->layout('example::layouts.app');
    }
}
