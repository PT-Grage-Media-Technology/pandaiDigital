<!DOCTYPE html>
<html>
<head>
    <title>Email Pesan</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{!! nl2br(e($details['body'])) !!}</p>
</body>
</html>
