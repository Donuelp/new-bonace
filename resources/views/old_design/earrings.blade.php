<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Earrings - Bon-Ace</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #ffffff;
            --panel: #ffffff;
            --text: #181512;
            --muted: rgba(24, 21, 18, 0.62);
            --gold: #c9a227;
            --gold-soft: rgba(201, 162, 39, 0.14);
            --border: rgba(24, 21, 18, 0.08);
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            --radius-lg: 28px;
            --radius-md: 20px;
            --radius-sm: 14px;
            --container: calc(100vw - 3rem);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; background: var(--bg); color: var(--text); }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }

        .site-header {
            position: sticky; top: 0; z-index: 10;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--border);
            transition: box-shadow 300ms ease;
        }
        .site-header.is-scrolled { box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08); }
        .nav-top { display: flex; justify-content: center; align-items: center; padding: 0.9rem 1rem 0.7rem; overflow: hidden; max-height: 120px; transition: max-height 320ms ease, padding 320ms ease; }
        .nav__brand { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem; background: rgba(0, 0, 0, 0.92); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12); flex-shrink: 0; }
        .nav__brand img { width: 64px; height: auto; display: block; }
        .nav-bar { width: var(--container); max-width: 1320px; margin: 0 auto; display: flex; justify-content: center; align-items: center; gap: 1.1rem; padding: 0.7rem clamp(1rem, 2vw, 2.5rem); border-top: 1px solid var(--border); }
        .nav__links { display: flex; align-items: center; white-space: nowrap; justify-content: center; gap: 1.1rem; }
        .nav__links a { position: relative; padding: 0.35rem 0; font-size: 0.74rem; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text); transition: color 200ms ease; }
        .nav__links a::after { content: ""; position: absolute; left: 50%; bottom: 0; width: 100%; height: 1px; background: var(--gold); transform: translateX(-50%) scaleX(0); transform-origin: center; transition: transform 280ms cubic-bezier(0.22, 1, 0.36, 1); }
        .nav__links a:hover { color: var(--gold); }
        .nav__links a:hover::after { transform: translateX(-50%) scaleX(1); }
        .nav__divider { width: 1px; height: 1.1rem; background: var(--border); flex-shrink: 0; }

        .hero { width: var(--container); margin: 0 auto; padding: 5rem 0 0; text-align: center; }
        .hero h1 { margin: 0; font-size: clamp(2.5rem, 5vw, 4.5rem); text-transform: uppercase; letter-spacing: 0.04em; color: var(--text); }
        .hero p { margin: 1rem 0 0; color: var(--muted); font-size: 1rem; max-width: 40rem; margin-left: auto; margin-right: auto; }

        .product-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.75rem; padding: 0; margin: 2rem auto; max-width: calc(var(--container)); }
        .product-card { position: relative; overflow: hidden; border-radius: var(--radius-sm); aspect-ratio: 1 / 1; cursor: pointer; }
        .product-card img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 420ms cubic-bezier(0.22, 1, 0.36, 1); }
        .product-card:hover img { transform: scale(1.08); }
        .product-card__overlay { position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem; background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.55) 100%); }
        .product-card__overlay h3 { margin: 0; font-size: 0.9rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #ffffff; }

        @media (max-width: 980px) { .product-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 720px) {
            .nav-top { padding: 0.6rem 1rem 0.5rem; }
            .nav__brand img { width: 56px; }
            .nav-bar { flex-wrap: wrap; justify-content: center; gap: 0.6rem; padding: 0.6rem 1rem; }
            .nav__links { flex-wrap: wrap; gap: 0.9rem; }
            .nav__divider { display: none; }
            .hero { padding-top: 1rem; }
            .product-grid { grid-template-columns: repeat(2, 1fr); gap: 0.5rem; }
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
                <a href="#banner">Home</a>
                <a href="#about">Craftsmanship</a>
                <a href="#materials">Materials</a>
                <a href="#cta">Contact Us</a>
                <span class="nav__divider" aria-hidden="true"></span>
                <a href="{{ route('fashion-accessories') }}">Fashion Accessories</a>
                <a href="#categories">Home Décor</a>
                <a href="#categories">Accent Furniture</a>
                <a href="#categories">Lighting</a>
            </div>
        </nav>
    </header>
    @include('old_design.partials.customer-category-menu', ['activeCategory' => 'earrings'])
    <main>
        <section class="hero">
            <h1>Earrings</h1>
            <p>Discover our exclusive collection of earrings at Bon-Ace.</p>
        </section>
        @include('old_design.partials.customer-product-grid')
    </main>
    @include('old_design.partials.customer-footer')
    <script>
        (function () {
            const header = document.querySelector('.site-header');
            let scrolled = window.scrollY > 100;
            header.classList.toggle('is-scrolled', scrolled);
            const onScroll = function () {
                const next = scrolled ? window.scrollY > 40 : window.scrollY > 100;
                if (next !== scrolled) {
                    scrolled = next;
                    header.classList.toggle('is-scrolled', scrolled);
                }
            };
            window.addEventListener('scroll', onScroll, { passive: true });
        })();
    </script>
</body>
</html>
