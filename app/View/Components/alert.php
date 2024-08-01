<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class alert extends Component
{
    /**
     * Create a new component instance.
     */
    // public $type;
    // public $message;
    public function __construct(public string $type, public string $message)
    {
        // $this->type = $type;
        // $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
