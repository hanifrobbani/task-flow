<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToastNotification extends Component
{
    /**
     * Create a new component instance.
     */
    public $message;
    public $title;
    public $variant;

    public function __construct($message = '', $title = '', $variant = '', )
    {
        $this->message = $message;
        $this->title = $title;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toast-notification');
    }
}
