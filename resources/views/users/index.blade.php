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
        <h1>List of Users</h1>
        <a href="/">Return to Form</a>
        <p>Total Users: {{ $userCount }}</p>
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}
                    @if ($user->profile_image)
                        <img src="{{ route('users.image', $user->id) }}" alt="Profile Image" style="width: 50px; height: 50px;">
                    @else
                        No Image
                    @endif
                </li>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete User</button>
                </form>
            @endforeach
        </ul>
    </div>
</body>
</html>
