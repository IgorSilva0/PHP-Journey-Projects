<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('/favicon.png') }}" sizes="64x64" type="image/png">
    <title>Business Comparison Technical Test</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1>Business Comparison Technical Test</h1>
        @include('/form/form');
    </div>
</body>
</html>
