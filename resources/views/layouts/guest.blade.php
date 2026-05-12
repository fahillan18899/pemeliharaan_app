<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Judul -->
    <title>SIMALKES</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-green-50 via-green-100 to-white">

    <div class="min-h-screen flex flex-col items-center justify-center">

        <!-- LOGO / BRAND -->
        <div class="mb-6 text-center">
            <div class="flex justify-center mb-3">
                <div class="bg-green-100 p-4 rounded-full shadow-sm">
                    <!-- ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-8 w-8 text-green-600" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 17v-2a4 4 0 014-4h4M7 7h10M7 3h10M7 21h10"/>
                    </svg>
                </div>
            </div>

            <h1 class="text-xl font-bold text-green-700 tracking-wide">
                SIMALKES
            </h1>

            <p class="text-sm text-green-600">
                Sistem Pemeliharaan Alat Rumah Sakit
            </p>
        </div>

        <!-- CONTENT -->
        <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-lg rounded-xl border border-green-100">
            {{ $slot }}
        </div>

        <!-- FOOTER -->
        <p class="mt-6 text-xs text-gray-400">
            © {{ date('Y') }} SIMALKES
        </p>

    </div>

</body>
</html>