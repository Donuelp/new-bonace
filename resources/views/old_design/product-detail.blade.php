<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | Bon-Ace Lifestyle</title>
    <style>
        :root {
            --bg: #fbfaf7;
            --panel: #ffffff;
            --panel-soft: #f4f0e9;
            --text: #24211d;
            --muted: #736d64;
            --border: #e4ded4;
            --gold: #a97f3d;
            --gold-soft: #f3eadb;
            --container: min(1180px, calc(100vw - 3rem));
        }

        * { box-sizing: border-box; }
        body { margin: 0; background: var(--bg); color: var(--text); font-family: Arial, Helvetica, sans-serif; }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }

        .site-header { position: sticky; top: 0; z-index: 10; background: rgba(255, 255, 255, 0.96); border-bottom: 1px solid var(--border); }
        .nav-top { display: flex; align-items: center; justify-content: center; padding: 0.9rem 1rem 0.7rem; }
        .nav__brand { display: inline-flex; padding: 0.5rem; background: #111; }
        .nav__brand img { width: 64px; }
        .nav-bar { width: var(--container); margin: 0 auto; display: flex; justify-content: center; padding: 0.7rem 1rem; border-top: 1px solid var(--border); }
        .nav__links { display: flex; align-items: center; justify-content: center; gap: 1.1rem; }
        .nav__links a { position: relative; padding: 0.35rem 0; color: var(--text); font-size: 0.74rem; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; }
        .nav__links a:hover { color: var(--gold); }
        .nav__divider { width: 1px; height: 1.1rem; background: var(--border); }

        .product-page { width: var(--container); margin: 0 auto; padding: clamp(2rem, 5vw, 4.5rem) 0; }
        .breadcrumb { display: inline-flex; gap: 0.55rem; margin-bottom: 1.5rem; color: var(--muted); font-size: 0.72rem; font-weight: 700; letter-spacing: 0.11em; text-transform: uppercase; }
        .breadcrumb a:hover { color: var(--gold); }
        .product-layout { display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr); gap: clamp(2rem, 6vw, 6rem); align-items: start; }
        .product-gallery { display: grid; gap: 0.8rem; }
        .product-main-image { aspect-ratio: 1 / 1; overflow: hidden; background: var(--panel-soft); }
        .product-main-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-main-image__empty { display: grid; width: 100%; height: 100%; place-items: center; color: var(--muted); font-size: 0.8rem; letter-spacing: 0.08em; text-transform: uppercase; }
        .product-thumbnails { display: flex; gap: 0.65rem; overflow-x: auto; padding-bottom: 0.2rem; }
        .product-thumbnail { flex: 0 0 76px; height: 76px; padding: 0; border: 1px solid var(--border); background: var(--panel); cursor: pointer; overflow: hidden; }
        .product-thumbnail img { width: 100%; height: 100%; object-fit: cover; }
        .product-thumbnail.is-active { border: 2px solid var(--gold); }
        .product-info { padding: clamp(0rem, 2vw, 1rem) 0; }
        .product-category { margin: 0 0 0.85rem; color: var(--gold); font-size: 0.72rem; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; }
        .product-info h1 { margin: 0; font-size: clamp(2rem, 4vw, 3.6rem); font-weight: 500; line-height: 1.06; }
        .product-price { margin: 1.25rem 0; color: var(--text); font-size: 1.1rem; font-weight: 700; }
        .product-description { max-width: 38rem; margin: 0; color: var(--muted); line-height: 1.75; white-space: pre-line; }
        .product-meta { display: grid; gap: 0.85rem; margin: 2rem 0 0; padding: 1.25rem 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
        .product-meta div { display: flex; justify-content: space-between; gap: 1rem; font-size: 0.82rem; }
        .product-meta dt { color: var(--muted); }
        .product-meta dd { margin: 0; font-weight: 700; text-align: right; }
        .product-inquiry { display: inline-flex; justify-content: center; margin-top: 1.5rem; padding: 0.95rem 1.3rem; background: var(--text); color: #fff; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; }
        .product-inquiry:hover { background: var(--gold); }

        @media (max-width: 760px) {
            :root { --container: min(100% - 2rem, 640px); }
            .product-layout { grid-template-columns: 1fr; gap: 1.75rem; }
            .product-info { padding: 0; }
            .product-thumbnail { flex-basis: 64px; height: 64px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="nav-top">
            <a class="nav__brand" href="{{ route('home') }}" aria-label="Bon-Ace homepage">
                <img src="{{ asset('images/landing-images/bon-ace-logo.jpg') }}" alt="Bon-Ace Lifestyle logo">
            </a>
        </div>
        <nav class="nav-bar" aria-label="Primary">
            <div class="nav__links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#about">Craftsmanship</a>
                <a href="{{ route('home') }}#materials">Materials</a>
                <a href="{{ route('home') }}#cta">Contact Us</a>
                <span class="nav__divider" aria-hidden="true"></span>
                <a href="{{ route('fashion-accessories') }}">Fashion Accessories</a>
                <a href="{{ route('home') }}#categories">Home Décor</a>
                <a href="{{ route('home') }}#categories">Accent Furniture</a>
                <a href="{{ route('home') }}#categories">Lighting</a>
            </div>
        </nav>
    </header>
    @include('old_design.partials.customer-mobile-nav')

    @php($mainImage = $product->mainImage ?? $product->images->first())
    @php($images = $mainImage ? $product->images->reject(fn ($image) => $image->id === $mainImage->id)->prepend($mainImage) : $product->images)
    <main class="product-page">
        <div class="breadcrumb">
            <a href="{{ route('fashion-accessories') }}">Fashion Accessories</a>
            <span>/</span>
            <a href="{{ route(str($product->category)->lower()->replace(' ', '-')->toString()) }}">{{ $product->category }}</a>
        </div>

        <div class="product-layout">
            <section class="product-gallery" aria-label="Product images">
                <div class="product-main-image">
                    @if ($mainImage)
                        <img id="product-main-image" src="{{ asset('storage/' . $mainImage->path) }}" alt="{{ $product->name }}">
                    @else
                        <div class="product-main-image__empty">Image coming soon</div>
                    @endif
                </div>

                @if ($images->isNotEmpty())
                    <div class="product-thumbnails" aria-label="Select product image">
                        @foreach ($images as $image)
                            <button
                                class="product-thumbnail {{ $mainImage && $image->id === $mainImage->id ? 'is-active' : '' }}"
                                type="button"
                                data-image-src="{{ asset('storage/' . $image->path) }}"
                                aria-label="View image {{ $loop->iteration }}"
                            >
                                <img src="{{ asset('storage/' . $image->path) }}" alt="">
                            </button>
                        @endforeach
                    </div>
                @endif
            </section>

            <section class="product-info">
                @if ($product->category)
                    <p class="product-category">{{ $product->category }}</p>
                @endif
                <h1>{{ $product->name }}</h1>
                @if ($product->price !== null)
                    <p class="product-price">₱{{ number_format((float) $product->price, 2) }}</p>
                @endif
                @if ($product->description)
                    <p class="product-description">{{ $product->description }}</p>
                @endif
                <dl class="product-meta">
                    @if ($product->sku)
                        <div><dt>Product code</dt><dd>{{ $product->sku }}</dd></div>
                    @endif
                    @if ($product->category)
                        <div><dt>Category</dt><dd>{{ $product->category }}</dd></div>
                    @endif
                </dl>
                <a class="product-inquiry" href="{{ route('home') }}#cta">Make an inquiry</a>
            </section>
        </div>
    </main>

    @include('old_design.partials.customer-footer')

    <script>
        document.querySelectorAll('.product-thumbnail').forEach(function (thumbnail) {
            thumbnail.addEventListener('click', function () {
                const mainImage = document.getElementById('product-main-image');
                if (!mainImage) return;

                mainImage.src = thumbnail.dataset.imageSrc;
                document.querySelectorAll('.product-thumbnail').forEach(function (item) {
                    item.classList.toggle('is-active', item === thumbnail);
                });
            });
        });
    </script>
</body>
</html>
