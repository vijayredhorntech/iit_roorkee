<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Super Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
            ::-webkit-scrollbar {
            width: 2px;
            height: 2px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #001A6E;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }


        input[type="date"]::-webkit-datetime-edit {
            color: #172432b3; /* Change placeholder text color */
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
        }


        select {
            -webkit-appearance: none !important; /* Hides the arrow in WebKit-based browsers (Chrome, Safari, Edge) */
            -moz-appearance: none !important;    /* Hides the arrow in Firefox */
            appearance: none !important;         /* Standard property */
            background: white !important ;
            color: rgba(75, 85, 99, 0.7);/* Removes background if needed */
        }
        select option {
            color: rgba(75, 85, 99, 0.9); /* Match placeholder text */
            background-color: #ffffff; /* Ensure options have a white background */
        }
    </style>
    <script>
      tailwind.config = {
          theme: {
              extend: {
                  colors: {
                      primary: '#001A6E',
                      secondary: '#074799',
                      primaryLight: '#E1FFBB',
                      secondaryLight: '#009990',

                      white: '#FFFFFF',
                      black: '#000000',
                      danger: '#FF0000',
                      success: '#28a745',
                      warning: '#FFA500',
                  },
              },
          },
      }
  </script>

</head>
<body class="bg-gray-100 relative"
      style="font-family: 'Public Sans', serif; height: 100vh; width: 100%; overflow:hidden">
<div id="sideBarOverlay" class="xl:w-0 lg:w-0  h-full bg-black/40 absolute top-0 left-0"
     onclick="document.getElementById('sideBarDiv').classList.toggle('hidden');document.getElementById('sideBarOverlay').classList.toggle('w-full');"></div>

<div class="flex w-full ">
  <div id="sideBarDiv" class="z-20 w-72 p-4 h-[100vh] bg-primary overflow-x-hidden overflow-y-auto flex-none xl:static lg:static absolute top-0 left-0 xl:block lg:block hidden ">
    <div class="w-full flex flex-col justify-center items-center border-b-[1px] pb-2 border-b-gray-100/20 shadow-lg shadow-gray-700/10">
        <img src="{{asset('assets/images/whiteLogo.png')}}" class="h-32 w-auto" alt="Cloud Travel">
        <span class="font-semibold text-white/80 mt-2 text-2xl">IIT ROORKEE</span>
        <p class="text-primaryLight text-xs" ><i class="fa-solid fa-flask mr-1"></i>
           Department of Biological Science
        </p>
    </div>

    <div class="w-full flex flex-col mt-12 gap-3">
        <a href="{{route('dashboard')}}">
            <div class=" {{Route::currentRouteName()==='dashboard'?'bg-primaryLight/90 border-[2px] border-white text-primary':'border-[2px] border-primary  bg-primary text-white/90 hover:bg-primaryLight/10'}} w-full flex justify-between items-center py-1 px-4 rounded-[3px] relative transition ease-in duration-2000">
                <div class="flex items-center">
                    <i class="fa fa-tv mr-2 text-sm"></i>
                    <span class="text-lg font-medium">Dashboard</span>
                </div>
                <div class="h-16 w-12 bg-primary absolute top-1 -right-6 rotate-45"></div>
            </div>
        </a>

        <a href="{{route('student.booking')}}">
            <div class=" {{Route::currentRouteName()==='book_instrument'?'bg-primaryLight/90 border-[2px] border-white text-primary':'bg-primary text-white/90 hover:bg-primaryLight/10'}} w-full flex justify-between items-center py-1 px-4 rounded-[3px] relative transition ease-in duration-2000">
                <div class="flex items-center">
                    <i class="fa fa-ticket mr-2 text-sm"></i>
                    <span class="text-lg font-medium">Book Instrument</span>
                </div>
                <div class="h-16 w-12 bg-primary absolute top-1 -right-6 rotate-45"></div>
            </div>
        </a>


        <a href="{{route('viewstudent.booking')}}">
            <div class=" {{Route::currentRouteName()==='book_instrument'?'bg-primaryLight/90 border-[2px] border-white text-primary':'bg-primary text-white/90 hover:bg-primaryLight/10'}} w-full flex justify-between items-center py-1 px-4 rounded-[3px] relative transition ease-in duration-2000">
                <div class="flex items-center">
                    <i class="fa fa-ticket mr-2 text-sm"></i>
                    <span class="text-lg font-medium">View Booking</span>
                </div>
                <div class="h-16 w-12 bg-primary absolute top-1 -right-6 rotate-45"></div>
            </div>
        </a>

        <a href="{{route('logout')}}">
            <div class=" {{Route::currentRouteName()==='book_instrument'?'bg-primaryLight/90 border-[2px] border-white text-primary':'bg-primary text-white/90 hover:bg-primaryLight/10'}} w-full flex justify-between items-center py-1 px-4 rounded-[3px] relative transition ease-in duration-2000">
                <div class="flex items-center">
                    <i class="fa fa-ticket mr-2 text-sm"></i>
                    <span class="text-lg font-medium">Logout</span>
                </div>
                <div class="h-16 w-12 bg-primary absolute top-1 -right-6 rotate-45"></div>
            </div>
        </a>

       

        
    </div>


    <div class="w-full flex flex-col mt-20">
        <span class="text-white/90 text-xs font-semibold">Developed by:</span>
        <a href="https://himsoftsolution.com" target="_blank" class="mt-2 text-primaryLight text-md font-semibold hover:text-secondaryLight transition ease-in duration-2000">Him Soft Solution</a>
    </div>
</div>



    <div class=" h-[100vh] w-full overflow-y-auto">
      <div class="w-full px-4 py-2 flex xl:justify-between lg:justify-between md:justify-between sm:justify-between justify-between items-center bg-white sticky top-0 border-b-[2px] border-b-primary/20">
        <div class="flex items-center">
            <div class="rounded-full h-10 w-10 xl:hidden lg:hidden flex justify-center items-center text-secondary"    onclick="document.getElementById('sideBarDiv').classList.toggle('hidden');
                             document.getElementById('sideBarOverlay').classList.toggle('w-full');"><i class="fa fa-bars text-xl" title="Search......"></i></div>
            <span class="font-bold text-primary text-xl xl:block lg:block md:block sm:block hidden">Student Dashboard</span>

        </div>
        <div class="w-max flex items-center">
            <div class="rounded-full h-10 w-10 flex text-primary justify-center items-center hover:bg-primary/60 hover:text-white cursor-pointer transition ease-in duration-2000"><i class="fa fa-search" title="Search......"></i></div>
            <div class="rounded-full h-10 w-10 flex text-primary justify-center items-center hover:bg-primary/60 hover:text-white cursor-pointer transition ease-in duration-2000 relative">
                <div class="absolute top-0 right-0 text-xs text-white bg-primary font-semibol h-4 w-4 rounded-full flex justify-center items-center">5</div>
                <i class="fa fa-bell" title="Search......"></i>
            </div>
            <div class="rounded-full h-10 w-10 flex text-primary justify-center items-center hover:bg-primary/60 hover:text-white cursor-pointer transition ease-in duration-2000"><i class="fa fa-gear animate-spin" title="Search......"></i></div>
            <div class="flex items-center ̥gap-2 mx-4 cursor-pointer">
                <div class="">
                <img src="{{ isset($student->profile_name) ? asset($student->profile_name) : 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=400' }}"  class="w-auto h-10 rounded-full" alt="IIT Roorkee">
                </div>
                <div class="flex flex-col items-start justify-center ml-4">
                    <span class="text-primary text-sm font-semibold">{{$student->name}}</span>
                    <span class="text-primary/90 text-xs font-semibol">Student</span>
                </div>

            </div>
        </div>
    </div>

        <div class="p-4 w-full ">
              @yield('content')
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>
