<style>
    .product-empty {
        grid-column: 1 / -1;
        margin: 0;
        padding: 2.5rem 1rem;
        border: 1px solid var(--border);
        color: var(--muted);
        text-align: center;
    }

    .product-card__placeholder {
        width: 100%;
        height: 100%;
        background: var(--panel-soft);
    }

    .product-card__overlay p {
        margin: 0.35rem 0 0;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.82rem;
    }
</style>

<section class="product-grid" aria-label="Products">
    @forelse ($products as $product)
        @php($image = $product->mainImage ?? $product->images->first())
        <a class="product-card" href="{{ route('products.show', $product) }}" aria-label="View {{ $product->name }}">
            @if ($image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}">
            @else
                <div class="product-card__placeholder" aria-hidden="true"></div>
            @endif
            <div class="product-card__overlay">
                <h3>{{ $product->name }}</h3>
                @if ($product->price !== null)
                    <p>₱{{ number_format((float) $product->price, 2) }}</p>
                @endif
            </div>
        </a>
    @empty
        <p class="product-empty">New pieces in this collection are coming soon.</p>
    @endforelse
</section>
