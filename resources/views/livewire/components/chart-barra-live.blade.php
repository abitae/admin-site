<div>
    <div id="{{ $name }}"></div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script>
        
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: @json($series),
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: true,
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 400,
                    animateGradually: {
                        enabled: true,
                        delay: 50
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "100%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: false,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: true,
            },
            xaxis: {
                categories: @json($categories),
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: true,
                },
                axisTicks: {
                    show: true,
                },
            },
            yaxis: {
                show: true,
                title: {
                    text: 'Negocios'
                },
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById(@json($name)) && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById(@json($name)), options);
            chart.render();
        }
    </script>
    @endpush