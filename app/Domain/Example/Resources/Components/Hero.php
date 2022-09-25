<?php

namespace App\Domain\Example\Resources\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Hero extends Component
{
    public function __construct(
    ) {
    }

    public function render(): View
    {
        return view('example::hero');
    }
}
