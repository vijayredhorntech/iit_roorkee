@extends('superadmin.layout.layout')
@section('content')
<div class="w-full grid xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2">
      <a href="{{route('superadmin.lab_list')}}">  
         <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
            
            <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Labs</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($lab_count) ? $lab_count : '0' }}</span>
              </div>

              <div>
                  <i class="fa fa-building-columns text-4xl text-primary"></i>
              </div>
          </div>
        </a> 
          <!-- Total PIs -->
          <a href="{{route('alldetails_pi')}}"> 
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Principal Investigators</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($pi_count) ? $pi_count : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-user-tie text-4xl text-secondary"></i>
              </div>
          </div>
          </a>

          <!-- Total Students -->
          <a href="{{route('alldetails_student')}}">
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Students</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($student_count) ? $student_count : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-user-graduate text-4xl text-success"></i>
              </div>
          </div>
        </a> 
          <!-- Total Instruments -->
          <a href="{{route('superadmin.instrument_list')}}">
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total Instruments</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($total_instrument) ? $total_instrument : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-microscope text-4xl text-primary"></i>
              </div>
          </div>
          </a> 
          <!-- Active Bookings -->
          <a href="{{route('get.bookings')}}">
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Active Bookings</span>
                  <span class="font-bold text-2xl text-ternary"> {{ isset($total_booking) ? $total_booking : '0' }} </span>
              </div>
              <div>
                  <i class="fa fa-calendar-check text-4xl text-success"></i>
              </div>
          </div>
          </a> 

          <!-- Instruments Not Working -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-danger bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instruments Down</span>
                  <span class="font-bold text-2xl text-ternary"></span>
              </div>
              <div>
                  <i class="fa fa-triangle-exclamation text-4xl text-danger"></i>
              </div>
          </div>

          <!-- Pending Services -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Pending Services</span>
                  <span class="font-bold text-2xl text-ternary"></span>
              </div>
              <div>
                  <i class="fa fa-wrench text-4xl text-warning"></i>
              </div>
          </div>

          <!-- Total Categories -->
          <a href="{{route('superadmin.categorylist')}}">
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Instrument Categories</span>
                  <span class="font-bold text-2xl text-ternary">  {{ isset($total_instrumentcategory) ? $total_instrumentcategory : '0' }} </span>
              </div>
              <div>
                  <i class="fa fa-list text-4xl text-secondary"></i>
              </div>
          </div>
         </a> 

          <!-- Today's Bookings -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Today's Bookings</span>
                  <span class="font-bold text-2xl text-ternary">0</span>
              </div>
              <div>
                  <i class="fa fa-calendar-day text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Pending Approvals -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Pending Approvals</span>
                  <span class="font-bold text-2xl text-ternary">0</span>
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

var bookings = @json($allBookings);

    // Function to process booking data
    function processBookingData(bookings) {
        let instrumentNames = {}; // Store instrument names by ID
        let dataMap = {}; // Store counts { '2025-02-06': { 'PCR': 3, 'Microscope': 2 } }

        bookings.forEach(booking => {
            let date = booking.date;
            let instrumentName = booking.instrument.name; // Get instrument name

            // Store instrument names (to maintain order)
            instrumentNames[booking.instrument_id] = instrumentName;

            // Initialize date object if not exists
            if (!dataMap[date]) {
                dataMap[date] = {};
            }

            // Increment instrument count for that date
            if (!dataMap[date][instrumentName]) {
                dataMap[date][instrumentName] = 0;
            }
            dataMap[date][instrumentName]++;
        });

        return { instrumentNames, dataMap };
    }

    // Process bookings data
    let { instrumentNames, dataMap } = processBookingData(bookings);

    // Extract x-axis (dates) and prepare series
    let xCategories = Object.keys(dataMap).sort(); // Sorted date array
    let seriesData = Object.values(instrumentNames).map(name => {
        return {
            name: name, // Instrument Name
            data: xCategories.map(date => dataMap[date][name] || 0) // Get count per date
        };
    });

  

    // ApexChart Config
    var dayWiseLabBookingOptions = {
        series: seriesData, // Dynamic data
        chart: {
            height: 350,
            type: 'line',
            zoom: { enabled: false },
            toolbar: { show: false }
        },
        colors: ['#001A6E', '#28a745', '#FFA500', '#074799', '#FF0000'],
        dataLabels: { enabled: false },
        stroke: { width: [2, 2, 2, 2, 2], curve: 'straight' },
        grid: {
            borderColor: '#e7e7e7',
            row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
        },
        markers: { size: 3 },
        xaxis: {
            categories: xCategories, // Dynamic dates
            title: { text: 'Date' }
        },
        yaxis: {
            title: { text: 'Number of Bookings' },
            min: 0
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
                    return y ? `${y} bookings` : "0 bookings";
                }
            }
        }
    };

    // Render chart
    var dayWiseLabBookingChart = new ApexCharts(document.querySelector("#dayWiseLabBooking"), dayWiseLabBookingOptions);
    dayWiseLabBookingChart.render();

    var counts = @json($counts);
console.log(counts);
  
    // Instruments Stats Pie Chart
    var instrumentStatsOptions = {
            series: [
            counts['working'] ?? 0, 
            counts['out of order'] ?? 0, 
            counts['under maintainance'] ?? 0
        ],
        chart: {
            type: 'pie',
            height: 200
        },
        labels: ['Working', 'Out of Order',  'Under Maintenance'],
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



// Define categories
    // Labs wise bookings Line Chart

    var topInstruments = {!! json_encode($topInstruments) !!};

        // Extract categories (Instrument Names) and data (Total Bookings)
        var categories = topInstruments.map(item => item.instrument.name);
        var bookingData = topInstruments.map(item => item.total_bookings);

        var labWiseBookingOptions = {
            series: [{
                name: 'Bookings',
                data: bookingData  // Dynamically filled data
            }],
            chart: {
                height: 200,
                type: 'line',
                zoom: { enabled: false }
            },
            colors: ['#28a745'],
            dataLabels: { enabled: true },
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
                categories: categories, // Dynamic instrument names
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            yaxis: {
                title: { text: 'Number of Bookings' }
            },
        };

        var labWiseBookingChart = new ApexCharts(document.querySelector("#labWiseBookingChart"), labWiseBookingOptions);
        labWiseBookingChart.render();



    // Category wise Instruments Bar Chart

    var instrumentSummary = {!! json_encode($instrumentSummary) !!};

// Extract category names, total instruments, and working instruments
var categories = instrumentSummary.map(item => item.instruments_category.name);
var totalInstruments = instrumentSummary.map(item => item.total_instruments);
var workingInstruments = instrumentSummary.map(item => item.working_instruments);

var categoryWiseOptions = {
    series: [{
        name: 'Total Instruments',
        data: totalInstruments  // Dynamic total instruments
    }, {
        name: 'Currently Active',
        data: workingInstruments // Dynamic working instruments
    }],
    chart: {
        type: 'bar',
        height: 200,
        stacked: false,
        toolbar: { show: true },
        zoom: { enabled: true }
    },
    colors: ['#001A6E', '#28a745'],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: { enabled: false },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: categories, // Dynamic categories
        labels: {
            rotate: -45,
            style: { fontSize: '12px' }
        }
    },
    yaxis: {
        title: { text: 'Number of Instruments' }
    },
    fill: { opacity: 1 },
    legend: { position: 'bottom' },
};

var categoryWiseChart = new ApexCharts(document.querySelector("#categoryWiseBookings"), categoryWiseOptions);
categoryWiseChart.render();
    // var categoryWiseOptions = {
    //     series: [{
    //         name: 'Total Instruments',
    //         data: [12, 8, 15, 10, 6, 9, 7, 5]
    //     }, {
    //         name: 'Currently Active',
    //         data: [10, 6, 13, 8, 5, 8, 6, 4]
    //     }],
    //     chart: {
    //         type: 'bar',
    //         height: 200,
    //         stacked: false,
    //         toolbar: {
    //             show: true
    //         },
    //         zoom: {
    //             enabled: true
    //         }
    //     },
    //     colors: ['#001A6E', '#28a745'],
    //     plotOptions: {
    //         bar: {
    //             horizontal: false,
    //             columnWidth: '55%',
    //             endingShape: 'rounded'
    //         },
    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     stroke: {
    //         show: true,
    //         width: 2,
    //         colors: ['transparent']
    //     },
    //     xaxis: {
    //         categories: ['Microscopes', 'Spectrometers', 'Analyzers', 'Centrifuges', 'PCR Machines', 'Sequencers', 'Incubators', 'Others'],
    //         labels: {
    //             rotate: -45,
    //             style: {
    //                 fontSize: '12px'
    //             }
    //         }
    //     },
    //     yaxis: {
    //         title: {
    //             text: 'Number of Instruments'
    //         }
    //     },
    //     fill: {
    //         opacity: 1
    //     },
    //     legend: {
    //         position: 'bottom'
    //     },
  
    // };

    // var categoryWiseChart = new ApexCharts(document.querySelector("#categoryWiseBookings"), categoryWiseOptions);
    // categoryWiseChart.render();
</script>
@endpush