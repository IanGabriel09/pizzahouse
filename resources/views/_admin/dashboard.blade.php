@extends('_layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="mb-3 mt-3">
        <h5 class="text-4xl text-center"></h5>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700">
        <div class="p-4 mb-3">
            {{ session('success') }}
        </div>

    </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700">
        <div class="p-4 mb-3">
            {{ session('error') }}
        </div>

    </div>
    @endif
    
    
    <div class="rounded-md bg-gray-100 p-5">
        <div class="flex items-center mb-3">
            {{-- <img src="{{ asset('img/pizza.png') }}" alt="" class="w-24 h-24"> --}}
            <h1 class="text-3xl text-slate-500 mb-3 mx-2">Orders</h1>
        </div>
    
        <!-- Div for Flash messages display only -->
        <div id="flashContainer"></div> <!-- Empty container for flash message -->
    
        <!-- Orders -->
        @foreach ($orders as $order)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('img/pizza.png') }}" alt="" class="h-23 w-auto">
                    <div class="mx-2">
                        <p class="text-slate-500 font-bold">Customer Name:</p>
                        <h1 class="text-xl text-slate-500 mb-3 mx-2">{{ $order->name }}</h1>
                    </div>
                </div>

                <a href="{{ route('viewOrder', $order->id) }}" class="bg-indigo-500 cursor-pointer hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">View</a>
            </div>
        @endforeach

    </div>
</div>


@section('scripts')
<script>
    const orders = @json($orders);

    console.log(orders);

</script>
@endsection
@endsection
