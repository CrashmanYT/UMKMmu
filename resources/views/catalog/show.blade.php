@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-20 px-4 space-y-16">

    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
        
        <div>
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded-xl w-full shadow" />
        </div>

        
        <div>
            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-2">Kategori: <span class="font-medium">{{ $product->category }}</span></p>
            <p class="text-base mb-4">{{ $product->description }}</p>

            <p class="text-2xl font-semibold text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mb-4">Dijual oleh: <strong>{{ $product->seller->store_name ?? '-' }}</strong></p>

            <div class="flex gap-4">
                <button class="btn btn-primary">Beli Sekarang</button>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline">Tambahkan ke Keranjang</button>
                </form>

            </div>
        </div>
    </div>

    
    <section>
        
        <div class="bg-white rounded-xl p-4 shadow mb-6">
            <form method="POST" action="#">
                @csrf
                <textarea
                    name="comment"
                    rows="3"
                    class="w-full p-3 border rounded-lg resize-none focus:outline-none focus:ring focus:border-primary"
                    placeholder="Tulis ulasan atau pertanyaan..."></textarea>

                <div class="flex justify-between items-center mt-3">
                    <div class="text-sm text-gray-500">
                        Komentar akan ditampilkan setelah ditinjau.
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Komentar ({{ $product->reviews->count() }})</h2>
            <div class="text-sm text-gray-500">Sort: <a href="#" class="underline">Terbaru</a></div>
        </div>

        <div class="space-y-4 mb-36">
            @forelse($product->reviews as $review)
                <div class="bg-white border rounded-lg p-4 shadow">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                            <div>
                                <p class="font-semibold text-sm">{{ $review->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="text-yellow-500 text-sm">
                            @for ($i = 1; $i <= 5; $i++)
                                <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
                            @endfor
                        </div>
                    </div>
                    <p class="text-sm text-gray-700 mt-2">{{ $review->comment }}</p>
                    <div class="text-xs text-gray-500 mt-3 flex gap-4">
                        <span class="hover:text-primary cursor-pointer">👍 {{ rand(1, 20) }}</span>
                        <span class="hover:text-primary cursor-pointer">Reply</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar untuk produk ini.</p>
            @endforelse
        </div>
    </section>
</div>
@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
