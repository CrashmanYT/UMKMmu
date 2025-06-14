@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Detail Pesanan</h2>

    <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>

    <hr class="my-4">

    <h3 class="text-lg font-semibold mb-2">Daftar Produk:</h3>
    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Nama Produk</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Harga</th>
                <th class="p-2 border">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td class="p-2 border">{{ $item->product->name }}</td>
                <td class="p-2 border">{{ $item->quantity }}</td>
                <td class="p-2 border">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="p-2 border">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
