<div
    id="{{ $chartId }}"
    class="w-full {{ $height ?? 'h-[400px]' }}"
    data-pie-chart='@json($dataPieChart)'
    data-pie-chart-name = "{{ $pieChartName }}">
</div>

@once
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-pie-chart]').forEach(function(el) {
            const pieChart = echarts.init(el);

            const dataPieChart = JSON.parse(el.dataset.pieChart);
            const pieChartName = el.dataset.pieChartName

            const option = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    top: '5%',
                    left: 'center'
                },
                series: [{
                    name: pieChartName,
                    type: 'pie',
                    radius: ['50%', '80%'],
                    avoidLabelOverlap: true,
                    label: {
                        show: false,
                        position: 'center'
                    },
                    grid: {
                        left: '3%',
                        right: '3%',
                        bottom: '3%',
                        top: 60,
                        containLabel: true
                    },
                    labelLine: {
                        show: false
                    },
                    data: dataPieChart
                }]
            };

            pieChart.setOption(option);

            window.addEventListener('resize', function() {
                pieChart.resize();
            });
        });
    });
</script>
@endpush
@endonce