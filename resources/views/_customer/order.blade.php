@extends('_layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="rounded-md bg-gray-100 mt-5 p-5">
        <div class="flex items-center mb-3">
            {{-- <img src="{{ asset('img/pizza.png') }}" alt="" class="w-24 h-24"> --}}
            <img src="{{ asset('img/pizza.png') }}" alt="" class="w-24 h-24">
            <h1 class="text-3xl text-slate-500 mb-3 mx-2">Order Your Pizza</h1>
        </div>

        <!-- Div for Flash messages display only -->
        <div id="flashContainer"></div> <!-- Empty container for flash message -->
    
        <!-- Customer order form -->
        <form id="pizzaForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input 
                        id="name" 
                        name="name"
                        type="text" 
                        placeholder="Enter your name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                
                
                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    <input 
                        id="address" 
                        name="address"
                        type="text" 
                        placeholder="Enter your address" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                
                
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input 
                        id="email"
                        name="email"
                        type="email" 
                        placeholder="Enter your email" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                
        
                <!-- Contact Field -->
                <div class="mb-4">
                    <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact</label>
                    <input 
                        id="contact" 
                        name="contact"
                        type="text" 
                        placeholder="Enter your contact number" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                
            </div>
        
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Pizza Type Field -->
                <div class="mb-4">
                    <label for="pizza-type" class="block text-gray-700 text-sm font-bold mb-2">Pizza Type</label>
                    <select 
                        id="pizza-type"
                        name="pizza_type" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        
                        <option value="" selected disabled>Select a pizza type</option>
                        <option value="margherita">Margherita</option>
                        <option value="pepperoni">Pepperoni</option>
                        <option value="hawaiian">Hawaiian</option>
                        <option value="veggie">Veggie</option>
                    </select>
                </div>
        
                <!-- Pizza Size Field -->
                <div class="mb-4">
                    <label for="pizza-size" class="block text-gray-700 text-sm font-bold mb-2">Pizza Size</label>
                    <select 
                        id="pizza-size"
                        name="pizza_size"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        
                        <option value="" selected disabled>Select pizza size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
        
                <!-- Crust Type Field -->
                <div class="mb-4">
                    <label for="crust-type" class="block text-gray-700 text-sm font-bold mb-2">Crust Type</label>
                    <select 
                        id="crust-type"
                        name="crust_type" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        
                        <option value="" selected disabled>Select crust type</option>
                        <option value="thin">Thin Crust</option>
                        <option value="thick">Thick Crust</option>
                        <option value="stuffed">Stuffed Crust</option>
                    </select>
                </div>

                <!-- Toppings Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Toppings</label>
                    <div class="block sm:flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-500" name="toppings[]" value="cheese">
                            <span class="ml-2">Cheese</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-500" name="toppings[]" value="mushrooms">
                            <span class="ml-2">Mushrooms</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-500" name="toppings[]" value="olives">
                            <span class="ml-2">Olives</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-500" name="toppings[]" value="peppers">
                            <span class="ml-2">Peppers</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Price Display -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Total Price</label>
                <div id="price" class="text-xl font-semibold text-indigo-500">0.00</div>
                <!-- Hidden input for the total price -->
                <input type="hidden" name="total_price" id="total_price" value="0.00">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-4">
                <button
                    id="submitBtn" 
                    type="submit" 
                    class="w-full md:w-auto bg-indigo-500 cursor-pointer hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>

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

        </form>
    </div>
</div>

@section('scripts')
<script>
    const pizzaPrices = {
        margherita: 8.00,
        pepperoni: 9.00,
        hawaiian: 9.50,
        veggie: 7.50,
    };

    const sizePrices = {
        small: 0,
        medium: 2.00,
        large: 4.00,
    };

    const crustPrices = {
        thin: 0,
        thick: 1.50,
        stuffed: 3.00,
    };

    const toppingPrices = {
        cheese: 1.00,
        mushrooms: 1.50,
        olives: 1.00,
        peppers: 1.20,
    };

    // Updates total price hidden field
    function updatePrice() {
        const pizzaType = $('#pizza-type').val();
        const pizzaSize = $('#pizza-size').val();
        const crustType = $('#crust-type').val();
        const selectedToppings = $('input[name="toppings[]"]:checked') // Fix to get the correct input for toppings
                                .map(function() {
                                    return $(this).val();
                                })
                                .get();

        let totalPrice = 0;

        if (pizzaType) totalPrice += pizzaPrices[pizzaType] || 0;
        if (pizzaSize) totalPrice += sizePrices[pizzaSize] || 0;
        if (crustType) totalPrice += crustPrices[crustType] || 0;
        
        // Add the price for each selected topping
        selectedToppings.forEach(topping => {
            totalPrice += toppingPrices[topping] || 0;
        });

        // Update the total price display and the hidden input
        $('#price').text(totalPrice.toFixed(2));
        $('#total_price').val(totalPrice.toFixed(2));
    }

    // Function to display flash messages
    function displayFlashMessage(message, type) {
        const messageClass = type === 'success' ? 'bg-green-100 border-l-4 border-green-500 text-green-700' : 'bg-red-100 border-l-4 border-red-500 text-red-700';
        const messageHtml = `<div class="${messageClass} p-4 mb-3" role="alert">${message}</div>`;
        $('#flashContainer').html(messageHtml);
    }

    $('#pizzaForm').on('submit', function(e) {
        e.preventDefault();

        $('#loadBtn').removeClass('hidden');
        $('#submitBtn').addClass('hidden');

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route('postOrder') }}', // Ensure this is the correct route
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#loadBtn').addClass('hidden');
                $('#submitBtn').removeClass('hidden');

                // Display the flash message from the response
                displayFlashMessage(response.message, response.status);
            },
            error: function(xhr) {
                $('#loadBtn').addClass('hidden');
                $('#submitBtn').removeClass('hidden');
                displayFlashMessage('There was an internal server error. Please try again.', 'error');
            }
        });
    });

    // Wait until the DOM is ready
    $(document).ready(function() {
        $('#pizzaForm').on('change', updatePrice); // Listen for changes
    });
</script>
@endsection
@endsection
