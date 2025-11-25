<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Formtext extends Component
{
    /**
     * The name attribute for the form text.
     */


    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public string $placeholder = '',
        public string $value = '',

    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.formtext');
    }
}
