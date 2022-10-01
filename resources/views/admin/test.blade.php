{{-- <x-admin-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('admin/asset/vendor/libs/apex-charts/apex-charts.css') }}" />

</head>

<body>
    <h2>Chart</h2>
    <div id="chart"></div>

    <script src="{{ asset('admin/asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            dataLabels: {
                enabled: false
            },
            series: [],
            title: {
                text: 'Ajax Example',
            },
            noData: {
                text: 'Loading...'
            },
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#255aee',
                    shadeTo: 'light',
                    shadeIntensity: 0.65
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        // chart.render();
        // i = document.querySelector("#chart"), a = {
        //     series: [
        //         // {
        //         //     name: "2021",
        //         //     data: dataaa
        //         // }, {
        //         //     name: "2020",
        //         //     data: [-13, -18, -9, -14, -5, -17, -15, 0, 0,0]
        //         // }
        //     ],
        //     noData: {
        //         text: 'Loading...'
        //     },
        //     chart: {
        //         height: 300,
        //         stacked: !0,
        //         type: "bar",
        //         toolbar: {
        //             show: !1
        //         }
        //     },
        //     plotOptions: {
        //         bar: {
        //             horizontal: !1,
        //             columnWidth: "33%",
        //             borderRadius: 12,
        //             startingShape: "rounded",
        //             endingShape: "rounded"
        //         }
        //     },
        //     colors: [config.colors.primary, config.colors.info],
        //     dataLabels: {
        //         enabled: false
        //     },
        //     stroke: {
        //         curve: "smooth",
        //         width: 6,
        //         lineCap: "round",
        //         colors: [o]
        //     },
        //     legend: {
        //         show: !0,
        //         horizontalAlign: "left",
        //         position: "top",
        //         markers: {
        //             height: 8,
        //             width: 8,
        //             radius: 12,
        //             offsetX: -3
        //         },
        //         labels: {
        //             colors: e
        //         },
        //         itemMargin: {
        //             horizontal: 10
        //         }
        //     },
        //     grid: {
        //         borderColor: s,
        //         padding: {
        //             top: 0,
        //             bottom: -8,
        //             left: 20,
        //             right: 20
        //         }
        //     },
        //     xaxis: {
        //         categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Nov", "Dec"],
        //         labels: {
        //             style: {
        //                 fontSize: "13px",
        //                 colors: e
        //             }
        //         },
        //         axisTicks: {
        //             show: !1
        //         },
        //         axisBorder: {
        //             show: !1
        //         }
        //     },
        //     yaxis: {
        //         labels: {
        //             style: {
        //                 fontSize: "13px",
        //                 colors: e
        //             }
        //         }
        //     },
        //     responsive: [{
        //         breakpoint: 1700,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "32%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 1580,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "35%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 1440,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "42%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 1300,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "48%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 1200,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "40%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 1040,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 11,
        //                     columnWidth: "48%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 991,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "30%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 840,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "35%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 768,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "28%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 640,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "32%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 576,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "37%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 480,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "45%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 420,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "52%"
        //                 }
        //             }
        //         }
        //     }, {
        //         breakpoint: 380,
        //         options: {
        //             plotOptions: {
        //                 bar: {
        //                     borderRadius: 10,
        //                     columnWidth: "60%"
        //                 }
        //             }
        //         }
        //     }],
        //     states: {
        //         hover: {
        //             filter: {
        //                 type: "none"
        //             }
        //         },
        //         active: {
        //             filter: {
        //                 type: "none"
        //             }
        //         }
        //     }
        // };
        // var chart = new ApexCharts(i, a);
        chart.render();
    </script>
    <script>
        var url = 'http://great-academy.local/test/data';

        $.getJSON(url, function(response) {
            chart.updateSeries(response
                // {
                //     name: "2021",
                //     data: response
                // }, {
                //     name: "2020",
                //     data: [-13, -18, -9, -14, -5, -17, -15, 0, 0, 0]
                // }
                // {
                //     name: 'Sales',
                //     data: response
                // }
            );
        });
    </script>
</body>

</html>
