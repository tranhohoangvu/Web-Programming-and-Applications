<!DOCTYPE html>
<html>
<head>
    <title>Temporary Link</title>
</head>
<body>
    <p>Hello {{ $user->username }},</p>
    <p>Click the following link to proceed: <a href="{{ $link }}">{{ $link }}</a></p>
    <p>This link will expire in 1 minute.</p>
</body>
</html>
