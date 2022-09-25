<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <livewire:styles />
    @vite(['app/Core/Resources/Assets/sass/app.scss', 'app/Core/Resources/Assets/js/app.js', 'app/Domain/Example/Resources/Assets/sass/app.scss', 'app/Domain/Example/Resources/Assets/js/app.js'])
</head>

<body>

    {{ $slot }}

    @stack('scripts')
    <livewire:scripts />

</body>

</html>
