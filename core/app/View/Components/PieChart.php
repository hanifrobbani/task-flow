<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PieChart extends Component
{
    /**
     * Create a new component instance.
     */
    public $chartId;
    public $pieChartName;

    public $dataPieChart;
    public $height;

    public function __construct($chartId = 'chart-' . null, $pieChartName = '', $dataPieChart = [], $height = null)
    {
        $this->chartId = $chartId ?? 'chart-' . uniqid();
        $this->pieChartName = $pieChartName;
        $this->dataPieChart = $dataPieChart;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pie-chart');
    }
}
