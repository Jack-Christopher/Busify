<?php

namespace App\View\Components\blocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarSubmenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct( public string $name, public array $options)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blocks.sidebar-submenu');
    }
}
