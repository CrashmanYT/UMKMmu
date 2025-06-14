@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-4">
  <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

  @forelse ($cartItems as $item)
    <div class="flex justify-between items-center border-b py-4">
      <div class="flex gap-4 items-center">
        <img src="{{ $item->product->image }}" class="w-16 h-16 rounded" alt="{{ $item->product->name }}">
        <div>
          <p class="font-semibold">{{ $item->product->name }}</p>
          <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
        </div>
      </div>
      <form action="{{ route('cart.remove', $item) }}" method="POST">
        @csrf @method('DELETE')
        <button class="text-red-500 hover:underline">Hapus</button>
      </form>
    </div>
  @empty
    <p class="text-gray-500">Keranjangmu kosong.</p>
  @endforelse

  @if ($cartItems->count())
    <form action="{{ route('cart.checkout') }}" method="POST" class="mt-6 text-right">
      @csrf
      <button class="btn btn-primary">Checkout</button>
    </form>
  @endif
</div>
@endsection
