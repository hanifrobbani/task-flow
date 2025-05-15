<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Join Company Mail</title>
</head>
<body>
    <h2>Hello, {{ $user->name }}</h2>
    <p>you have been invited to join the company {{ $company }} on TaskFlow</p>
    <p><a href="{{ $urlJoinCompany }}" target="_blank">{{ $urlJoinCompany }}</a></p>
    <br>

    <p>If you don't know this company, please ignore this email.</p>

    <footer>
        <p>Sincerely, TaskFlow</p>
    </footer>
</body>
</html>