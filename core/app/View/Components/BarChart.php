<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BarChart extends Component
{
    public $chartId;
    public $barChartName;
    public $dataBarChart;
    public $categories;
    public $title;
    public $height;

    public function __construct($chartId = 'chart-' . null, $barChartName = '', $dataBarChart = [], $categories = [], $title = '', $height = null)
    {
        $this->chartId = $chartId ?? 'chart-' . uniqid();
        $this->barChartName = $barChartName;
        $this->dataBarChart = $dataBarChart;
        $this->categories = $categories;
        $this->title = $title;
        $this->height = $height;
    }

    public function render()
    {
        return view('components.bar-chart');
    }
}

