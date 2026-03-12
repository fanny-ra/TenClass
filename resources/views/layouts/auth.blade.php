<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body class="h-full font-['Roboto'] antialiased">
        <div class="fixed inset-0 z-[-1]">
            <img src="https://pklsmk.com/wp-content/uploads/2022/01/6.jpg"
                class="w-full h-full object-cover" alt="School Background">
            {{-- Overlay gelap agar teks tetap mudah dibaca --}}
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        @yield('main')
    </body>
</html>
