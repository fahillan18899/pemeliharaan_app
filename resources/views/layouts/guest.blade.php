<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Judul -->
    <title>Sistem Pemeliharaan Alat RS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-blue-50 to-white">

    <div class="min-h-screen flex flex-col items-center justify-center">

        <!-- LOGO / BRAND -->
        <div class="mb-6 text-center">
            <div class="flex justify-center mb-2">
                <div class="bg-blue-100 p-4 rounded-full">
                    <!-- ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-8 w-8 text-blue-600" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 17v-2a4 4 0 014-4h4M7 7h10M7 3h10M7 21h10"/>
                    </svg>
                </div>
            </div>

            <h1 class="text-xl font-bold text-gray-800">
                Sistem Pemeliharaan Alat
            </h1>

            <p class="text-sm text-gray-500">
                Rumah Sakit
            </p>
        </div>

        <!-- CONTENT -->
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md rounded-xl">
            {{ $slot }}
        </div>

    </div>

</body>
</html>