<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Service;

class ServiceComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Service $service)
    {


        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-comments');
    }
}
