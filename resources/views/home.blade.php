<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bon-Ace Lifestyle Home</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #ffffff;
            --panel: #ffffff;
            --panel-soft: #ffffff;
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

        .nav__links--left {
            justify-content: center;
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

        .hero__panel h1 span {
            display: inline;
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

        .button {
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

        .button--ghost {
            background: rgba(255, 255, 255, 0.75);
            color: var(--text);
            border-color: var(--border);
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

        .catalog--mobile {
            display: none;
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

        .catalog__actions {
            margin-top: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
            justify-content: center;
        }

        .catalog__actions .catalog__overlay-btn--secondary {
            background: transparent;
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.35);
        }

        .catalog__actions .catalog__overlay-btn--secondary:hover {
            background: var(--gold);
            color: #16120d;
            border-color: var(--gold);
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

        .catalog__item-img:nth-of-type(1) {
            left: 16.67%;
        }

        .catalog__item-img:nth-of-type(2) {
            left: 50%;
        }

        .catalog__item-img:nth-of-type(3) {
            left: 83.33%;
        }

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

        .catalog__panel .catalog__item-title:nth-of-type(2) {
            left: 50%;
        }

        .catalog__panel .catalog__item-title:nth-of-type(3) {
            left: 83.33%;
        }

        .catalog__panel .eyebrow {
            margin: 0 0 1rem;
            color: var(--gold);
            font-size: 0.8rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }

        .catalog__panel h2 {
            margin: 0;
            font-size: clamp(2.2rem, 4.5vw, 4rem);
            line-height: 1;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            color: #ffffff;
        }

        .catalog__panel p {
            margin: 1.5rem 0 0;
            max-width: 36rem;
            color: rgba(255, 255, 255, 0.75);
            font-size: clamp(0.95rem, 1.3vw, 1.1rem);
            line-height: 1.8;
        }

        .catalog__panel .catalog__actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .catalog__panel .button {
            border-radius: var(--radius-sm);
        }

        .catalog__panel .button--ghost {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        .fashion {
            background: #111111;
            border-radius: var(--radius-lg);
            padding: clamp(2rem, 4vw, 4rem);
        }

        .fashion__cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .fashion__card {
            background: #ffffff;
            border-radius: var(--radius-md);
            overflow: hidden;
            aspect-ratio: 3 / 4;
            position: relative;
        }

        .fashion__card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .section {
            width: var(--container);
            margin: 0 auto;
            padding: 1.5rem 0 0;
        }

        .section__header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .section__header h2 {
            margin: 0;
            font-size: clamp(1.7rem, 3vw, 2.6rem);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .section__header p {
            margin: 0;
            max-width: 34rem;
            color: var(--muted);
            line-height: 1.7;
        }

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

        .about {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 1.5rem;
            align-items: stretch;
            padding-top: 2rem;
        }

        .about__panel,
        .about__image {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: #111111;
            box-shadow: var(--shadow);
            border-radius: var(--radius-md);
        }

        .about__panel {
            padding: clamp(1.5rem, 4vw, 3rem);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .about__panel h2 {
            margin: 0 0 1rem;
            font-size: clamp(1.8rem, 4vw, 3rem);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #ffffff;
        }

        .about__panel p {
            margin: 0 0 1rem;
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.8;
        }

        .about__stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.9rem;
            margin-top: 1.4rem;
            width: 100%;
        }

        .about__stat {
            padding: 1rem;
            border: 1px solid rgba(215, 177, 74, 0.25);
            background: rgba(255, 255, 255, 0.06);
        }

        .about__stat strong {
            display: block;
            color: var(--gold);
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }

        .about__stat span {
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .about__image {
            overflow: hidden;
            min-height: 100%;
        }

        .about__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .milestone {
            padding-top: 0.5rem;
        }

        .milestone--mobile {
            display: none;
        }

        .milestone__inner {
            padding: clamp(1.5rem, 4vw, 3rem);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            background: #111111;
            box-shadow: var(--shadow);
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 1.5rem;
            align-items: center;
        }

        .milestone__gallery {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            grid-template-rows: repeat(2, minmax(0, 1fr));
            gap: 0.9rem;
            min-height: 520px;
        }

        .milestone__gallery-card {
            position: relative;
            overflow: hidden;
            min-height: 0;
            border-radius: var(--radius-md);
            border: 0;
            box-shadow: none;
        }

        .milestone__gallery-card--large {
            grid-column: 1 / span 2;
            grid-row: 1 / span 2;
        }

        .milestone__gallery-card--tall {
            grid-row: span 2;
        }

        .milestone__gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transform: scale(1.02);
        }

        .milestone__gallery-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.22) 100%);
        }

        .milestone__feature {
            position: relative;
            overflow: hidden;
            min-height: 520px;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.3);
        }

        .milestone__feature img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .milestone__feature::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.08) 0%, rgba(0, 0, 0, 0.7) 100%);
        }

        .milestone__feature-content {
            position: absolute;
            inset: 0;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: clamp(1.5rem, 4vw, 3rem);
        }

        .milestone__feature-content h2 {
            margin: 0;
            color: #ffffff;
            font-size: clamp(2.8rem, 6vw, 5.5rem);
            line-height: 0.92;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            max-width: 12rem;
        }

        .milestone__feature-content p {
            margin: 0.9rem 0 0;
            max-width: 26rem;
            color: rgba(255, 255, 255, 0.82);
            font-size: 0.82rem;
            font-weight: 400;
            line-height: 1.7;
        }

        .milestone__feature-badge {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            margin-bottom: 1rem;
            padding: 0;
            border: 0;
            border-radius: 0;
            background: transparent;
            color: var(--gold);
            font-size: clamp(1.2rem, 2.2vw, 1.8rem);
            font-weight: 700;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }

        .milestone__feature-content .milestone__lead {
            margin-top: 1rem;
            padding-left: 1rem;
            border-left: 2px solid rgba(215, 177, 74, 0.5);
            color: rgba(255, 255, 255, 0.72);
        }

        .milestone-mobile__inner {
            padding: 1.25rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            background: #111111;
            box-shadow: var(--shadow);
        }

        .milestone-mobile__hero {
            position: relative;
            overflow: hidden;
            min-height: 300px;
            border-radius: var(--radius-md);
        }

        .milestone-mobile__hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .milestone-mobile__hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.12) 0%, rgba(0, 0, 0, 0.76) 100%);
        }

        .milestone-mobile__hero-content {
            position: absolute;
            inset: 0;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.25rem;
        }

        .milestone-mobile__hero-badge {
            color: var(--gold);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .milestone-mobile__hero h2 {
            margin: 0.5rem 0 0;
            color: #ffffff;
            font-size: 2rem;
            line-height: 0.98;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .milestone-mobile__hero p {
            margin: 0.65rem 0 0;
            color: rgba(255, 255, 255, 0.82);
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .milestone-mobile__grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
            margin-top: 0.75rem;
        }

        .milestone-mobile__tile {
            position: relative;
            overflow: hidden;
            min-height: 120px;
            border-radius: var(--radius-md);
        }

        .milestone-mobile__tile--wide {
            grid-column: 1 / -1;
            min-height: 160px;
            margin-top: 0.75rem;
        }

        .milestone-mobile__tile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cta {
            width: var(--container);
            margin: 2rem auto 3rem;
            padding: clamp(1.5rem, 4vw, 3rem);
            border: 1px solid var(--border);
            background: #ffffff;
            box-shadow: var(--shadow);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .cta h2 {
            margin: 0 0 0.7rem;
            font-size: clamp(1.8rem, 4vw, 3.2rem);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .cta p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
            max-width: 40rem;
        }



        .catalog-mobile__inner {
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            background: #111111;
        }

        .catalog-mobile__visual {
            position: relative;
            min-height: 280px;
        }

        .catalog-mobile__visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .catalog-mobile__visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.16) 0%, rgba(0, 0, 0, 0.62) 100%);
        }

        .catalog-mobile__overlay {
            position: absolute;
            inset: 0;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.2rem;
            color: #ffffff;
        }

        .catalog-mobile__overlay h3 {
            margin: 0;
            font-size: 1.7rem;
            line-height: 1;
            text-transform: uppercase;
        }

        .catalog-mobile__overlay p {
            margin: 0.65rem 0 0;
            font-size: 0.85rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.82);
        }

        .catalog-mobile__panel {
            padding: 1.2rem;
            background: #111111;
        }

        .catalog-mobile__actions {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .catalog-mobile__actions .catalog__overlay-btn {
            width: 100%;
        }

        @media (max-width: 980px) {
            .about {
                grid-template-columns: 1fr;
            }

            .categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .milestone__inner {
                grid-template-columns: 1fr;
            }

            .milestone__gallery {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto;
                min-height: auto;
            }

            .milestone__gallery-card--large {
                grid-row: auto;
                grid-column: 1 / -1;
                min-height: 260px;
            }

            .milestone__gallery-card--tall {
                grid-row: auto;
            }

            .milestone__feature {
                min-height: 440px;
            }

            .cta {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 720px) {
            .milestone--desktop {
                display: none;
            }

            .milestone--mobile {
                display: block;
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

            .hero__visual {
                min-height: 360px;
            }

            .categories {
                grid-template-columns: 1fr;
                gap: 0.85rem;
            }

            .category-card__overlay h3 {
                font-size: 0.95rem;
            }

            .about__panel,
            .about__image {
                min-height: auto;
            }

            .about {
                gap: 0.85rem;
            }

            .about__panel {
                order: 1;
                padding: 1.25rem;
                background:
                    linear-gradient(180deg, rgba(17, 17, 17, 0.86) 0%, rgba(17, 17, 17, 0.92) 100%),
                    url("{{ asset('images/homepage/about-us.jpg') }}") center/cover no-repeat;
            }

            .about__panel h2 {
                font-size: 1.5rem;
            }

            .about__panel p {
                font-size: 0.88rem;
                line-height: 1.7;
            }

            .about__image {
                display: none;
            }

            .fashion__cards {
                grid-template-columns: 1fr;
            }

            .about__stats {
                grid-template-columns: 1fr;
            }

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

    <main>
        <section class="hero" id="banner">
            <div class="hero__inner">
                <div class="hero__panel">
                    <p class="eyebrow">Bon-Ace Lifestyle</p>
                    <h1><span>Fashion</span> <span>&amp; Lifestyle</span> <span>Collections</span></h1>
                    <p>
                        Impressive works of art, that emerged from a clever and unique blend of Filipino and Italian ingenuity
                    </p>
                    <div class="hero__actions">
                        <a class="button" href="{{ route('fashion-accessories') }}">View Collections</a>
                        <a class="button button--ghost" href="#about">About Bon-Ace</a>
                    </div>
                </div>

                <div class="hero__visual">
                    <img src="{{ asset('images/homepage/homepage-landing-banner.jpg') }}" alt="Bon-Ace banner background">
                </div>
            </div>
        </section>

        <section class="section" id="categories">
            <div class="categories">
                <article class="category-card">
                    <div class="category-card__media">
                        <img src="{{ asset('images/landing-images/home-decor-2.jpg') }}" alt="Home decor pieces">
                        <div class="category-card__overlay">
                            <span class="category-card__tag">Bon-Ace</span>
                            <h3>Home Decor</h3>
                        </div>
                    </div>
                </article>

                <article class="category-card">
                    <div class="category-card__media">
                        <img src="{{ asset('images/landing-images/fashion-accessories.jpg') }}" alt="Fashion accessories">
                        <div class="category-card__overlay">
                            <span class="category-card__tag">Bon-Ace</span>
                            <h3>Fashion Accessories</h3>
                        </div>
                    </div>
                </article>

                <article class="category-card">
                    <div class="category-card__media">
                        <img src="{{ asset('images/landing-images/accent-furniture.jpg') }}" alt="Accent furniture">
                        <div class="category-card__overlay">
                            <span class="category-card__tag">Bon-Ace</span>
                            <h3>Accent Furniture</h3>
                        </div>
                    </div>
                </article>

                <article class="category-card">
                    <div class="category-card__media">
                        <img src="{{ asset('images/landing-images/lighting-2.jpg') }}" alt="Lighting">
                        <div class="category-card__overlay">
                            <span class="category-card__tag">Bon-Ace</span>
                            <h3>Lighting</h3>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="section about" id="about">
            <div class="about__panel">
                <p class="eyebrow">About Us</p>
                <h2>BON-ACE FASHION TOOLS, INC.</h2>
                <p>
                    BON-ACE FASHION TOOLS, INC. is a Philippine-based fashion and lifestyle products company with worldwide reach known for its unique designs and functionality made from all-natural materials.
                </p>
                <p>
                    Our impressive works of art, that emerged from a clever and unique blend of Filipino and Italian ingenuity, continuously etch its name in the industry and unceasingly mesmerize a wide variety of clientele all over the world since we started in 1993. Our deep commitment to high quality standards in product development, design, and competitiveness can never be faltered.
                </p>
                <p>
                    BON-ACE (BONghanoy Arts Cum Engineering) began its business operation with a small nipa hut as a production area for the export business and with 8 employees.
                </p>

                <div class="about__stats">
                    <div class="about__stat">
                        <strong>Worldwide reach</strong>
                        <span>since 1993</span>
                    </div>
                    <div class="about__stat">
                        <strong>OVER 30 YEARS</strong>
                        <span>of passion, dedication &amp; commitment</span>
                    </div>
                </div>
            </div>

            <div class="about__image">
                <img src="{{ asset('images/homepage/about-us.jpg') }}" alt="Bon-Ace lifestyle showcase">
            </div>
        </section>

        <section class="section catalog catalog--desktop" id="home-decor">
            <div class="catalog__inner">
                <div class="catalog__visual">
                    <img src="{{ asset('images/homepage/decor-catalog-image.png') }}" alt="Home decor catalog">
                    <div class="catalog__overlay">
                        <h3>Beautiful and Unparalleled Collections</h3>
                        <p>
                            Exquisitely studied and carefully crafted with our master craftsmen&rsquo;s skills honed over decades of experience, utilizing the most appropriate technology and methodology at the forefront of innovation.
                        </p>
                        <div class="catalog__actions">
                            <a class="catalog__overlay-btn" href="#categories">Request product catalog</a>
                            <a class="catalog__overlay-btn catalog__overlay-btn--secondary" href="#about">Contact us</a>
                        </div>
                    </div>
                </div>
                <div class="catalog__panel">
                    <div class="catalog__card">
                        <img class="catalog__item-img" src="{{ asset('images/homepage/home-decor-catalog-images/decor-bowl.png') }}" alt="Decor">
                        <p class="catalog__item-title">Decor</p>
                        <img class="catalog__item-img" src="{{ asset('images/homepage/home-decor-catalog-images/decor-wall-art.png') }}" alt="Wall Art">
                        <p class="catalog__item-title">Wall Art</p>
                        <img class="catalog__item-img" src="{{ asset('images/homepage/home-decor-catalog-images/decor-planters.png') }}" alt="Planters">
                        <p class="catalog__item-title">Planters</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section catalog catalog--mobile" id="home-decor-mobile">
            <div class="catalog-mobile__inner">
                <div class="catalog-mobile__visual">
                    <img src="{{ asset('images/homepage/decor-catalog-image.png') }}" alt="Home decor catalog">
                    <div class="catalog-mobile__overlay">
                        <h3>Beautiful and Unparalleled Collections</h3>
                        <p>Exquisitely studied and carefully crafted with our master craftsmen&rsquo;s skills honed over decades of experience.</p>
                    </div>
                </div>
                <div class="catalog-mobile__panel">
                    <div class="catalog-mobile__actions">
                        <a class="catalog__overlay-btn" href="#categories">Request product catalog</a>
                        <a class="catalog__overlay-btn catalog__overlay-btn--secondary" href="#about">Contact us</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section milestone milestone--desktop" id="heritage-desktop">
            <div class="milestone__inner">
                <div class="milestone__gallery">
                    <article class="milestone__gallery-card milestone__gallery-card--large">
                        <img src="{{ asset('images/homepage/dedication/dedication3.jpg') }}" alt="Dedication gallery piece 3">
                    </article>

                    <article class="milestone__gallery-card">
                        <img src="{{ asset('images/homepage/dedication/dedication2.jpg') }}" alt="Dedication gallery piece 2">
                    </article>

                    <article class="milestone__gallery-card milestone__gallery-card--tall">
                        <img src="{{ asset('images/homepage/dedication/dedication1.jpg') }}" alt="Dedication gallery piece 1">
                    </article>

                    <article class="milestone__gallery-card">
                        <img src="{{ asset('images/homepage/dedication/dedication4.jpg') }}" alt="Dedication gallery piece 4">
                    </article>

                    <article class="milestone__gallery-card">
                        <img src="{{ asset('images/homepage/dedication/dedication5.jpg') }}" alt="Dedication gallery piece 5">
                    </article>
                </div>

                <div class="milestone__feature">
                    <img src="{{ asset('images/homepage/dedication/homepage-main.jpg') }}" alt="Bon-Ace heritage showcase">
                    <div class="milestone__feature-content">
                        <div class="milestone__feature-badge">Over 30 Years</div>
                        <h2>of passion, dedication &amp; commitment</h2>
                        <p>
                            Built through decades of careful craftsmanship, consistent quality, and a deep commitment to creating pieces that last.
                        </p>
                        <div class="milestone__lead">
                            Since 1993, Bon-Ace has continued to grow through trust, innovation, and enduring design.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section milestone milestone--mobile" id="heritage">
            <div class="milestone-mobile__inner">
                <div class="milestone-mobile__hero">
                    <img src="{{ asset('images/homepage/dedication/homepage-main.jpg') }}" alt="Bon-Ace dedication showcase">
                    <div class="milestone-mobile__hero-content">
                        <div class="milestone-mobile__hero-badge">Over 30 Years</div>
                        <h2>of passion, dedication &amp; commitment</h2>
                        <p>Built through decades of careful craftsmanship, consistent quality, and enduring design.</p>
                    </div>
                </div>

                <div class="milestone-mobile__grid">
                    <div class="milestone-mobile__tile"><img src="{{ asset('images/homepage/dedication/dedication3.jpg') }}" alt="Dedication gallery piece 3"></div>
                    <div class="milestone-mobile__tile"><img src="{{ asset('images/homepage/dedication/dedication2.jpg') }}" alt="Dedication gallery piece 2"></div>
                    <div class="milestone-mobile__tile"><img src="{{ asset('images/homepage/dedication/dedication1.jpg') }}" alt="Dedication gallery piece 1"></div>
                    <div class="milestone-mobile__tile"><img src="{{ asset('images/homepage/dedication/dedication4.jpg') }}" alt="Dedication gallery piece 4"></div>
                </div>

                <div class="milestone-mobile__tile milestone-mobile__tile--wide">
                    <img src="{{ asset('images/homepage/dedication/dedication5.jpg') }}" alt="Dedication gallery piece 5">
                </div>
            </div>
        </section>

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
