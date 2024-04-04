<!DOCTYPE html>
<html>

<head>
    <title>Customer Inquiry</title>
</head>

<body>
    <p>Name: {{ $name }}</p>
    <p>Email: {{ $email }}</p>
    <p>Inquiry: {!! nl2br($inquiry) !!}</p>
    </p>
</body>

</html>
