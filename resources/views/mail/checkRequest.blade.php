<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
            <h2>CIao sig. Admin</h2>
            <p>Clicca per rendere revisore {{$user->name}}</p>
            <p><a href="{{route('makeChecker',$user)}}" class="btn btn-success">ORA</a></p>

            <small>Se non hai fatto nessuna richiesta ignora pure questa mail!</small>
        </body>
    </html>