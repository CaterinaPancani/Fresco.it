<div class="margin-top-nav">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

            <title>Document</title>
        </head>
        <body class="d-flex flex-column" style="min-height: 100vh; margin: 0; display: flex; flex-direction: column;">
            <x-layout.navbar/>
            <x-layout.banner-message/>
            {{$slot}}
             <x-layout.footer/>
        </body>
    </html>
</div>
