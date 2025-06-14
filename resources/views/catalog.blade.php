@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body>
    <div class="bg-base-100">
    </div>
    <div class="flex justify-center mt-36 mb-10">
        <form method="GET" action="{{ route('catalog.index') }}">
            <div class="join w-96">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="input input-bordered join-item w-full"
                    placeholder="Cari produk..."
                />
                <select
                    name="category"
                    class="select select-bordered join-item w-36"
                    onchange="this.form.submit()"
                >
                    <option value="all">Filter</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>


    <section class="max-w-7xl mx-auto px-4 pb-20">
        <h1 class="text-3xl font-bold text-center text-base-content mb-8">Katalog Produk UMKM</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
  <div class="card ...">
    <figure>
      <img src="{{ $product->image }}" ... />
    </figure>
    <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p>{{ Str::limit($product->description, 60) }}</p>
      <div class="card-actions">
        <a href="{{ route('catalog.show', $product->id) }}" class="btn btn-primary btn-sm">Lihat</a>

      </div>
    </div>
  </div>
@endforeach
        </div>
    </section>
    </body>
</html>
@endsection
