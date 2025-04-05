<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EchartComponent extends Component
{
    public $chartId;
    public $chartData;
    public $categories;
    public $title;
    public $height;

    public function __construct($chartId = 'chart-' . null, $chartData = [], $categories = [], $title = '', $height = null)
    {
        $this->chartId = $chartId ?? 'chart-' . uniqid();
        $this->chartData = $chartData;
        $this->categories = $categories;
        $this->title = $title;
        $this->height = $height;
    }

    public function render()
    {
        return view('components.echart-component');
    }
}

