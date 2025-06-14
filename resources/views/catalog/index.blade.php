@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-20">
  <h2 class="text-2xl font-bold mb-8">Katalog Produk</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($products as $product)
      <div class="card group hover:shadow-sm sm:max-w-sm">
        <figure>
          <img src="{{ $product->image }}" alt="{{ $product->name }}" class="transition-transform duration-500 group-hover:scale-110" />
        </figure>
        <div class="card-body">
          <h5 class="card-title mb-2.5">{{ $product->name }}</h5>
          <p class="mb-6">{{ Str::limit($product->description, 60) }}</p>
          <div class="text-sm text-gray-500 mb-2">Kategori: {{ $product->category }}</div>
          <div class="card-actions">
            <a href="#" class="btn btn-primary">Lihat</a>
          </div>
        </div>
      </div>
    @empty
      <p>Tidak ada produk untuk kategori ini.</p>
    @endforelse
  </div>
</div>
@endsection
