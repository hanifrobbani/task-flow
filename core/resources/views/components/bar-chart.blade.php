<div
    id="{{ $chartId }}"
    class="w-full {{ $height ?? 'h-[400px]' }}"
    data-bar-chart='@json($dataBarChart)'
    data-categories='@json($categories)'
    data-title="{{ $title ?? '' }}"
    data-bar-chart-name="{{ $barChartName }}">
</div>

@once
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bar-chart]').forEach(function(el) {
            const barChart = echarts.init(el);

            const dataBarChart = JSON.parse(el.dataset.barChart);
            const categories = JSON.parse(el.dataset.categories);
            const title = el.dataset.title;
            const barChartName = el.dataset.barChartName;
            console.log(categories)


            const option = {
                title: {
                    text: title
                },
                tooltip: {},
                legend: {
                    data: ['Data'],
                    left: '20px'
                },
                grid: {
                    left: '3%',
                    right: '3%',
                    bottom: '3%',
                    top: 60,
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: categories,
                    axisLabel: {
                        interval: 0, // paksa tampil semua label
                        // rotate: 30 
                    }
                },
                yAxis: {},
                series: [{
                    name: barChartName,
                    type: 'bar',
                    data: dataBarChart
                }]
            };

            barChart.setOption(option);

            // window.addEventListener('resize', function () {
            //     barChart.resize();
            // });
        });
    });
</script>
@endpush
@endonce