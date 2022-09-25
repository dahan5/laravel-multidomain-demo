<?php

namespace App\Domain\Example\Resources\Components;

use Illuminate\View\View;
use Livewire\Component;

class Drawer extends Component
{
    public function render(): View
    {
        return view('example::drawer');
    }
}
