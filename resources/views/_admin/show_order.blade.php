@extends('_layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-2xl mx-auto mb-5">
        <a href="{{ route('dashboard') }}" class="text-custom-purple underline underline-offset-2">Back to Dashboard</a>
    </div>
    
    <!-- Order Card -->
    <div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-md border border-gray-100">
        <div class="mb-10">
            <h5 class="text-4xl font-semibold text-center text-gray-800">Order Details</h5>
        </div>

        <div class="space-y-8 border border-gray-300 rounded-md p-3 py-5">
            <!-- Customer Info Section -->
            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Customer Name:</p>
                <p class="text-gray-600 text-lg">{{ $order['name'] }}</p>
            </div>
            
            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Address:</p>
                <p class="text-gray-600 text-lg">{{ $order['address'] }}</p>
            </div>

            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Contact:</p>
                <p class="text-gray-600 text-lg">{{ $order['contact'] }}</p>
            </div>

            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Email:</p>
                <p class="text-gray-600 text-lg">{{ $order['email'] }}</p>
            </div>

            <!-- Pizza Details Section -->
            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Pizza Type:</p>
                <p class="text-gray-600 text-lg">{{ $order['pizza_type'] }}</p>
            </div>

            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Pizza Size:</p>
                <p class="text-gray-600 text-lg">{{ $order['pizza_size'] }}</p>
            </div>

            <div class="block sm:flex justify-between items-center space-x-4">
                <p class="font-semibold text-lg text-gray-800">Crust Type:</p>
                <p class="text-gray-600 text-lg">{{ $order['crust_type'] }}</p>
            </div>

            <!-- Toppings Section -->
            <div>
                <p class="font-semibold text-lg text-gray-800 mb-3">Toppings:</p>
                <ul class="text-gray-600 list-disc pl-5 space-y-2 block sm:flex justify-evenly">
                    @foreach (json_decode($order['toppings']) as $topping)
                        <li>{{ $topping }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Total Price Section -->
            <div class="flex justify-between items-center border-t pt-6 mt-6 border-gray-200">
                <p class="font-semibold text-lg text-gray-800">Total Price:</p>
                <p class="text-2xl font-bold text-green-600">${{ $order['total_price'] }}</p>
            </div>
        </div>

        <div class="text-center mt-5">
            <button id="deliverOrderButton"
               class="bg-indigo-500 cursor-pointer hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >Deliver Order</button>
        </div>
    </div>
</div>

<!-- Delivery Driver Modal -->
<div id="driverModal" class="fixed inset-0 backdrop-blur-lg flex justify-center items-center hidden transition-all duration-300 ease-in-out">
    <div class="bg-white p-6 border border-gray-400 rounded-lg shadow-lg w-96">
        <h3 class="text-2xl font-semibold text-center mb-4">Select Delivery Driver</h3>

        <form method="POST" action="{{ route('completeOrder', $order['id']) }}" id="orderForm">
            @csrf
            <select name="driver_id" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">
                <option value="" selected disabled>Select Driver</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        
            <div class="text-center">
                <button id="confirmBtn" type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">
                    Confirm Delivery
                </button>
                <button id="cancelBtn" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 ml-2">
                    Cancel
                </button>
            </div>
        </form>

        <div class="text-center">
            <button 
                id="loadBtn"
                type="submit" 
                class="hidden w-full md:w-auto bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                </svg>
                Loading...
            </button>
        </div>
        

        
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#deliverOrderButton').click(function() {
        $('#driverModal').removeClass('hidden');
    });

    $('#closeModal').click(function() {
        $('#driverModal').addClass('hidden');
    });

    $('#orderForm').submit(function(event) {
        // Hide the confirm and cancel buttons
        $('#confirmBtn, #cancelBtn').hide();
        $('#confirmBtn').prop('disabled', true);

        // Show the loading button
        $('#loadBtn').removeClass('hidden');
    });

</script>
@endsection
