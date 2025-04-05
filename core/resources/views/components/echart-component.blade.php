<div 
    id="{{ $chartId }}" 
    class="w-full {{ $height ?? 'h-[400px]' }}" 
    data-chart='@json($chartData)'
    data-categories='@json($categories)'
    data-title="{{ $title ?? '' }}"
>
</div>

@once
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.6.0/echarts.min.js" integrity="sha512-XSmbX3mhrD2ix5fXPTRQb2FwK22sRMVQTpBP2ac8hX7Dh/605hA2QDegVWiAvZPiXIxOV0CbkmUjGionDpbCmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('[data-chart]').forEach(function (el) {
                    const chart = echarts.init(el);

                    const chartData = JSON.parse(el.dataset.chart);
                    const categories = JSON.parse(el.dataset.categories);
                    const title = el.dataset.title;

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
                            data: categories
                        },
                        yAxis: {},
                        series: [{
                            name: 'Data',
                            type: 'bar',
                            data: chartData
                        }]
                    };

                    chart.setOption(option);

                    window.addEventListener('resize', function () {
                        chart.resize();
                    });
                });
            });
        </script>
    @endpush
@endonce
