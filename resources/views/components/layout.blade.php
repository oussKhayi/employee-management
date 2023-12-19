<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Exo', sans-serif;
        }
    </style>
    <title>Employee management</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar/>
    {{$slot}}
</body>
</html>