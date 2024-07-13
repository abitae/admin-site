<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    <div x-data="{ open: false }">
        <x-nav></x-nav>

        <x-aside></x-aside>
    </div>
    <div class="p-4 lg:ml-64">
        <div class="p-4 border-2 border-gray-200  border-dashed rounded-lg dark:border-gray-700 sm:mt-14">
            {{ $slot}}
        </div>
        <x-footer></x-footer>
        <x-copyright></x-copyright>
    </div>
    @stack('js')
</body>

</html>