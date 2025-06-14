<div>
    <div class="card group hover:shadow-sm sm:max-w-sm">
    <figure>
      <img src="https://cdn.flyonui.com/fy-assets/components/card/image-8.png" alt="Shoes" class="transition-transform duration-500 group-hover:scale-110" />
    </figure>
    <div class="card-body">
      <h5 class="card-title mb-2.5">{{ $title }}</h5>
      <p class="mb-6">{{ $description }}</p>
      <div class="card-actions">
        <button class="btn btn-primary">Buy Now</button>
        <button class="btn btn-soft">Add to cart</button>
      </div>
      @if (isset($footer))
      <div class="text-sm text-muted">
          {{ $footer }}
      </div>
  @endif
    </div>
  </div>
</div>