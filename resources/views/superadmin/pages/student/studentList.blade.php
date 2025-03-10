@extends('superadmin.layout.layout')
@section('content')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between items-center">
        <span class="font-semibold text-primary text-xl">Students List</span>
        <a href="{{route('superadmin.create_student')}}" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add New Student</a>
    </div>

    <div class="p-4">
        <!-- Search and Filter Section -->
        <div class="w-full grid xl:grid-cols-4 gap-4 mb-4">
     
            <div class="w-full flex flex-col gap-1">
                <input type="text" id="studentid" placeholder="Search by Name/ID" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select id="searchbydepartment" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Department</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Physics">Physics</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Biology">Biology</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Medicine">Medicine</option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-1">
                <select id="searchbystatus"   class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-1">
                    <select name="student_id" id="student_select"  required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">--- Select PI ---</option>

                    @forelse($pilist as $pi)
                        <option value="{{ $pi->id }}">{{ $pi->pi->title }} {{ $pi->name }} {{ $pi->pi->last_name }}</option>
                    @empty
                        <option value="1">No PI found</option>
                    @endforelse

                      
                    </select>
                </div>
             
            <!-- <div class="w-full flex flex-col gap-1">
                <select id="searchbypi" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                    <option value="">Filter by PI</option>
                
                    <option value="1">Dr. Rajesh Kumar</option>
                    <option value="2">Dr. Priya Singh</option>
                </select>
            </div> -->
            <div class="flex gap-2">
        <button title="Export to excel" class="bg-success/20 text-success h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-excel"></i>
                    </button>

                    <button title="Export to pdf" class="bg-danger/20 text-danger h-8 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white cursor-pointer transition ease-in duration-2000">
                        <i class="fa fa-file-pdf"></i>
                    </button>
        </div>
        </div>

        <!-- Students Table -->
        <div class="relative overflow-x-auto">
        <table class="w-full border-[2px] border-secondary/40 border-collapse" id="studentTable">
    <thead>
        <tr>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Student ID</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Name</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Department</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">PI</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Year</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Status</th>
            <th class="border-[2px] border-secondary/40 bg-gray-100 px-4 py-2 text-ternary/80 font-bold text-md text-left">Actions</th>
        </tr>
    </thead>
    <tbody>

    @forelse($students as $student)
        <!-- Sample Data Row -->

        <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$student->student->student_id}}</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$student->name}} {{$student->student->lastname}}</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$student->student->department}}</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$student->student->pideatils->title}} {{$student->student->piname->name}} {{$student->student->pideatils->last_name}}</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{$student->student->student_year}} Year</td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                
            <span class="{{ $student->status == 'active' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger' }} px-2 py-0.5 rounded-full text-xs">
                        {{ $student->status == 'active' ? 'Active' : 'Inactive' }}
                    </span>
            </td>
            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                <div class="flex gap-2">
                    <a href="{{ route('view_student.details', ['id' => $student->id]) }}" class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">View</a>
                    <a href="{{ route('edit_student.details', ['id' => $student->id]) }}"
                     class="text-xs bg-warning/30 px-3 py-1 rounded-full font-semibold border-[1px] border-warning/80 text-warning hover:text-white hover:bg-warning hover:border-ternary/30 transition ease-in duration-2000">Edit</a>
                    <a href="{{ route('userlogin', ['id' => $student->id]) }}" title="View Details" 
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

    </tbody>
</table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
        <div class="text-sm text-gray-600">
                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
            </div>
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
<!-- jQuery (Required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#student_select').select2({
            placeholder: "--- Search by PI ---",
            allowClear: true
        });
    });
    
      $(document).ready(function () {
    function fetchResults() {
        
        let searchVal = $('#studentid').val().trim();
        let statusVal = $('#searchbystatus').val();
        let departVal=$('#searchbydepartment').val(); 
        let piName=$('#student_select').val(); 
  
        let tableBody = $('#piTable tbody'); // Adjust selector based on actual table ID

        // AJAX Request
        $.ajax({
            url: "{{ route('student.serach') }}", // Corrected route name
            type: 'POST',
            data: {
                studentid: searchVal,
                status: statusVal,
                departVal: departVal,
                piName: piName,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token for security
            },
            dataType: 'json',
           success: function (response) {

    let tableBody = $("#studentTable tbody");
    tableBody.empty(); // Clear previous records properly

    let uniqueIds = new Set(); // Track unique IDs to avoid duplication

    if (response.length > 0) {
        let row = "";
        $.each(response, function (index, sid) {
         

                let statusClass = sid.status === 'active' ? 'bg-success/20 text-success' : 'bg-danger/20 text-danger';

             
            row += `
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-200">
                    
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text">${sid.student.student_id}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm text">${sid.name}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${sid.student.department}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">  ${sid.student.pideatils?.title ?? ''} 
                            ${sid.student.piname?.name ?? ''} 
                            ${sid.student.pideatils?.last_name ?? ''}</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">${sid.student.student_year ?? 'Not Specified'} Year </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                            <span class="${statusClass} px-2 py-0.5 rounded-full text-xs">
                                ${sid.status === 'active' ? 'Active' : 'Inactive'}
                            </span>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1.5 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2">
                                <a href="/super-admin/view_student/${sid.id}" title="View Details" 
                                class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-eye text-xs"></i>
                                </a>

                                   <a href="/super-admin/edit_student/${sid.id}" title="Edit" 
                                class="bg-warning/20 text-warning h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-warning hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>

                                <a href="/super-admin/user-login/${sid.id}" title="Login" 
                                class="bg-primary/20 text-primary h-6 w-6 flex justify-center items-center rounded-[3px] 
                                hover:bg-primary hover:text-white cursor-pointer transition ease-in duration-200">
                                    <i class="fa fa-lock text-xs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                `;
          
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
    $('#studentid').on('keyup', function () {
        let searchVal = $(this).val().trim();
        if (searchVal.length >= 3 || searchVal.length === 0) { // Prevent unnecessary requests
            fetchResults();
        }
    });

    $('#searchbystatus').on('change', fetchResults);
    $('#searchbydepartment').on('change', fetchResults);
    $('#student_select').on('change', fetchResults);
});

    </script>
@endsection