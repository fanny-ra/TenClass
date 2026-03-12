<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-RUANGAN - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="h-full bg-slate-950 antialiased text-white">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-indigo-600/20 blur-[120px]"></div>
        <div class="absolute bottom-[10%] right-[10%] w-[30%] h-[30%] rounded-full bg-blue-600/10 blur-[100px]"></div>
    </div>

    <div class="flex flex-col min-h-screen">
        @include('layouts.partials.header')

        <main class="flex-grow">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        @include('layouts.partials.footer')
    </div>
</body>
</html>
