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
        <h1>Thank you for submitting your information!</h1>
        @if($user)
            <p>Hello, {{ $user->first_name }} {{ $user->last_name }}</p>
            <p>Your account has been created successfully.</p>
        @else
            <p>User information is not available.</p>
        @endif
        <br>
        <a href="/users">View List of Users</a>
        <br>
    </div>
</body>
</html>
