<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>New Order received!</h1>
    <br>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Contact:</strong> {{ $order->contact }}</p>
    <br>
    
    <h3>Order Details</h3>
    <p><strong>Pizza Type:</strong> {{ $order->pizza_type }}</p>
    <p><strong>Pizza Size:</strong> {{ $order->pizza_size }}</p>
    <p><strong>Crust Type:</strong> {{ $order->crust_type }}</p>
    <p><strong>Toppings:</strong> 
        @if(is_array($order->toppings))
            @foreach($order->toppings as $index => $topping)
                {{ $index > 0 ? ', ' : '' }}{{ $topping }}
            @endforeach
        @else
            {{ $order->toppings }}
        @endif
    </p>
    
    <br>
    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
    <br>
    <a href="{{ route('login') }}">Redirect to Login</a>
</body>
</html>
