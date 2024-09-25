<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresco.it</title>
    <link rel="icon" href="{{ asset('storage/images/ico/favicon.ico') }}" type="image/x-icon" sizes="255x255"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="container min-vh-100 mt-3 pt-3">
        {{$slot}}
    </section>
</body>
</html>
