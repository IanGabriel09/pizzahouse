<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank you for your order!</h1>
    <p>Your order has been placed successfully. Please click the link below to confirm your order:</p>
    <p>
        <a href="{{ route('confirmOrder', ['token' => $token]) }}">
            Confirm Order
        </a>
    </p>
    <p>If you did not make this order, please ignore this email.</p>
</body>
</html>
