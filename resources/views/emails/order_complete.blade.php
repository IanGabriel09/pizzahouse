<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
</head>
<body>
    <h1>Order Completed</h1>
    <p><i>Your order is on it's way to your doorstep, please keep your lines open.</i></p>
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
    <p><strong>Delivery Driver:</strong> {{ $order->delivery_driver }}</p>
    
    <br>
    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
    <br>
</body>
</html>
