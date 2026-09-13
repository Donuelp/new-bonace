<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bon-Ace Lifestyle</title>
    <style>
        :root {
            color-scheme: dark;
            --page-padding: clamp(1rem, 3vw, 2rem);
            --card-radius: 28px;
            --card-shadow: 0 24px 60px rgba(0, 0, 0, 0.38);
            --panel-bg: rgba(255, 255, 255, 0.06);
            --panel-border: rgba(255, 255, 255, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            background: #050505;
            color: #f5f0e8;
            overflow: hidden;
        }

        body {
            min-height: 100vh;
        }

        .landing {
            position: relative;
            height: 100vh;
            overflow: hidden;
            isolation: isolate;
            background: #050505;
        }

        .landing__bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: saturate(0.95) contrast(1.05);
            transform: scale(1.03);
        }

        .landing__overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at center, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.58) 72%),
                linear-gradient(180deg, rgba(0, 0, 0, 0.18), rgba(0, 0, 0, 0.42));
        }

        .landing__dividers {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
        }

        .landing__dividers::before,
        .landing__dividers::after {
            content: "";
            position: absolute;
            background: rgba(0, 0, 0, 0.45);
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.04);
        }

        .landing__dividers::before {
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            transform: translateX(-2px);
        }

        .landing__dividers::after {
            left: 0;
            right: 0;
            top: 50%;
            height: 4px;
            transform: translateY(-2px);
        }

        .landing__content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 0;
            padding: 0;
        }

        .hero-card,
        .hero-center {
            position: relative;
        }

        .hero-card {
            overflow: hidden;
            min-width: 0;
            min-height: 0;
            cursor: pointer;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            inset: 0;
            border: 4px solid rgba(0, 0, 0, 0.38);
            box-sizing: border-box;
            pointer-events: none;
            transition: border-color 180ms ease, box-shadow 180ms ease;
        }

        .hero-card:hover::after {
            border-color: rgba(215, 177, 74, 0.95);
            box-shadow: inset 0 0 0 1px rgba(255, 236, 170, 0.35), 0 0 22px rgba(215, 177, 74, 0.28);
        }

        .hero-card__label {
            position: absolute;
            left: 50%;
            bottom: 1.5rem;
            z-index: 1;
            padding: 0.7rem 1rem;
            background: rgba(0, 0, 0, 0.82);
            color: #f1d06b;
            border: 1px solid rgba(215, 177, 74, 0.8);
            font-size: 0.82rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            white-space: nowrap;
            opacity: 0;
            transform: translate(-50%, 10px);
            transition: opacity 180ms ease, transform 180ms ease;
            pointer-events: none;
        }

        .hero-card:hover .hero-card__label {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        .hero-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transform: scale(1);
            transition: transform 260ms ease, filter 260ms ease;
        }

        .hero-card:hover img {
            transform: scale(1.04);
            filter: saturate(1.04) contrast(1.02);
        }

        .hero-card--tl {
            grid-column: 1;
            grid-row: 1;
        }

        .hero-card--tr {
            grid-column: 2;
            grid-row: 1;
        }

        .hero-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: min(100%, 184px);
            padding: 0.5rem;
            background: rgba(0, 0, 0, 0.92);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.45);
            transform: translate(-50%, -50%);
            z-index: 3;
            cursor: pointer;
        }

        .hero-center img {
            width: 184px;
            max-width: 100%;
            height: auto;
            display: block;
            filter: drop-shadow(0 14px 32px rgba(0, 0, 0, 0.45));
        }

        .hero-center__link {
            display: block;
        }

        .hero-card--bl {
            grid-column: 1;
            grid-row: 2;
        }

        .hero-card--br {
            grid-column: 2;
            grid-row: 2;
        }

        @media (max-width: 1100px) {
            .landing__content {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 1fr 1fr;
                height: 100%;
            }

            .hero-card,
            .hero-center {
                width: 100%;
            }

            .hero-center {
                width: min(100%, 184px);
            }
        }

        @media (max-width: 720px) {
            .landing__content {
                height: 100%;
            }

            .hero-center {
                width: min(42vw, 184px);
            }

            .hero-center img {
                width: 100%;
            }

            .hero-card__label {
                left: 50%;
                top: 50%;
                bottom: auto;
                opacity: 1;
                transform: translate(-50%, -50%);
            }

            .hero-card:hover .hero-card__label {
                transform: translate(-50%, -50%);
            }
        }
    </style>
</head>
<body>
    <main class="landing">
        <img class="landing__bg" src="{{ asset('images/landing-images/bon-ace_landing_page_bg.jpg') }}" alt="Bon-Ace background">
        <div class="landing__overlay"></div>
        <div class="landing__dividers" aria-hidden="true"></div>

        <section class="landing__content" aria-label="Bon-Ace Lifestyle landing page">
            <article class="hero-card hero-card--tl">
                <img src="{{ asset('images/landing-images/home-decor-2.jpg') }}" alt="Home decor collection">
                <span class="hero-card__label">Home Decor</span>
            </article>

            <article class="hero-card hero-card--tr">
                <img src="{{ asset('images/landing-images/fashion-accessories.jpg') }}" alt="Fashion accessories collection">
                <span class="hero-card__label">Fashion Accessories</span>
            </article>

            <article class="hero-card hero-card--bl">
                <img src="{{ asset('images/landing-images/accent-furniture.jpg') }}" alt="Accent furniture collection">
                <span class="hero-card__label">Accent Furniture</span>
            </article>

            <article class="hero-card hero-card--br">
                <img src="{{ asset('images/landing-images/lighting-2.jpg') }}" alt="Lighting collection">
                <span class="hero-card__label">Lighting</span>
            </article>
        </section>

        <a class="hero-center hero-center__link" href="{{ route('home') }}" aria-label="Enter Bon-Ace homepage">
            <img src="{{ asset('images/landing-images/bon-ace-logo.jpg') }}" alt="Bon-Ace Lifestyle logo">
        </a>
    </main>
</body>
</html>
