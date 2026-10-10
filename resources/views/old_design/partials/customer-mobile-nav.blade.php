<style>
    .nav__toggle {
        display: none;
    }

    @media (min-width: 721px) {
        .nav__links a:not(:first-child) {
            margin-left: 0.35rem;
            padding-left: 1.35rem;
        }

        .nav__links a:not(:first-child)::before {
            content: "◆";
            position: absolute;
            left: 0;
            top: 50%;
            color: var(--gold);
            font-size: 0.42rem;
            line-height: 1;
            transform: translateY(-50%);
        }

        .nav__links .nav__divider {
            display: none;
        }
    }

    @media (max-width: 720px) {
        .site-header {
            backdrop-filter: none;
        }

        .nav-top {
            position: relative;
            justify-content: flex-start;
            min-height: 76px;
            padding: 0.55rem 5.5rem 0.55rem 1rem;
        }

        .nav__brand {
            padding: 0.38rem;
        }

        .nav__brand img {
            width: 48px;
        }

        .nav__toggle {
            position: absolute;
            top: 50%;
            right: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            min-height: 40px;
            padding: 0.45rem 0;
            border: 0;
            background: transparent;
            color: var(--text);
            cursor: pointer;
            font: inherit;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            transform: translateY(-50%);
        }

        .nav__toggle::after {
            content: "";
            display: block;
            width: 18px;
            height: 12px;
            border-top: 1.5px solid currentColor;
            border-bottom: 1.5px solid currentColor;
            transition: transform 180ms ease;
        }

        .nav__toggle[aria-expanded="true"]::after {
            transform: rotate(90deg);
        }

        .nav-bar {
            display: none;
            width: 100%;
            max-width: none;
            padding: 0.55rem 1rem 1rem;
            border-top: 1px solid var(--border);
            background: #ffffff;
        }

        .nav-bar.is-open {
            display: block;
        }

        .nav__links {
            display: flex;
            align-items: stretch;
            gap: 0;
            white-space: normal;
        }

        .nav__links a {
            display: flex;
            align-items: center;
            min-height: 50px;
            padding: 0.9rem 0.8rem;
            border: 0;
            border-left: 2px solid transparent;
            color: #171717;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.09em;
            background: #ffffff;
        }

        .nav__links a::after {
            left: 0.8rem;
            width: 24px;
            bottom: 0.65rem;
            transform: scaleX(0);
            transform-origin: left;
        }

        .nav__links a:hover,
        .nav__links a:focus-visible {
            color: var(--gold);
            border-left-color: var(--gold);
            background: var(--gold-soft);
            outline: none;
        }

        .nav__links a::before {
            display: none;
        }

        .nav__links a:hover::after,
        .nav__links a:focus-visible::after {
            transform: scaleX(1);
        }

        .nav__divider {
            display: none;
        }
    }
</style>

<script>
    (function () {
        document.querySelectorAll('.site-header').forEach(function (header) {
            const nav = header.querySelector('.nav-bar');
            const top = header.querySelector('.nav-top');

            if (!nav || !top || top.querySelector('.nav__toggle')) return;

            const toggle = document.createElement('button');
            toggle.type = 'button';
            toggle.className = 'nav__toggle';
            toggle.setAttribute('aria-label', 'Toggle navigation menu');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.textContent = 'Menu';
            top.appendChild(toggle);

            const closeMenu = function () {
                nav.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            };

            toggle.addEventListener('click', function () {
                const isOpen = nav.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', String(isOpen));
            });

            nav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', closeMenu);
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 720) closeMenu();
            });
        });
    })();
</script>
