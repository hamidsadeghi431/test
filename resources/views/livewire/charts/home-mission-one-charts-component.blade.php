<div>
    <div class="container">
        <div class="row">
    <div id="chartContainer" style="height: 570px; width: 100%;" wire:ignore></div>
    <div id="chartContainer1" style="height: 570px; width: 100%;" wire:ignore></div>
    <div id="chartContainer2" style="height: 570px; width: 100%;" wire:ignore></div>

        </div>
    </div><!-- /.card-body -->
    @push('scp')
        <script type="text/javascript">
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer",{
                    title :{
                        text: "Simultanusly Power Consumption / Temperature Environment"
                    },

                    axisY:[
                        {
                            title: "Power Consum kWh",
                            lineColor: "#369EAD",
                            titleFontColor: "#369EAD",
                            labelFontColor: "#369EAD"
                        },
                        {
                            title: " Temperature",
                        }
                    ],

                    data: [{
                        type: "column",
                        axisYIndex: 0, //defaults to 0
                        dataPoints : [
                                @foreach($tableParameters1 as $item)
                            { label: {{$item->year.$item->month}},  y: {{$item->pwrConsTotal}} },
                            @endforeach

                        ]
                    },
                        {
                            type: "line",
                            axisYIndex: 1,
                            dataPoints : [
                                    @foreach($tableParameters1 as $item)
                                { label: {{$item->year.$item->month}},  y: {{$item->temperature}}  },
                                @endforeach

                            ]
                        }
                    ]
                });
                var chart1 = new CanvasJS.Chart("chartContainer1",
                    {
                        title:{
                            text: "Daily Average Power Consumption / Daily Temperature",
                        },
                        axisX:{

                            title: "Temperature c",
                            valueFormatString:  "#,##0.##",
                            minimum: 0,
                            maximum: 35
                        },
                        axisY:{
                            title: "Daily Power Consum Per Day kWh ",
                            valueFormatString:  "#,##0.##",
                        },
                        legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "left"

                        },
                        data: [
                            {
                                type: "scatter",
                                color: "#778899",
                                legendText: "Each triangle represents one person",
                                showInLegend: "true",

                                dataPoints: [
                                        @foreach($dailyPower as $item)
                                    { x: {{$item->temperature}},  y: {{$item->dailyPwrConsum/$item->dayQty}} },
                                    @endforeach
                                    // { x: 10000, y: 1100 },

                                ]
                            }
                        ]
                    });
                var chart2 = new CanvasJS.Chart("chartContainer2",{
                    title :{
                        text: "SEI Chart"
                    },
                    axisX:{

                        title: "year",

                    },
                    axisY:[
                        {
                            title: "Power Consum kWh/mm2",
                            lineColor: "#369EAD",
                            titleFontColor: "#369EAD",
                            labelFontColor: "#369EAD"
                        }
                    ],

                    data: [{
                        type: "line",
                        title:"year",
                        axisYIndex: 0, //defaults to 0
                        dataPoints : [
{{--                            {{$dataPoints3}}--}}
                            { label: {{$firstYear}},  y: {{$sei1}} },
                            { label: {{$secondYear}},  y: {{$sei2}} },
                            { label: {{$thirdYear}},  y: {{$sei3}} },

                        ]
                    }

                    ]
                });
                chart.render();
                chart1.render();
                chart2.render();

            }
        </script>
        <script src="{{asset('admin/assets/chart/canvasjs.min.js')}}"></script>
    @endpush
</div>

