@extends('layout.layout')
@section('content')
<div class="w-full grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
          <!-- Main Info Card -->
          <div class="xl:col-span-2 lg:col-span-2 w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col">
              <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
                  <span class="font-semibold text-primary text-xl">Instrument Details</span>
              
                   
              </div>
              <div class="p-4 grid xl:grid-cols-2 gap-4">
                  <!-- Basic Info -->
                  <div class="flex flex-col gap-2">
                      <h3 class="font-semibold text-primary">Basic Information</h3>
                      <div class="grid grid-cols-2 gap-2 text-sm">
                          <span class="text-gray-600">Name:</span>
                          <span class="font-medium">Scanning Electron Microscope</span>
                          <span class="text-gray-600">Model Number:</span>
                          <span class="font-medium">SEM-2000X</span>
                          <span class="text-gray-600">Category:</span>
                          <span class="font-medium">Microscopes</span>
                          <span class="text-gray-600">Lab:</span>
                          <span class="font-medium">Advanced Microscopy Lab</span>
                          <span class="text-gray-600">Status:</span>
                          <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs font-semibold w-fit">Working</span>
                          <span class="text-gray-600">Department:</span>
                          <span class="font-medium">Materials Science</span>
                          <span class="text-gray-600">Location:</span>
                          <span class="font-medium">Room 205, Building A</span>
                          <span class="text-gray-600">Accessories:</span>
                          <span class="font-medium">7 <a href="{{route('view_acceossries')}}" class="text-danger ml-2 underline">View All</a></span>
                      </div>
                  </div>

                  <!-- Cost & Booking Info -->
                  <div class="flex flex-col gap-2">
                      <h3 class="font-semibold text-primary">Booking Information</h3>
                      <div class="grid grid-cols-2 gap-2 text-sm">
                          <span class="text-gray-600">Cost per Hour:</span>
                          <span class="font-medium">₹500</span>
                          <span class="text-gray-600">Min. Duration:</span>
                          <span class="font-medium">2 Hours</span>
                          <span class="text-gray-600">Max. Duration:</span>
                          <span class="font-medium">8 Hours</span>
                          <span class="text-gray-600">Next Available:</span>
                          <span class="font-medium">Today, 2:00 PM</span>
                          <span class="text-gray-600">Booking Policy:</span>
                          <span class="font-medium">24 hours advance</span>
                          <span class="text-gray-600">Cancellation Policy:</span>
                          <span class="font-medium">12 hours notice</span>
                      </div>
                  </div>

                  <!-- Purchase Information -->
                  <div class="flex flex-col gap-2">
                      <h3 class="font-semibold text-primary">Purchase Information</h3>
                      <div class="grid grid-cols-2 gap-2 text-sm">
                          <span class="text-gray-600">Manufacturer:</span>
                          <span class="font-medium">JEOL Ltd.</span>
                          <span class="text-gray-600">Vendor:</span>
                          <span class="font-medium">SML Ltd.</span>
                          <span class="text-gray-600">Purchase Date:</span>
                          <span class="font-medium">2022-05-15</span>
                          <span class="text-gray-600">Purchase Cost:</span>
                          <span class="font-medium">₹1,25,00,000</span>
                          <span class="text-gray-600">Warranty Until:</span>
                          <span class="font-medium">2025-05-14</span>
                          <span class="text-gray-600">AMC Status:</span>
                          <span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs font-semibold w-fit">Active</span>
                      </div>
                  </div>

                  <!-- Service Information -->
                  <div class="flex flex-col gap-2">
                      <h3 class="font-semibold text-primary">Service Information</h3>
                      <div class="grid grid-cols-2 gap-2 text-sm">
                          <span class="text-gray-600">Service Engineer:</span>
                          <span class="font-medium">Mr. Rajesh Kumar</span>
                          <span class="text-gray-600">Contact Number:</span>
                          <span class="font-medium">+91 98765 43210</span>
                          <span class="text-gray-600">Service Company:</span>
                          <span class="font-medium">JEOL India Pvt. Ltd.</span>
                          <span class="text-gray-600">Last Service:</span>
                          <span class="font-medium">2024-02-15</span>
                          <span class="text-gray-600">Next Service Due:</span>
                          <span class="font-medium">2024-05-15</span>
                      </div>
                  </div>
              </div>

              <!-- Description -->
              <div class="px-4 pb-4">
                  <h3 class="font-semibold text-primary mb-2">Description</h3>
                  <p class="text-sm text-gray-600">The JEOL SEM-2000X is a high-performance Scanning Electron Microscope designed for advanced materials characterization. It features a high-brightness electron source, multiple detection systems, and advanced imaging capabilities. The instrument can achieve magnifications up to 500,000x with a resolution of 1.0 nm. It is equipped with both secondary and backscattered electron detectors, making it suitable for a wide range of applications including materials science, nanotechnology, and biological specimen analysis.</p>
              </div>
          </div>

          <!-- Stats Card -->
          <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-secondary bg-white flex gap-2 flex-col">
              <div class="bg-secondary/10 px-4 py-2 border-b-[2px] border-b-secondary/20">
                  <span class="font-semibold text-secondary text-lg">Instrument Stats</span>
              </div>
              <div class="p-4">
                  <div id="usageStats"></div>
              </div>
              <div class="p-4">
                  <div id="servicesStats"></div>
              </div>
          </div>
      </div>

      <!-- Photos & Documents Section -->
      <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col mt-4">
          <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
              <span class="font-semibold text-primary text-lg">Photos & Documents</span>
          </div>
          <div class="p-4 grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
              <!-- Image Gallery -->
              <div class="border rounded-lg p-2 hover:shadow-lg transition">
                  <img src="https://www.hitachi-hightech.com/my/en/media/su8600_main_tcm41-57046.png" alt="Instrument Front" class="w-full h-48 object-cover rounded">
              </div>
              <div class="border rounded-lg p-2 hover:shadow-lg transition">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQFpCJWbozxVrcvSW-J850ZMSOA5_FXDopeg&s" alt="Instrument Front" class="w-full h-48 object-cover rounded">
              </div>
              <div class="border rounded-lg p-2 hover:shadow-lg transition">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9u57QmVaVbIsRo3HEiBmi98at59HP5R9Mhg&s" alt="Instrument Front" class="w-full h-48 object-cover rounded">
              </div>
              <div class="border rounded-lg p-2 hover:shadow-lg transition">
                  <img src="https://www.hitachi-hightech.com/in/en/media/su3800_main_tcm38-53139.png" alt="Instrument Front" class="w-full h-48 object-cover rounded">
              </div>
        
    
          </div>
          
          <!-- Documents -->
          <div class="px-4 pb-4 grid xl:grid-cols-3 gap-4">
              <a href="#" class="flex items-center gap-2 p-3 border rounded-lg hover:bg-gray-50">
                  <i class="fa fa-file-pdf text-danger text-2xl"></i>
                  <div class="flex flex-col">
                      <span class="text-sm font-medium">Operation Manual</span>
                      <span class="text-xs text-gray-500">PDF, 2.5 MB</span>
                  </div>
              </a>
              <a href="#" class="flex items-center gap-2 p-3 border rounded-lg hover:bg-gray-50">
                  <i class="fa fa-file-pdf text-danger text-2xl"></i>
                  <div class="flex flex-col">
                      <span class="text-sm font-medium">Service Manual</span>
                      <span class="text-xs text-gray-500">PDF, 3.8 MB</span>
                  </div>
              </a>
              <a href="#" class="flex items-center gap-2 p-3 border rounded-lg hover:bg-gray-50">
                  <i class="fa fa-file-pdf text-danger text-2xl"></i>
                  <div class="flex flex-col">
                      <span class="text-sm font-medium">Calibration Guide</span>
                      <span class="text-xs text-gray-500">PDF, 1.2 MB</span>
                  </div>
              </a>
              <a href="#" class="flex items-center gap-2 p-3 border rounded-lg hover:bg-gray-50">
                  <i class="fa fa-file-pdf text-danger text-2xl"></i>
                  <div class="flex flex-col">
                      <span class="text-sm font-medium">Safety Protocols</span>
                      <span class="text-xs text-gray-500">PDF, 850 KB</span>
                  </div>
              </a>
              <a href="#" class="flex items-center gap-2 p-3 border rounded-lg hover:bg-gray-50">
                  <i class="fa fa-file-pdf text-danger text-2xl"></i>
                  <div class="flex flex-col">
                      <span class="text-sm font-medium">Maintenance Schedule</span>
                      <span class="text-xs text-gray-500">PDF, 1.5 MB</span>
                  </div>
              </a>
          </div>
      </div>

      <!-- Service History -->
      <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-warning bg-white flex gap-2 flex-col mt-4">
          <div class="bg-warning/10 px-4 py-2 border-b-[2px] border-b-warning/20">
              <span class="font-semibold text-warning text-lg">Service History</span>
          </div>
          <div class="p-4">
              <div class="relative overflow-x-auto">
        
                  <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
                        <tr>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Date</td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Type</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Description</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Engineer</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Cost</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Action</td>
                        </tr>

                            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">2024-02-15</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"><span class="px-2 py-1 bg-warning/20 text-warning rounded-full text-xs">Maintenance</span></td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Regular maintenance and calibration</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">John Doe</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">₹15,000</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                                    <div class="flex gap-2 items-center">
                                    
                                        <a href="{{route('view_instrument')}}"  title="View Invoice" class="bg-success/10 text-success h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                            <i class="fa fa-eye"></i>
                                        </a >
                                    </div>
                                </td>
                            </tr>
    
                   </table>
              </div>
          </div>
      </div>

      <!-- Booking History -->
      <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-success bg-white flex gap-2 flex-col mt-4 mb-4">
          <div class="bg-success/10 px-4 py-2 border-b-[2px] border-b-success/20">
              <span class="font-semibold text-success text-lg">Recent Bookings</span>
          </div>
          <div class="p-4">
              <div class="relative overflow-x-auto">
        
                  <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4">
                        <tr>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Date</td>
                        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">User</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Duration</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
                            <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Cost</td>
                        </tr>

                            <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">2024-02-15</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Dr. Smith</td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2 hours</td>

                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm"><span class="px-2 py-1 bg-success/20 text-success rounded-full text-xs">Completed</span></td>
                                <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">₹15,000</td>
                              
                            </tr>
    
                   </table>
              </div>
          </div>
      </div>
@endsection

@push('scripts')
<script>
    // Usage Statistics Chart
    var usageOptions = {
        series: [{
            name: 'Hours Used',
            data: [30, 40, 35, 50, 49, 60, 70]
        }],
        chart: {
            type: 'area',
            height: 250,
            toolbar: {
                show: false
            }
        },
        title: {
            text: 'Monthly Usage Hours',
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: 600,
                color: '#334155'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " hours"
                }
            }
        }
    };

    var usageChart = new ApexCharts(document.querySelector("#usageStats"), usageOptions);
    usageChart.render();

    // Services Statistics Chart
    var servicesOptions = {
        series: [{
            name: 'Service Cost',
            data: [15000, 12000, 18000, 22000, 16000]
        }],
        chart: {
            type: 'bar',
            height: 250,
            toolbar: {
                show: false
            }
        },
        title: {
            text: 'Service Maintenance Costs',
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: 600,
                color: '#334155'
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '55%'
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#f59e0b'],
        xaxis: {
            categories: ['Feb 2024', 'Nov 2023', 'Aug 2023', 'May 2023', 'Feb 2023'],
            labels: {
                rotate: -45
            }
        },
        yaxis: {
            title: {
                text: 'Cost (₹)'
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return '₹' + val
                }
            }
        }
    };

    var servicesChart = new ApexCharts(document.querySelector("#servicesStats"), servicesOptions);
    servicesChart.render();
</script>

@endpush