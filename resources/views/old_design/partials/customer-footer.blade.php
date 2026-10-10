@php
    $footerDefaults = [
        'company_name' => 'Bon-Ace Fashion Tools',
        'addresses' => ['Bon-Ace Complex, Tungkil, Minglanilla, Cebu, Philippines'],
        'phone_numbers' => [],
        'emails' => [],
        'socials' => [],
    ];
    $footerSettings = array_merge($footerDefaults, \App\Models\SiteSetting::where('key', 'general')->value('value') ?? []);
@endphp

<style>
    .customer-footer {
        background: #161513;
        color: rgba(255, 255, 255, 0.76);
    }

    .customer-footer__inner {
        width: var(--container);
        margin: 0 auto;
        padding: clamp(2.75rem, 6vw, 5rem) 0 1.5rem;
    }

    .customer-footer__grid {
        display: grid;
        grid-template-columns: 1.35fr 0.75fr 1fr;
        gap: clamp(2rem, 6vw, 6rem);
    }

    .customer-footer__brand {
        display: inline-flex;
        width: fit-content;
        padding: 0.45rem;
        background: #000000;
    }

    .customer-footer__brand img {
        width: 58px;
        height: auto;
        display: block;
    }

    .customer-footer__intro {
        max-width: 25rem;
        margin: 1.1rem 0 0;
        font-size: 0.9rem;
        line-height: 1.75;
    }

    .customer-footer h2 {
        margin: 0 0 1rem;
        color: #e1c78f;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
    }

    .customer-footer__list {
        display: grid;
        gap: 0.75rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .customer-footer__list a,
    .customer-footer__list span {
        color: rgba(255, 255, 255, 0.76);
        font-size: 0.87rem;
        line-height: 1.55;
    }

    .customer-footer__list a:hover {
        color: #e1c78f;
    }

    .customer-footer__socials {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        margin-top: 1.1rem;
    }

    .customer-footer__socials a {
        display: inline-flex;
        align-items: center;
        min-height: 34px;
        padding: 0.4rem 0.7rem;
        border: 1px solid rgba(255, 255, 255, 0.26);
        color: #ffffff;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .customer-footer__socials a:hover {
        border-color: #e1c78f;
        background: #e1c78f;
        color: #161513;
    }

    .customer-footer__bottom {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: clamp(2.5rem, 6vw, 4.5rem);
        padding-top: 1.25rem;
        border-top: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.48);
        font-size: 0.72rem;
    }

    @media (max-width: 720px) {
        .customer-footer__grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .customer-footer__bottom {
            flex-direction: column;
        }
    }
</style>

<footer class="customer-footer">
    <div class="customer-footer__inner">
        <div class="customer-footer__grid">
            <div>
                <a class="customer-footer__brand" href="{{ route('home') }}" aria-label="{{ $footerSettings['company_name'] }} homepage">
                    <img src="{{ asset('images/landing-images/bon-ace-logo.jpg') }}" alt="{{ $footerSettings['company_name'] }} logo">
                </a>
                <p class="customer-footer__intro">Artful furniture, décor, and fashion accessories shaped by Filipino and Italian ingenuity.</p>

                @if (!empty($footerSettings['socials']))
                    <div class="customer-footer__socials" aria-label="Social media links">
                        @foreach ($footerSettings['socials'] as $social)
                            @if (!empty($social['platform']) && !empty($social['url']))
                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">{{ $social['platform'] }}</a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <h2>Explore</h2>
                <ul class="customer-footer__list">
                    <li><a href="{{ route('home') }}#about">Our Craftsmanship</a></li>
                    <li><a href="{{ route('fashion-accessories') }}">Fashion Accessories</a></li>
                    <li><a href="{{ route('home') }}#categories">Home Décor</a></li>
                    <li><a href="{{ route('home') }}#categories">Accent Furniture</a></li>
                    <li><a href="{{ route('home') }}#categories">Lighting</a></li>
                </ul>
            </div>

            <div>
                <h2>Visit &amp; Contact</h2>
                <ul class="customer-footer__list">
                    @foreach ($footerSettings['addresses'] as $address)
                        <li><span>{{ $address }}</span></li>
                    @endforeach
                    @foreach ($footerSettings['phone_numbers'] as $phone)
                        <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a></li>
                    @endforeach
                    @foreach ($footerSettings['emails'] as $email)
                        <li><a href="mailto:{{ $email }}">{{ $email }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="customer-footer__bottom">
            <span>&copy; {{ now()->year }} {{ $footerSettings['company_name'] }}. All rights reserved.</span>
            <span>Made with craftsmanship in mind.</span>
        </div>
    </div>
</footer>
