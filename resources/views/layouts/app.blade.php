<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="same-origin">
    <title>Surge</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @livewireStyles
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased font-sans">
    {{ $sidebar ?? null }}
    <main>
        {{ $slot }}
    </main>
    @livewire('flash-message')

    @livewireScripts
</body>

</html>