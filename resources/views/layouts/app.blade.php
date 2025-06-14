<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'UMKMmu') }}</title>

    {{-- Livewire Styles (opsional jika pakai livewire) --}}
    @livewireStyles

    {{-- Icon CDN / Fonts (Opsional) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-base-100 text-base-content font-sans">


    <x-navbar />

    <main class="min-h-screen pt-20 px-4">
        @yield('content')
    </main>

    <x-footer />


    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- Tambahan JS --}}
    @stack('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
</body>

</html>
