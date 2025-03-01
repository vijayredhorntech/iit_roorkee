@extends('layout.layout')
@section('content')
<div class="w-full grid xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2">
            <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Labs</span>
                  <span class="font-bold text-2xl text-ternary">10</span>
              </div>
              <div>
                  <i class="fa fa-building-columns text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Total PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Principal Investigators</span>
                  <span class="font-bold text-2xl text-ternary">15</span>
              </div>
              <div>
                  <i class="fa fa-user-tie text-4xl text-secondary"></i>
              </div>
          </div>

          <!-- Total Students -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Students</span>
                  <span class="font-bold text-2xl text-ternary">248</span>
              </div>
              <div>
                  <i class="fa fa-user-graduate text-4xl text-success"></i>
              </div>
          </div>

          <!-- Total Instruments -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Instruments</span>
                  <span class="font-bold text-2xl text-ternary">75</span>
              </div>
              <div>
                  <i class="fa fa-microscope text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Active Bookings -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Active Bookings</span>
                  <span class="font-bold text-2xl text-ternary">28</span>
              </div>
              <div>
                  <i class="fa fa-calendar-check text-4xl text-success"></i>
              </div>
          </div>

          <!-- Instruments Not Working -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-danger bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instruments Down</span>
                  <span class="font-bold text-2xl text-ternary">3</span>
              </div>
              <div>
                  <i class="fa fa-triangle-exclamation text-4xl text-danger"></i>
              </div>
          </div>

          <!-- Pending Services -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Pending Services</span>
                  <span class="font-bold text-2xl text-ternary">5</span>
              </div>
              <div>
                  <i class="fa fa-wrench text-4xl text-warning"></i>
              </div>
          </div>

          <!-- Total Categories -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instrument Categories</span>
                  <span class="font-bold text-2xl text-ternary">8</span>
              </div>
              <div>
                  <i class="fa fa-list text-4xl text-secondary"></i>
              </div>
          </div>

          <!-- Today's Bookings -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Today's Bookings</span>
                  <span class="font-bold text-2xl text-ternary">15</span>
              </div>
              <div>
                  <i class="fa fa-calendar-day text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Pending Approvals -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Pending Approvals</span>
                  <span class="font-bold text-2xl text-ternary">7</span>
              </div>
              <div>
                  <i class="fa fa-clock text-4xl text-warning"></i>
              </div>
          </div>
          </div>

          <div class="w-full mt-6 border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 flex-col xl:col-span-1 lg:col-span-2 md:col-span-2 ">
            <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
                <span class="font-semibold text-ternary text-lg">Previous month lab bookings stats</span>
            </div>
            <div class="w-full overflow-x-auto p-4">
                <div id="dayWiseLabBooking"></div>
            </div>
        </div>


          <div class="w-full grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-3 grid-cols-1 gap-2 mt-6">
            <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 flex-col xl:col-span-1 lg:col-span-2 md:col-span-2 ">
                <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
                    <span class="font-semibold text-ternary text-lg">Instruments Stats</span>
                </div>
                <div class="w-full overflow-x-auto p-4">
                    <div id="instrumentStatsChart"></div>
                </div>
            </div>
            <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 flex-col ">
                <div class="bg-success/10 px-4 py-2 border-b-[2px] border-b-success/20">
                    <span class="font-semibold text-ternary text-lg">Monthly Lab-wise Instrument Bookings</span>
                </div>
  
                <div class="w-full overflow-x-auto p-4">
                    <div id="labWiseBookingChart"></div>
                </div>
            </div>
            <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 flex-col">
                <div class="bg-warning/10 px-4 py-2 border-b-[2px] border-b-warning/20">
                    <span class="font-semibold text-ternary text-lg">Category-wise Instrument Distribution</span>
                </div>
  
                <div class="w-full overflow-x-auto p-4">
                    <div id="categoryWiseBookings"></div>
                </div>
            </div>
  
        </div>
@endsection

@push('scripts')
<script>

var dayWiseLabBookingOptions = {
        series: [
            {
                name: 'Lab 1',
                data: generateRandomData(31),
                dashArray: 5
            },
            {
                name: 'Lab 2',
                data: generateRandomData(31),
                dashArray: 8
            },
            {
                name: 'Lab 3',
                data: generateRandomData(31),
                dashArray: 3
            },
            {
                name: 'Lab 4',
                data: generateRandomData(31),
                dashArray: 6
            },
            {
                name: 'Lab 5',
                data: generateRandomData(31),
                dashArray: 4
            }
        ],
        chart: {
            height: 250,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#001A6E', '#28a745', '#FFA500', '#074799', '#FF0000'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [2, 2, 2, 2, 2],
            curve: 'straight',
            dashArray: [5, 8, 3, 6, 4]
        },
        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            }
        },
        markers: {
            size: 1
        },
        xaxis: {
            categories: Array.from({length: 31}, (_, i) => i + 1),
            title: {
                text: 'Day of Month'
            }
        },
        yaxis: {
            title: {
                text: 'Number of Bookings'
            },
            min: 0,
            max: 10
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -20,
            offsetX: -5
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if(typeof y !== "undefined") {
                        return y.toFixed(0) + " bookings";
                    }
                    return y;
                }
            }
        }
    };

    // Helper function to generate random data
    function generateRandomData(count) {
        return Array.from({ length: count }, () => Math.floor(Math.random() * 10));
    }

    var dayWiseLabBookingChart = new ApexCharts(document.querySelector("#dayWiseLabBooking"), dayWiseLabBookingOptions);
    dayWiseLabBookingChart.render();


    // Instruments Stats Pie Chart
    var instrumentStatsOptions = {
        series: [45, 3, 5, 15, 7],
        chart: {
            type: 'pie',
            height: 200
        },
        labels: ['Available Instruments', 'Instruments Down', 'Service Required', 'Currently Booked', 'Under Maintenance'],
        colors: ['#28a745', '#FF0000', '#FFA500', '#001A6E', '#074799'],
        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var instrumentStatsChart = new ApexCharts(document.querySelector("#instrumentStatsChart"), instrumentStatsOptions);
    instrumentStatsChart.render();

    // Labs wise bookings Line Chart
    var labWiseBookingOptions = {
        series: [{
            name: 'Bookings',
            data: [30, 45, 25, 55, 20, 35, 15, 40, 28, 32]
        }],
        chart: {
            height: 200,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        colors: ['#28a745'],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Lab 1', 'Lab 2', 'Lab 3', 'Lab 4', 'Lab 5', 'Lab 6', 'Lab 7', 'Lab 8', 'Lab 9', 'Lab 10'],
            labels: {
                rotate: -45,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            title: {
                text: 'Number of Bookings'
            }
        },
    
    };

    var labWiseBookingChart = new ApexCharts(document.querySelector("#labWiseBookingChart"), labWiseBookingOptions);
    labWiseBookingChart.render();

    // Category wise Instruments Bar Chart
    var categoryWiseOptions = {
        series: [{
            name: 'Total Instruments',
            data: [12, 8, 15, 10, 6, 9, 7, 5]
        }, {
            name: 'Currently Active',
            data: [10, 6, 13, 8, 5, 8, 6, 4]
        }],
        chart: {
            type: 'bar',
            height: 200,
            stacked: false,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        colors: ['#001A6E', '#28a745'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Microscopes', 'Spectrometers', 'Analyzers', 'Centrifuges', 'PCR Machines', 'Sequencers', 'Incubators', 'Others'],
            labels: {
                rotate: -45,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            title: {
                text: 'Number of Instruments'
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'bottom'
        },
  
    };

    var categoryWiseChart = new ApexCharts(document.querySelector("#categoryWiseBookings"), categoryWiseOptions);
    categoryWiseChart.render();
</script>
@endpush