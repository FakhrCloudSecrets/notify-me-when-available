<!DOCTYPE html>
<html>
<head>
    <title>Product Availability Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>The product you wanted is now available.</p>
    <p>Click <a href="{{ route('product.index') }}">here</a> to check it out.</p>
</body>
</html>
