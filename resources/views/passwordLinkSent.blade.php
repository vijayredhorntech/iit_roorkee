<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Link Sent</title>
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
        <div class="text-center space-y-4">
            <div class="flex justify-center">
                <svg class="w-16 h-16 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-primary">Password Reset Link Sent!</h2>
            <p class="text-gray-600">We have sent a password reset link to your email address. Please check your inbox and follow the instructions to reset your password.</p>
            <div class="mt-8">
                <a href="/" class="px-6 py-3 bg-primary/80 border-[2px] border-primary/90 text-white/80 font-semibold hover:bg-primary/90 hover:text-white rounded-[3px] inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 transition ease-in duration-200">
                    Back to Login
                </a>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-center text-primary text-sm font-medium">
                Didn't receive the email? <a href="{{ route('forget_password') }}" class="text-secondary hover:text-danger transition ease-in duration-2000 font-semibold">
                    Try again 📧
                </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>