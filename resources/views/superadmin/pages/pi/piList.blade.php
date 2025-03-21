@extends('superadmin.layout.layout')

@section('content')
<div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-2">
    
          <!-- Total PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-primary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Total PIs</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($pi_count) ? $pi_count : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-users text-4xl text-primary"></i>
              </div>
          </div>

          <!-- Active PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-success bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Active PIs</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($active_pi) ? $active_pi : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-user-check text-4xl text-success"></i>
              </div>
          </div>

          <!-- Inactive PIs -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-warning bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Inactive PIs</span>
                  <span class="font-bold text-2xl text-ternary">{{ isset($inactive_pi) ? $inactive_pi : '0' }}</span>
              </div>
              <div>
                  <i class="fa fa-user-clock text-4xl text-warning"></i>
              </div>
          </div>

          <!-- Departments -->
          <div class="w-full border-[1px] border-t-[4px] border-ternary/20 border-t-secondary bg-white flex gap-2 items-center justify-between p-4">
              <div class="flex flex-col gap-2">
                  <span class="font-semibold text-ternary/70 text-md">Departments</span>
                  <span class="font-bold text-2xl text-ternary">4</span>
              </div>
              <div>
                  <i class="fa fa-building-user text-4xl text-secondary"></i>
              </div>
          </div>          
</div>

<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300 mt-6">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Principal Investigators List</span>
    </div>
    <div class="w-full overflow-x-auto p-4">
        <div class="w-full flex justify-between gap-2 items-center">
            <div class="flex gap-2">
                    <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-excel"></i>
                    </button>

                    <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-pdf"></i>
                    </button>
            </div>
            <div class="flex items-center gap-2">
            <input type="text" name="search" id="searchpi" required placeholder="Search PI" class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            <select name="status" id="status" required class="px-2 py-1 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            </div>
        </div>
        <table class="w-full border-[2px] border-secondary/40 border-collapse mt-4" id="piTable">
    <tr>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Sr. No.</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Name</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Email</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Phone</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Department</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Status</td>
        <td class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-1.5 text-ternary/80 font-bold text-md">Action</td>
    </tr>

    
    
    <!-- <div id="resultContainer"></div> -->
    <div class="mainContainer"> 
    @forelse($allpi as $pi)
 
                <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">{{ $loop->iteration }}</td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">{{ $pi->name }}</td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">{{ $pi->email }}</td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                    {{ $pi->pi->phone_number ?? 'N/A' }}
                </td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                    {{ $pi->pi->department ?? 'Not Specified' }}
                </td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                    <span class="{{ $pi->status == 'active' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }} px-2 py-0.5 rounded-full text-xs">
                        {{ $pi->status == 'active' ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                    <div class="flex gap-2">
                        <a href="{{ route('view_pi.details', ['id' => $pi->id]) }}" title="View Details" 
                        class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                        hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                            <i class="fa fa-eye text-xs"></i>
                        </a>

                        <a href="{{ route('edit_pi.details', ['id' => $pi->id]) }}" title="Edit" 
                        class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] 
                        hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-2000">
                            <i class="fa fa-pen text-xs"></i>
                        </a>

                        <a href="{{ route('userlogin', ['id' => $pi->id]) }}" title="View Details" 
                        class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                        hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-2000">
                            <i class="fa fa-lock text-xs"></i>
                        </a>
                    </div>
                </td>
            </tr>

@empty
    <tr>
        <td colspan="7" class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text-center">
            No records found
        </td>
    </tr>
@endforelse
</div>


</table>
<div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">
                Showing {{ $allpi->firstItem() }} to {{ $allpi->lastItem() }} of {{ $allpi->total() }} entries
            </div>
            <div class="mt-4">
                {{ $allpi->links() }}
            </div>
            <!-- <div class="flex gap-2">
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Previous</button>
                <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Next</button>
            </div> -->
        </div>
    </div>
</div>


<script>
  $(document).ready(function () {
    function fetchResults() {
        let searchVal = $('#searchpi').val().trim();
        let statusVal = $('#status').val();
        let tableBody = $('#piTable tbody'); // Adjust selector based on actual table ID

        // AJAX Request
        $.ajax({
            url: "{{ route('pi.serach') }}", // Corrected route name
            type: 'POST',
            data: {
                search: searchVal,
                status: statusVal,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token for security
            },
            dataType: 'json',
           success: function (response) {

    let tableBody = $("#piTable tbody");
    tableBody.empty(); // Clear previous records properly

    let uniqueIds = new Set(); // Track unique IDs to avoid duplication

    if (response.length > 0) {
        let row = "";
        $.each(response, function (index, pi) {
            console.log("Processing ID:", pi.id); // Debugging each record

            if (!uniqueIds.has(pi.id)) { // Ensure unique records
                uniqueIds.add(pi.id);

                let statusClass = pi.status === 'active' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger';

                row += `
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-200">
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${uniqueIds.size}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text">${pi.name}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${pi.email}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${pi.pi?.phone_number ?? 'N/A'}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${pi.pi?.department ?? 'Not Specified'}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                            <span class="${statusClass} px-2 py-0.5 rounded-full text-xs">
                                ${pi.status === 'active' ? 'Active' : 'Inactive'}
                            </span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2">
                                <a href="/super-admin/view_pi/${pi.id}" title="View Details" 
                                class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-eye text-xs"></i>
                                </a>

                                   <a href="/super-admin/edit/${pi.id}" title="Edit" 
                                class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>

                                <a href="/super-admin/user-login/${pi.id}" title="Login" 
                                class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-lock text-xs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                `;
            } else {
                console.warn("Duplicate detected and skipped:", pi.id);
            }
        });

        tableBody.append(row); // Append all rows at once
    } else {
        tableBody.append(`
            <tr>
                <td colspan="7" class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text-center">
                    No records found
                </td>
            </tr>
        `);
    }
}
,
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    }

    // Trigger AJAX on search input (only if at least 3 characters) and status change
    $('#searchpi').on('keyup', function () {
        let searchVal = $(this).val().trim();
        if (searchVal.length >= 3 || searchVal.length === 0) { // Prevent unnecessary requests
            fetchResults();
        }
    });

    $('#status').on('change', fetchResults);
});


</script>

@endsection


   
<!-- Placeholder for displaying results -->
<!-- <div id="resultContainer"></div> -->
