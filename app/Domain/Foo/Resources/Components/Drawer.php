<?php

namespace App\Domain\Foo\Resources\Components;

use Illuminate\View\View;
use Livewire\Component;

class Drawer extends Component
{
    public function render(): View
    {
        return view('foo::drawer');
    }
}
