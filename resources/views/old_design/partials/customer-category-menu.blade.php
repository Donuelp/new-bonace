@include('old_design.partials.customer-mobile-nav')

<style>
    .customer-category-menu {
        width: var(--container);
        max-width: 1320px;
        margin: 1.25rem auto 0;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        background: var(--panel);
        box-shadow: var(--shadow);
    }
    .customer-category-menu summary { display: none; }
    .customer-category-menu__links { display: flex; align-items: center; justify-content: center; gap: 0.55rem; flex-wrap: wrap; }
    .customer-category-menu__links a { padding: 0.55rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; color: var(--text); }
    .customer-category-menu__links a:hover, .customer-category-menu__links a.is-active { color: var(--gold); background: var(--gold-soft); }
    @media (max-width: 720px) {
        .customer-category-menu { width: min(100% - 2rem, 640px); padding: 0; overflow: hidden; }
        .customer-category-menu summary { display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.1rem; cursor: pointer; list-style: none; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; }
        .customer-category-menu summary::-webkit-details-marker { display: none; }
        .customer-category-menu summary::after { content: "+"; color: var(--gold); font-size: 1.25rem; }
        .customer-category-menu[open] summary::after { content: "-"; }
        .customer-category-menu__links { justify-content: flex-start; flex-wrap: nowrap; overflow-x: auto; padding: 0 1.1rem 1rem; }
        .customer-category-menu__links a { flex: 0 0 auto; border: 1px solid var(--border); }
    }
</style>

<details class="customer-category-menu" open>
    <summary>Browse Fashion Accessories</summary>
    <nav class="customer-category-menu__links" aria-label="Fashion Accessories categories">
        <a class="{{ $activeCategory === 'components' ? 'is-active' : '' }}" href="{{ route('components') }}">Components</a>
        <a class="{{ $activeCategory === 'necklaces' ? 'is-active' : '' }}" href="{{ route('necklaces') }}">Necklaces</a>
        <a class="{{ $activeCategory === 'clutches' ? 'is-active' : '' }}" href="{{ route('clutches') }}">Clutches</a>
        <a class="{{ $activeCategory === 'bangles' ? 'is-active' : '' }}" href="{{ route('bangles') }}">Bangles</a>
        <a class="{{ $activeCategory === 'earrings' ? 'is-active' : '' }}" href="{{ route('earrings') }}">Earrings</a>
        <a class="{{ $activeCategory === 'shoes' ? 'is-active' : '' }}" href="{{ route('shoes') }}">Shoes</a>
        <a class="{{ $activeCategory === 'beaded-bags' ? 'is-active' : '' }}" href="{{ route('beaded-bags') }}">Beaded Bags</a>
    </nav>
</details>
