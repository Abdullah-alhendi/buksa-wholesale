<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="بكصة - منصة توريدات المطاعم بالجملة">

        <title>{{ config('app.name', 'بكصة') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --primary-color: #F59E0B;
                --secondary-color: #0F172A;
                --accent-color: #4F46E5;
                --success-color: #10B981;
                --bg-light: #F9FAFB;
            }
            
            body {
                font-family: 'Tajawal', sans-serif;
                background-image: url("{{ asset('images/pattern.png') }}");
                background-repeat: repeat;
            }
            
            .auth-card {
                backdrop-filter: blur(3px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: all 0.3s ease;
            }
            
            .auth-card:hover {
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                transform: translateY(-5px);
            }
            
            .logo-wrapper {
                position: relative;
                margin-bottom: 1rem;
                background: var(--primary-color);
                padding: 1rem;
                border-radius: 50%;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-amber-50 to-amber-100">
            <div class="mb-6 flex flex-col items-center">
                <div class="logo-wrapper">
                    <a href="/" class="flex items-center justify-center">
                        <x-application-logo class="w-20 h-20 fill-current text-white" />
                    </a>
                </div>
                <h1 class="mt-4 text-3xl font-bold text-amber-600">{{ config('app.name', 'بكصة') }}</h1>
                <p class="mt-2 text-gray-600">توريدات المطاعم بالجملة</p>
            </div>

            <div class="w-full sm:max-w-md px-6 py-8 bg-white bg-opacity-90 shadow-lg rounded-lg auth-card">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500">
                <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} {{ config('app.name', 'بكصة') }}</p>
                <div class="flex justify-center gap-4 mt-3">
                    <a href="#" class="text-gray-500 hover:text-amber-600 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-amber-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-amber-600 transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>