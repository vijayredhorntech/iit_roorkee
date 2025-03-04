<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<!-- rest of your HTML code remains the same -->
<body class="flex min-h-screen items-center justify-center p-4 bg-gray-900 bg-opacity-60" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{asset('assets/images/loginBg.jpg')}}); background-size: cover; background-position: center; font-family: Roboto">

<div class="w-full max-w-lg bg-gray-300 border-2 border-gray-400 px-6 py-10 rounded-lg shadow-lg">
    <div class="w-full flex justify-center items-center flex-col">
        <img src="{{asset('assets/images/logo.png')}}" class="lg:h-40 md:h-40 sm:h-36 h-32 w-auto" alt="IITR Logo"/>
    </div>
    <div class="mt-4 flex flex-col items-center text-center">
        <span class="lg:text-[35px] md:text-[30px] sm:text-[28px] text-[25px] font-semibold text-primary">"KINKER"</span>
        <span class="lg:text-[20px] md:text-[20px] sm:text-[17px] text-[15px] font-semibold text-primary">Instrument Booking System</span>
        <div class="w-[90%]">
            <p class="lg:text-xs md:text-xs sm:text-xs text-[10px] text-gray-600">Department of Biological Science</p>
        </div>
    </div>
    <div class="mt-8">
     <form method="POST" action="{{ route('auth.login') }}">
           @csrf
            <div class="w-full flex flex-col gap-1">
                <label class="font-semibold text-primary">Email <span class="text-danger">*</span></label>
                <input type="email" required  name="email" placeholder="Enter email ....." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[4px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="mt-2"></div>
            <div class="w-full flex flex-col gap-1">
                <label class="font-semibold text-primary">Password <span class="text-danger">*</span></label>
                <input type="password" required  name="password" placeholder="Enter password ....." class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[4px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
            </div>
            <div class="mt-2"></div>
            <input type="submit"  class="w-full mt-8 px-4 py-3 bg-primary/80 border-[2px] border-primary/90 text-white/80 font-semibold hover:bg-primary/90 hover:text-white rounded-[3px] inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 transition ease-in duration-200" value="Sign In">
            <!-- <a  href="{{route('dashboard')}}"  class="w-full mt-8 px-4 py-3 bg-primary/80 border-[2px] border-primary/90 text-white/80 font-semibold hover:bg-primary/90 hover:text-white rounded-[3px] inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 transition ease-in duration-200">
                Sign In
      </a> -->
        </form>
        <div class="mt-4">
            <p class="text-center text-primary text-sm font-medium">
                Forgot password? <a href="{{route('forget_password')}}" class="text-secondary hover:text-danger transition ease-in duration-2000 font-semibold">
                Regain Access ✌️
            </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
