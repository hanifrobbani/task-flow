<?php

namespace App\View\Components;

// use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToastNotification extends Component
{
    public $message;
    public $title;
    public $variant;
    public $show;
    public $duration;

    public function __construct($message = '', $title = '', $variant = 'success', $show = false, $duration = 3000)
    {
        $this->message = $message;
        $this->title = $title;
        $this->variant = $variant;
        $this->show = $show;
        $this->duration = $duration;
    }

    public function render(): View
    {
        return view('components.toast-notification');
    }
}
