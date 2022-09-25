<?php

namespace App\Domain\Foo\Controllers;

use Livewire\Component;

class HomeController extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('foo::home')
            ->layout('foo::layouts.app');
    }
}
