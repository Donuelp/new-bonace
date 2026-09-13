<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Accessories - Bon-Ace</title>
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

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--border);
            transition: box-shadow 300ms ease;
        }

        .site-header.is-scrolled {
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
        }

        .nav-top {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.9rem 1rem 0.7rem;
            overflow: hidden;
            max-height: 120px;
            transition: max-height 320ms ease, padding 320ms ease;
        }

        .site-header.is-scrolled .nav-top {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        .nav__brand {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            background: rgba(0, 0, 0, 0.92);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            flex-shrink: 0;
        }

        .nav__brand img {
            width: 64px;
            height: auto;
            display: block;
        }

        .nav-bar {
            width: var(--container);
            max-width: 1320px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.1rem;
            padding: 0.7rem clamp(1rem, 2vw, 2.5rem);
            border-top: 1px solid var(--border);
        }

        .nav__links {
            display: flex;
            align-items: center;
            white-space: nowrap;
            justify-content: center;
            gap: 1.1rem;
        }

        .nav__links a {
            position: relative;
            padding: 0.35rem 0;
            font-size: 0.74rem;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--text);
            transition: color 200ms ease;
        }

        .nav__links a::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 100%;
            height: 1px;
            background: var(--gold);
            transform: translateX(-50%) scaleX(0);
            transform-origin: center;
            transition: transform 280ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .nav__links a:hover {
            color: var(--gold);
        }

        .nav__links a:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav__divider {
            width: 1px;
            height: 1.1rem;
            background: var(--border);
            flex-shrink: 0;
        }

        .section {
            width: var(--container);
            margin: 0 auto;
            padding: 1.5rem 0 0;
        }

        .hero {
            width: var(--container);
            margin: 0 auto;
            padding: 6rem 0 0;
        }

        .hero__inner {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            align-items: stretch;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
            border-radius: var(--radius-lg);
        }

        .hero__panel {
            background: #111111;
            padding: clamp(2rem, 5vw, 5rem);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero__panel .eyebrow {
            margin: 0 0 1rem;
            color: var(--gold);
            font-size: 0.8rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }

        .hero__panel h1 {
            margin: 0;
            font-size: clamp(2.8rem, 6vw, 5.6rem);
            line-height: 0.96;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            color: #ffffff;
        }

        .hero__panel p {
            margin: 1.5rem 0 0;
            max-width: 34rem;
            color: rgba(255, 255, 255, 0.75);
            font-size: clamp(0.95rem, 1.3vw, 1.1rem);
            line-height: 1.8;
        }

        .hero__panel .hero__actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero__panel .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0.9rem 1.35rem;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: #16120d;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-radius: var(--radius-sm);
        }

        .hero__panel .button--ghost {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .hero__visual {
            overflow: hidden;
            min-height: 580px;
        }

        .hero__visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .catalog__inner {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            align-items: stretch;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
            border-radius: var(--radius-lg);
            min-height: 520px;
        }

        .catalog {
            padding-bottom: 1rem;
        }

        .catalog__visual {
            overflow: hidden;
            aspect-ratio: 1240 / 631;
            min-height: 100%;
            position: relative;
        }

        .catalog__visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .catalog__overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: clamp(1.5rem, 4vw, 4rem);
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0.55) 100%);
        }

        .catalog__overlay h3 {
            margin: 0;
            font-size: clamp(1.6rem, 3vw, 2.6rem);
            line-height: 1.1;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #ffffff;
            max-width: 24rem;
        }

        .catalog__overlay p {
            margin: 1rem 0 0;
            max-width: 32rem;
            color: #ffffff;
            font-size: clamp(0.85rem, 1.2vw, 1rem);
            font-weight: 500;
            line-height: 1.7;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.55);
        }

        .catalog__overlay-btn {
            margin-top: 1.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0.85rem 1.4rem;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: #16120d;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            border-radius: var(--radius-sm);
            transition: background 200ms ease, color 200ms ease;
        }

        .catalog__overlay-btn:hover {
            background: transparent;
            color: #ffffff;
        }

        .catalog__panel {
            background: #111111;
            padding: clamp(2rem, 5vw, 5rem);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .catalog__card {
            position: relative;
            width: 97%;
            aspect-ratio: 32 / 5;
            margin-top: auto;
            margin-bottom: 1.5rem;
            margin-left: auto;
            margin-right: auto;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
        }

        .catalog__item-img {
            position: absolute;
            width: min(30%, 220px);
            height: auto;
            bottom: 40%;
            transform: translateX(-50%);
            display: block;
            z-index: 1;
        }

        .catalog__item-img:nth-of-type(1) { left: 16.67%; }
        .catalog__item-img:nth-of-type(2) { left: 50%; }
        .catalog__item-img:nth-of-type(3) { left: 83.33%; }

        .catalog__panel .catalog__item-title {
            position: absolute;
            bottom: 0.5rem;
            left: 16.67%;
            width: min(30%, 220px);
            margin: 0;
            text-align: center;
            transform: translateX(-50%);
            color: #181512;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            z-index: 2;
        }

        .catalog__panel .catalog__item-title:nth-of-type(2) { left: 50%; }
        .catalog__panel .catalog__item-title:nth-of-type(3) { left: 83.33%; }

        .categories {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .category-card {
            background: var(--panel);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
            border-radius: var(--radius-md);
            cursor: pointer;
        }

        .category-card__media {
            position: relative;
            aspect-ratio: 4 / 5;
            overflow: hidden;
        }

        .category-card__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.02);
            transition: transform 420ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .category-card:hover .category-card__media img {
            transform: scale(1.08);
        }

        .category-card__overlay {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            padding: 2.8rem 1.5rem 1.7rem;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.74) 100%);
        }

        .category-card__tag {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.78rem;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: #ffffff;
        }

        .category-card__overlay h3 {
            position: relative;
            display: inline-block;
            margin: 0;
            padding: 0 0 0.5rem;
            font-size: 1.05rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #ffffff;
            transition: color 220ms ease;
        }

        .category-card__overlay h3::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -0.35rem;
            width: calc(100% + 0.7rem);
            height: 3px;
            background: var(--gold);
            transform: translateX(-50%) scaleX(0);
            transform-origin: center;
            transition: transform 280ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .category-card:hover .category-card__overlay h3 {
            color: var(--gold);
        }

        .category-card:hover .category-card__overlay h3::after {
            transform: translateX(-50%) scaleX(1);
        }

        .page-layout {
            width: var(--container);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 2.5rem;
            padding: 1.5rem 0 0;
        }

        .sidebar {
            position: sticky;
            top: 120px;
            align-self: start;
        }

        .sidebar__title {
            margin: 3rem 0 1.25rem;
            padding-bottom: 0.5rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--gold);
            border-bottom: 2px solid var(--gold);
        }

        .sidebar__list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar__list li {
            border-bottom: 1px solid var(--border);
        }

        .sidebar__list a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            font-size: 0.92rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            color: var(--text);
            transition: color 200ms ease, padding-left 200ms ease;
        }

        .sidebar__list a::after {
            content: "→";
            font-size: 0.85rem;
            color: var(--muted);
            transition: color 200ms ease, transform 200ms ease;
        }

        .sidebar__list a:hover {
            color: var(--gold);
            padding-left: 0.5rem;
        }

        .sidebar__list a:hover::after {
            color: var(--gold);
            transform: translateX(3px);
        }

        .sidebar__list a.is-active {
            color: var(--gold);
            font-weight: 700;
        }

        .sidebar__list a.is-active::after {
            color: var(--gold);
        }

        .page-content {
            min-height: 400px;
            padding: 1rem 0 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            padding: 0;
            margin: 2rem auto;
            max-width: calc(var(--container));
        }

        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-sm);
            aspect-ratio: 1 / 1;
            cursor: pointer;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 420ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        .product-card__overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1rem;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.55) 100%);
        }

        .product-card__overlay h3 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #ffffff;
        }

        .product-grid > :last-child {
            margin: 0 auto;
        }

        @media (max-width: 980px) {
            .page-layout {
                grid-template-columns: 220px 1fr;
                gap: 1.5rem;
            }
            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 720px) {
            .page-layout {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .sidebar {
                position: static;
            }
            .sidebar__list a {
                padding: 0.5rem 0;
                font-size: 0.85rem;
            }
            .nav-top {
                padding: 0.6rem 1rem 0.5rem;
            }
            .nav__brand img {
                width: 56px;
            }
            .nav-bar {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.6rem;
                padding: 0.6rem 1rem;
            }
            .nav__links {
                flex-wrap: wrap;
                gap: 0.9rem;
            }
            .nav__divider {
                display: none;
            }
            .hero {
                padding-top: 1rem;
            }
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }
            .product-grid > :last-child {
                margin: 0 auto;
            }
        }

        .sidebar__divider {
            margin: 4rem 0;
        }

        .page-content {
            min-height: 400px;
            padding: 1rem 0 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            padding: 0;
        }

        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-sm);
            aspect-ratio: 1 / 1;
            cursor: pointer;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 420ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        .product-card__overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.5rem;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);
        }

        .product-card__overlay h3 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #ffffff;
        }

        .product-card__overlay p {
            margin: 0.4rem 0 0;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .product-grid > :last-child {
            margin: 0 auto;
        }

        @media (max-width: 720px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .product-grid > :last-child {
                grid-column: 1;
                width: 100%;
                justify-self: stretch;
            }
        }

        @media (max-width: 980px) {
            .categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .catalog__inner {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 980px) {
            .page-layout {
                grid-template-columns: 220px 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 720px) {
            .page-layout {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .sidebar {
                position: static;
            }

            .sidebar__list a {
                padding: 0.5rem 0;
                font-size: 0.85rem;
            }

            .nav-top {
                padding: 0.6rem 1rem 0.5rem;
            }

            .nav__brand img {
                width: 56px;
            }

            .nav-bar {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.6rem;
                padding: 0.6rem 1rem;
            }

            .nav__links {
                flex-wrap: wrap;
                gap: 0.9rem;
            }

            .nav__divider {
                display: none;
            }

            .hero {
                padding-top: 1rem;
            }

            .section {
                padding-top: 1rem;
            }

            .hero__inner {
                position: relative;
                display: block;
                min-height: 540px;
            }

            .hero__panel,
            .hero__visual {
                position: absolute;
                inset: 0;
            }

            .hero__panel {
                z-index: 2;
                padding: 1.5rem;
                background: linear-gradient(180deg, rgba(17, 17, 17, 0.10) 0%, rgba(17, 17, 17, 0.38) 100%);
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .hero__panel h1 {
                width: 100%;
                max-width: none;
                font-size: clamp(1.9rem, 8vw, 2.8rem);
                line-height: 0.92;
                letter-spacing: 0.03em;
            }

            .hero__panel h1 span {
                display: block;
                line-height: 0.96;
            }

            .hero__panel h1 span:nth-child(2) {
                font-size: 0.7em;
                margin: 0.1rem 0;
            }

            .hero__panel p {
                font-size: 0.92rem;
                max-width: none;
            }

            .hero__panel .hero__actions {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
                max-width: 18rem;
            }

            .hero__panel .button {
                width: 100%;
            }

            .hero__visual {
                z-index: 1;
                min-height: 0;
            }

            .hero__visual img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .catalog--desktop {
                display: none;
            }

            .catalog--mobile {
                display: block;
            }

            .categories {
                grid-template-columns: 1fr;
                gap: 0.85rem;
            }

            .category-card__overlay h3 {
                font-size: 0.95rem;
            }
        }

        .page-layout > section,
        .page-layout > .product-grid {
            grid-column: 2;
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

    <main class="page-layout">
        <aside class="sidebar">
            <p class="sidebar__title">Fashion Accessories</p>
            <ul class="sidebar__list">
                <li><a href="{{ route('components') }}">Components</a></li>
                <li><a href="{{ route('necklaces') }}">Necklaces</a></li>
                <li><a href="{{ route('clutches') }}">Clutches</a></li>
                <li><a href="{{ route('bangles') }}">Bangles</a></li>
                <li><a href="{{ route('earrings') }}">Earrings</a></li>
                <li><a href="{{ route('shoes') }}">Shoes</a></li>
                <li><a href="{{ route('beaded-bags') }}">Beaded Bags</a></li>
            </ul>
            <div class="sidebar__divider"></div>
            <p class="sidebar__title">Product Categories</p>
            <ul class="sidebar__list">
                <li><a href="#categories">Home Décor</a></li>
                <li><a href="#categories">Accent Furniture</a></li>
                <li><a href="#categories">Lighting</a></li>
            </ul>
        </aside>

        <div class="page-content">
            <div class="product-grid">
                <a class="product-card" href="{{ route('components') }}">
                    <img src="{{ asset('images/fashion-accessories/components.jpg') }}" alt="Components">
                    <div class="product-card__overlay">
                        <h3>Components</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('necklaces') }}">
                    <img src="{{ asset('images/fashion-accessories/necklaces.jpg') }}" alt="Necklaces">
                    <div class="product-card__overlay">
                        <h3>Necklaces</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('clutches') }}">
                    <img src="{{ asset('images/fashion-accessories/clutches.jpg') }}" alt="Clutches">
                    <div class="product-card__overlay">
                        <h3>Clutches</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('bangles') }}">
                    <img src="{{ asset('images/fashion-accessories/bangles.jpg') }}" alt="Bangles">
                    <div class="product-card__overlay">
                        <h3>Bangles</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('earrings') }}">
                    <img src="{{ asset('images/fashion-accessories/earrings.jpg') }}" alt="Earrings">
                    <div class="product-card__overlay">
                        <h3>Earrings</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('shoes') }}">
                    <img src="{{ asset('images/fashion-accessories/shoes.jpg') }}" alt="Shoes">
                    <div class="product-card__overlay">
                        <h3>Shoes</h3>
                    </div>
                </a>
                <a class="product-card" href="{{ route('beaded-bags') }}">
                    <img src="{{ asset('images/fashion-accessories/beaded-bags.jpg') }}" alt="Beaded Bags">
                    <div class="product-card__overlay">
                        <h3>Beaded Bags</h3>
                    </div>
                </a>
            </div>
        </div>
    </main>

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
