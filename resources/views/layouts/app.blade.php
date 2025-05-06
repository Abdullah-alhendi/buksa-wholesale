<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="بكصة - منصة متخصصة لتوريدات المطاعم بالجملة">
    <title>بكصة - توريدات المطاعم بالجملة</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Tajawal (مناسب للعربية) -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
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
            scroll-behavior: smooth;
        }
        
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
        
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="sticky top-0 z-50">
        @include('partials.navbar')
    </header>

    <!-- Notification Banner -->
    @php
        $activeOffers = \App\Models\Offer::where('is_active', true)->pluck('message');
    @endphp

    @if($activeOffers->count())
    <div class="bg-amber-500 text-white py-2 overflow-hidden whitespace-nowrap shadow-md">
        <div class="animate-marquee flex">
            @foreach($activeOffers as $message)
                <span class="mx-8 font-bold flex items-center"><i class="fas fa-bullhorn ml-2"></i> {{ $message }}</span>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 mb-4 mx-4 mt-2 rounded shadow" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle ml-2"></i>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-4 mx-4 mt-2 rounded shadow" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle ml-2"></i>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-grow py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        @include('partials.footer')
    </footer>

    <!-- Scripts -->
    <script>
        // إغلاق رسائل التنبيه بعد فترة
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 1s';
                    setTimeout(() => alert.style.display = 'none', 1000);
                });
            }, 5000);
        });
    </script>
</body>
</html>