<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire</title>
    @livewireStyles
</head>

<body>
    {{-- ['name'=>'Fikri'], data ini akan dikirim ke method mount di controller hello-word component --}}
    @livewire('hello-world', ['name'=>'Fikri'])
    @livewireScripts
</body>

</html>