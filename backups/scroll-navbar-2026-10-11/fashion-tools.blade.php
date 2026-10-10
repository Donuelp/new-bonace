<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon-Ace Fashion Tools</title>
    @vite(['resources/css/customer.css'])
</head>
<body id="page-top">
    <div class="fashion-tools-header-space">
    <header class="fashion-tools-header" data-fashion-header>
    <nav class="fashion-tools-subnav" aria-label="Fashion Tools navigation">
        <div class="fashion-tools-subnav__actions">
            <a class="fashion-tools-subnav__contact" href="#profile">Profile</a>
            <a class="fashion-tools-subnav__contact" href="#exhibits">Exhibits</a>
            <a class="fashion-tools-subnav__contact" href="#news">News</a>
            <a class="fashion-tools-subnav__contact" href="#videos">Videos</a>
            <a class="fashion-tools-subnav__contact" href="#disclaimer">Disclaimer</a>
            <a class="fashion-tools-subnav__contact" href="#contact">Contact Us</a>
            <a class="fashion-tools-subnav__social" href="#instagram" aria-label="Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            <a class="fashion-tools-subnav__social" href="#facebook" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
            <span class="fashion-tools-subnav__title">Bon Ace Fashion Tools</span>
        </div>
    </nav>
    <nav class="fashion-tools-mainnav" aria-label="Main navigation">
        <a class="fashion-tools-floating-logo" href="/" aria-label="Back to Bon-Ace Lifestyle">
            <img src="/images/landing-images/bon-ace-logo.jpg" alt="Bon-Ace Lifestyle">
        </a>
        <div class="fashion-tools-mainnav__links">
            <a href="#home">Home</a>
            <a href="#craftsmanship">Craftsmanship</a>
            <a href="#materials">Materials</a>
            <a href="#fashion-accessories">Fashion Accessories</a>
            <a href="#home-decor">Home Décor</a>
            <a href="#accent-furniture">Accent Furniture</a>
            <a href="#lighting">Lighting</a>
        </div>
    </nav>
    </header>
    </div>
    <section id="home" class="fashion-tools-banner" aria-label="Featured Bon-Ace collections" data-fashion-carousel>
        <div class="fashion-tools-banner__slides">
            <article class="fashion-tools-banner__slide is-active">
                <img src="/images/landing-images/fashion-accessories.jpg" alt="Bon-Ace fashion accessories">
            </article>
            <article class="fashion-tools-banner__slide">
                <img src="/images/customer/home-decor-photo.jpg" alt="Bon-Ace home décor">
            </article>
            <article class="fashion-tools-banner__slide">
                <img src="/images/landing-images/accent-furniture.jpg" alt="Bon-Ace accent furniture">
            </article>
        </div>
        <button class="fashion-tools-banner__control fashion-tools-banner__control--previous" type="button" aria-label="Previous banner" data-carousel-previous>‹</button>
        <button class="fashion-tools-banner__control fashion-tools-banner__control--next" type="button" aria-label="Next banner" data-carousel-next>›</button>
        <div class="fashion-tools-banner__dots" aria-label="Banner slide navigation">
            <button class="is-active" type="button" aria-label="Show slide 1" data-carousel-dot></button>
            <button type="button" aria-label="Show slide 2" data-carousel-dot></button>
            <button type="button" aria-label="Show slide 3" data-carousel-dot></button>
        </div>
    </section>
    <section id="product-categories" class="fashion-tools-categories" aria-labelledby="fashion-tools-categories-title">
        <div class="fashion-tools-categories__intro">
            <div class="fashion-tools-categories__heading" style="background-image: url('{{ asset('images/homepage/background-category.png') }}');">
                <p>Bon-Ace · Fashion Accessories</p>
                <h1 id="fashion-tools-categories-title">CRAFTSMANSHIP</h1>
                <div class="fashion-tools-categories__notes">
                    <p class="fashion-tools-categories__reach"><strong>WORLDWIDE REACH</strong><br>SINCE 1993</p>
                    <div>
                        <p>Unique designs and functionality made from all-natural materials.</p>
                        <p class="fashion-tools-categories__statement">Impressive works of art!</p>
                        <a class="fashion-tools-categories__cta" href="#craftsmanship">See how we work</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="fashion-tools-categories__grid">
            <a class="fashion-tools-category-card" href="#fashion-accessories">
                <span class="fashion-tools-category-card__image">
                    <img src="/images/landing-images/fashion-accessories.jpg" alt="Fashion accessories collection">
                </span>
                <span class="fashion-tools-category-card__details">
                    <span class="fashion-tools-category-card__title">Fashion Accessories</span>
                    <span class="fashion-tools-category-card__meta">01</span>
                </span>
            </a>
            <a class="fashion-tools-category-card" href="#home-decor">
                <span class="fashion-tools-category-card__image">
                    <img src="/images/customer/home-decor-photo.jpg" alt="Home décor collection">
                </span>
                <span class="fashion-tools-category-card__details">
                    <span class="fashion-tools-category-card__title">Home Décor</span>
                    <span class="fashion-tools-category-card__meta">02</span>
                </span>
            </a>
            <a class="fashion-tools-category-card" href="#accent-furniture">
                <span class="fashion-tools-category-card__image">
                    <img src="/images/landing-images/accent-furniture.jpg" alt="Accent furniture collection">
                </span>
                <span class="fashion-tools-category-card__details">
                    <span class="fashion-tools-category-card__title">Accent Furniture</span>
                    <span class="fashion-tools-category-card__meta">03</span>
                </span>
            </a>
            <a class="fashion-tools-category-card" href="#lighting">
                <span class="fashion-tools-category-card__image">
                    <img src="/images/landing-images/lighting.jpg" alt="Lighting collection">
                </span>
                <span class="fashion-tools-category-card__details">
                    <span class="fashion-tools-category-card__title">Lighting</span>
                    <span class="fashion-tools-category-card__meta">04</span>
                </span>
            </a>
        </div>
    </section>
    <section class="fashion-tools-gallery" aria-labelledby="fashion-tools-gallery-title" data-fashion-gallery>
        <div class="fashion-tools-gallery__heading">
            <h2 id="fashion-tools-gallery-title" aria-label="Beautiful and Unparalleled Collections" data-gallery-typing-heading>
                <span data-gallery-typing-text="Beautiful"></span>
                <span data-gallery-typing-text="And"></span>
                <span data-gallery-typing-text="Unparalleled Collections"></span>
            </h2>
            <p class="fashion-tools-gallery__subtext" data-gallery-subtext>
                Exquisitely studied and carefully crafted with our master craftsmen’s skills honed over decades of experience, utilizing the most appropriate technology and methodology at the forefront of innovation.
            </p>
            <a class="fashion-tools-gallery__products-link" href="#product-categories">Explore more from our products <span aria-hidden="true">→</span></a>
        </div>
        <div class="fashion-tools-gallery__explorer">
        <div class="fashion-tools-gallery__stage" data-gallery-stage>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/components.jpg" alt="Bon-Ace fashion components" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/earrings.jpg" alt="Bon-Ace earrings" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/necklaces.jpg" alt="Bon-Ace necklaces" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/clutches.jpg" alt="Bon-Ace clutches" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/bangles.jpg" alt="Bon-Ace bangles" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/beaded-bags.jpg" alt="Bon-Ace beaded bags" draggable="false"></article>
            <article class="fashion-tools-gallery__card"><img src="/images/fashion-accessories/shoes.jpg" alt="Bon-Ace shoes" draggable="false"></article>
        </div>
        <p class="fashion-tools-gallery__hint">Drag to explore</p>
        </div>
    </section>
    <section id="craftsmanship" class="fashion-tools-parallax" style="background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('{{ asset('images/homepage/parallax.jpg') }}');" aria-label="About Bon-Ace">
        <div class="fashion-tools-parallax__image">
            <div class="fashion-tools-parallax__photo">
            <img src="{{ asset('images/homepage/about-us.jpg') }}" alt="Bon-Ace craftsmanship">
                <div class="fashion-tools-parallax__caption">
                    <span class="fashion-tools-parallax__years">Over 20 years</span>
                    <span class="fashion-tools-parallax__passion">of passion, dedication &amp; commitment</span>
                </div>
            </div>
        </div>
        <div class="fashion-tools-about__content fashion-tools-parallax__content">
            <p class="fashion-tools-about__eyebrow">About Us</p>
            <div class="fashion-tools-about__divider" aria-hidden="true"></div>
            <div class="fashion-tools-about__copy">
                <p>BON-ACE FASHION TOOLS, INC. is a Philippine-based fashion and lifestyle products company with worldwide reach known for its unique designs and functionality made from all-natural materials.</p>
                <p>Our impressive works of art, that emerged from a clever and unique blend of Filipino and Italian ingenuity, continuously etch its name in the industry and unceasingly mesmerize a wide variety of clientele all over the world since we started in 1993. Our deep commitment to high quality standards in product development, design, and competitiveness can never be faltered.</p>
                <p>BON-ACE (BONghanoy Arts Cum Engineering) began its business operation with a small nipa hut as a production area for the export business and with 8 employees.</p>
            </div>
        </div>
    </section>
    <section id="news" class="fashion-tools-blog" aria-labelledby="fashion-tools-blog-title">
        <div class="fashion-tools-blog__heading">
            <p class="fashion-tools-blog__eyebrow">The Bon-Ace Journal</p>
            <h2 id="fashion-tools-blog-title">Stories behind the craft.</h2>
            <p>A closer look at our materials, craftsmanship, and beginnings.</p>
        </div>
        <div class="fashion-tools-blog__grid">
            <article class="fashion-tools-blog__card">
                <img src="{{ asset('images/homepage/dedication/dedication1.jpg') }}" alt="A closer look at Bon-Ace craftsmanship" loading="lazy">
                <div class="fashion-tools-blog__body">
                    <p class="fashion-tools-blog__eyebrow">Craftsmanship · 01</p>
                    <h3>A craft shaped by dedication</h3>
                    <p>Discover the Filipino and Italian ingenuity behind our distinctive designs.</p>
                    <details>
                        <summary>Read the story <span aria-hidden="true">↗</span></summary>
                        <p>Our works of art emerge from a blend of Filipino and Italian ingenuity. Our commitment to quality guides our product development, design, and craftsmanship.</p>
                    </details>
                </div>
            </article>
            <article class="fashion-tools-blog__card">
                <img src="{{ asset('images/fashion-accessories/bangles.jpg') }}" alt="Bon-Ace bangles made with distinctive materials" loading="lazy">
                <div class="fashion-tools-blog__body">
                    <p class="fashion-tools-blog__eyebrow">Materials · 02</p>
                    <h3>Inspired by natural materials</h3>
                    <p>Unique designs and functionality, brought together through all-natural materials.</p>
                    <details>
                        <summary>Read the story <span aria-hidden="true">↗</span></summary>
                        <p>Bon-Ace creates fashion and lifestyle products from all-natural materials. Our master craftsmen combine skills honed over decades with appropriate technology and methodology.</p>
                    </details>
                </div>
            </article>
            <article class="fashion-tools-blog__card">
                <img src="{{ asset('images/homepage/about-us.jpg') }}" alt="Bon-Ace sculptural designs" loading="lazy">
                <div class="fashion-tools-blog__body">
                    <p class="fashion-tools-blog__eyebrow">Our story · 03</p>
                    <h3>From humble beginnings to worldwide reach</h3>
                    <p>A Philippine story of passion, dedication, and commitment since 1993.</p>
                    <details>
                        <summary>Read the story <span aria-hidden="true">↗</span></summary>
                        <p>BON-ACE (BONghanoy Arts Cum Engineering) began with a small nipa hut as a production area and eight employees. Since 1993, the company has grown into a Philippine-based fashion and lifestyle business with worldwide reach.</p>
                    </details>
                </div>
            </article>
        </div>
    </section>
    <section class="fashion-tools-showcase" aria-labelledby="fashion-tools-showcase-title">
        <h2 id="fashion-tools-showcase-title">A glimpse into the world of Bon-Ace</h2>
        @php
            $showcaseImages = [
                ['path' => 'landing-images/home-decor.jpg', 'name' => 'Home Décor', 'id' => 'home-decor'],
                ['path' => 'fashion-accessories/clutches.jpg', 'name' => 'Clutches', 'id' => 'fashion-accessories'],
                ['path' => 'homepage/dedication/dedication1.jpg', 'name' => 'Bon-Ace Craftsmanship'],
                ['path' => 'fashion-accessories/beaded-bags.jpg', 'name' => 'Beaded Bags'],
                ['path' => 'landing-images/lighting.jpg', 'name' => 'Lighting', 'id' => 'lighting'],
                ['path' => 'landing-images/accent-furniture.jpg', 'name' => 'Accent Furniture', 'id' => 'accent-furniture'],
                ['path' => 'fashion-accessories/necklaces.jpg', 'name' => 'Necklaces'],
                ['path' => 'landing-images/home-decor-2.jpg', 'name' => 'Home Décor Details'],
                ['path' => 'fashion-accessories/bangles.jpg', 'name' => 'Bangles'],
                ['path' => 'landing-images/lighting-2.jpg', 'name' => 'Lighting Details'],
                ['path' => 'homepage/about-us.jpg', 'name' => 'Bon-Ace Sculptural Designs'],
                ['path' => 'fashion-accessories/earrings.jpg', 'name' => 'Earrings'],
                ['path' => 'fashion-accessories/shoes.jpg', 'name' => 'Shoes'],
                ['path' => 'fashion-accessories/components.jpg', 'name' => 'Fashion Components'],
                ['path' => 'homepage/dedication/dedication2.jpg', 'name' => 'Craftsmanship Details'],
                ['path' => 'homepage/dedication/dedication3.jpg', 'name' => 'Bon-Ace Design'],
                ['path' => 'homepage/dedication/dedication4.jpg', 'name' => 'Bon-Ace Materials'],
                ['path' => 'homepage/dedication/dedication5.jpg', 'name' => 'Bon-Ace Dedication'],
            ];
        @endphp
        <div id="product-showcase-grid" class="fashion-tools-showcase__grid">
            @foreach ($showcaseImages as $productImage)
                <figure class="fashion-tools-showcase__tile" @if(isset($productImage['id'])) id="{{ $productImage['id'] }}" @endif @if($loop->index >= 12) hidden data-showcase-extra @endif>
                    <img src="{{ asset('images/' . $productImage['path']) }}" alt="Bon-Ace {{ $productImage['name'] }}" loading="lazy">
                </figure>
            @endforeach
        </div>
        <button class="fashion-tools-showcase__more" type="button" aria-controls="product-showcase-grid" aria-expanded="false" data-showcase-more>More</button>
    </section>
    <footer class="fashion-tools-footer">
        <div class="fashion-tools-footer__main">
            <div class="fashion-tools-footer__brand">
                <a href="/" aria-label="Bon-Ace Lifestyle home">
                    <img src="{{ asset('images/landing-images/bon-ace-logo.jpg') }}" alt="Bon-Ace Lifestyle" loading="lazy">
                </a>
                <p>Distinctive designs.<br>Natural materials. Lasting craftsmanship.</p>
                <span>Philippine ingenuity, worldwide reach since 1993.</span>
            </div>
            <nav class="fashion-tools-footer__links" aria-label="Footer collections">
                <h2>Our collections</h2>
                <a href="#fashion-accessories">Fashion Accessories</a>
                <a href="#home-decor">Home Décor</a>
                <a href="#accent-furniture">Accent Furniture</a>
                <a href="#lighting">Lighting</a>
            </nav>
            <nav class="fashion-tools-footer__links" aria-label="Footer company links">
                <h2>Discover Bon-Ace</h2>
                <a href="#craftsmanship">About Us</a>
                <a href="#product-categories">Craftsmanship</a>
                <a href="#news">The Journal</a>
                <a href="#product-showcase-grid">Product Showcase</a>
            </nav>
        </div>
        <div class="fashion-tools-footer__bottom">
            <p>&copy; {{ date('Y') }} Bon-Ace Fashion Tools, Inc. All rights reserved.</p>
            <a href="#page-top">Back to top <span aria-hidden="true">↑</span></a>
        </div>
    </footer>
    <script>
        const showcaseMore = document.querySelector('[data-showcase-more]');
        showcaseMore?.addEventListener('click', () => {
            const expanded = showcaseMore.getAttribute('aria-expanded') === 'true';
            document.querySelectorAll('[data-showcase-extra]').forEach((tile) => {
                tile.hidden = expanded;
            });
            showcaseMore.setAttribute('aria-expanded', String(!expanded));
            showcaseMore.textContent = expanded ? 'More' : 'Less';
        });

        const parallaxSection = document.querySelector('.fashion-tools-parallax');

        if (parallaxSection) {
            const matchOriginalAboutHeight = () => {
                const measurement = document.createElement('div');
                measurement.className = 'fashion-tools-about';
                measurement.style.cssText = `position:absolute;visibility:hidden;pointer-events:none;width:${parallaxSection.clientWidth}px;left:0;top:0;`;
                measurement.setAttribute('aria-hidden', 'true');
                const imageSpace = document.createElement('div');
                imageSpace.className = 'fashion-tools-about__image';
                const copy = parallaxSection.querySelector('.fashion-tools-parallax__content').cloneNode(true);
                copy.className = 'fashion-tools-about__content';
                measurement.append(imageSpace, copy);
                document.body.append(measurement);
                parallaxSection.style.height = `${measurement.getBoundingClientRect().height}px`;
                measurement.remove();
            };

            matchOriginalAboutHeight();
            window.addEventListener('resize', matchOriginalAboutHeight);
            window.addEventListener('load', matchOriginalAboutHeight);
            document.fonts?.ready.then(matchOriginalAboutHeight);
        }

        const floatingLogo = document.querySelector('.fashion-tools-floating-logo');
        const fashionHeader = document.querySelector('[data-fashion-header]');
        const updateNavigation = () => {
            fashionHeader.classList.toggle('is-compact', window.scrollY > 80);
        };
        window.addEventListener('scroll', updateNavigation, { passive: true });
        updateNavigation();
        const firstNavigationLink = document.querySelector('.fashion-tools-mainnav__links a');

        const alignFloatingLogo = () => {
            if (!floatingLogo || !firstNavigationLink) {
                return;
            }

            const firstLinkLeft = firstNavigationLink.getBoundingClientRect().left;
            const logoWidth = floatingLogo.getBoundingClientRect().width;
            floatingLogo.style.setProperty('--fashion-tools-logo-left', `${Math.max(16, (firstLinkLeft / 2) - (logoWidth / 2))}px`);
        };

        window.addEventListener('resize', alignFloatingLogo);
        window.requestAnimationFrame(alignFloatingLogo);

        const carousel = document.querySelector('[data-fashion-carousel]');

        if (carousel) {
            const slides = [...carousel.querySelectorAll('.fashion-tools-banner__slide')];
            const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
            let activeIndex = 0;
            let timer;

            const showSlide = (index) => {
                activeIndex = (index + slides.length) % slides.length;
                slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === activeIndex));
                dots.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === activeIndex));
            };

            const restartTimer = () => {
                window.clearInterval(timer);
                timer = window.setInterval(() => showSlide(activeIndex + 1), 6000);
            };

            carousel.querySelector('[data-carousel-previous]').addEventListener('click', () => {
                showSlide(activeIndex - 1);
                restartTimer();
            });
            carousel.querySelector('[data-carousel-next]').addEventListener('click', () => {
                showSlide(activeIndex + 1);
                restartTimer();
            });
            dots.forEach((dot, index) => dot.addEventListener('click', () => {
                showSlide(index);
                restartTimer();
            }));

            restartTimer();
        }

        const fashionGallery = document.querySelector('[data-fashion-gallery]');

        if (fashionGallery) {
            const galleryStage = fashionGallery.querySelector('[data-gallery-stage]');
            const galleryCards = [...fashionGallery.querySelectorAll('.fashion-tools-gallery__card')];
            let activeGalleryCard = 2;
            let dragStartX = 0;
            let dragDistance = 0;
            let isDragging = false;
            let isGalleryHovered = false;
            let galleryAutoplay;

            const galleryOffset = (index) => {
                let offset = index - activeGalleryCard;
                const midpoint = Math.floor(galleryCards.length / 2);

                if (offset > midpoint) offset -= galleryCards.length;
                if (offset < -midpoint) offset += galleryCards.length;

                return offset;
            };

            const renderGallery = () => {
                const cardSpacing = Math.min(galleryStage.clientWidth * 0.64, 490);

                galleryCards.forEach((card, index) => {
                    const offset = galleryOffset(index);
                    const distance = Math.abs(offset);
                    const isVisible = distance <= 1;

                    const verticalOffset = distance === 0 ? Math.min(galleryStage.clientHeight * 0.08, 40) : -Math.min(galleryStage.clientHeight * 0.04, 20);
                    card.style.transform = `translateX(calc(-50% + ${offset * cardSpacing}px + var(--gallery-drag-offset, 0px))) translateY(${verticalOffset}px) translateZ(${-distance * 150}px) rotateY(${-offset * 19}deg) scale(${1 - distance * 0.09})`;
                    card.style.opacity = isVisible ? String(1 - distance * 0.19) : '0';
                    card.style.zIndex = String(20 - distance);
                    card.setAttribute('aria-hidden', String(!isVisible));
                });
            };

            const restartGalleryAutoplay = () => {
                window.clearInterval(galleryAutoplay);
                galleryAutoplay = window.setInterval(() => {
                    if (isGalleryHovered || isDragging || document.hidden) return;

                    activeGalleryCard = (activeGalleryCard + 1) % galleryCards.length;
                    renderGallery();
                }, 3000);
            };

            galleryStage.addEventListener('pointerenter', (event) => {
                if (event.pointerType !== 'touch') isGalleryHovered = true;
            });
            galleryStage.addEventListener('pointerleave', () => {
                isGalleryHovered = false;
                restartGalleryAutoplay();
            });

            const finishDrag = () => {
                if (!isDragging) return;

                isDragging = false;
                galleryStage.classList.remove('is-dragging');
                galleryStage.style.setProperty('--gallery-drag-offset', '0px');

                if (Math.abs(dragDistance) > 45) {
                    activeGalleryCard = (activeGalleryCard - Math.sign(dragDistance) + galleryCards.length) % galleryCards.length;
                }

                renderGallery();
                restartGalleryAutoplay();
            };

            galleryStage.addEventListener('pointerdown', (event) => {
                if (event.pointerType === 'mouse' && event.button !== 0) return;

                isDragging = true;
                dragStartX = event.clientX;
                dragDistance = 0;
                galleryStage.classList.add('is-dragging');
                galleryStage.setPointerCapture(event.pointerId);
            });

            galleryStage.addEventListener('pointermove', (event) => {
                if (!isDragging) return;

                dragDistance = event.clientX - dragStartX;
                galleryStage.style.setProperty('--gallery-drag-offset', `${dragDistance * 0.16}px`);
            });

            galleryStage.addEventListener('pointerup', finishDrag);
            galleryStage.addEventListener('pointercancel', finishDrag);
            galleryStage.addEventListener('lostpointercapture', finishDrag);
            window.addEventListener('resize', renderGallery);

            renderGallery();
            restartGalleryAutoplay();
        }

        const typingHeading = document.querySelector('[data-gallery-typing-heading]');

        if (typingHeading && 'IntersectionObserver' in window) {
            const typingLines = [...typingHeading.querySelectorAll('[data-gallery-typing-text]')];
            const gallerySubtext = document.querySelector('[data-gallery-subtext]');
            let hasTyped = false;

            const typeHeadingLine = (lineIndex = 0) => {
                if (!typingLines[lineIndex]) {
                    gallerySubtext?.classList.add('is-visible');
                    return;
                }

                const line = typingLines[lineIndex];
                const text = line.dataset.galleryTypingText;
                let characterIndex = 0;
                line.classList.add('is-typing');

                const typeCharacter = () => {
                    line.textContent = text.slice(0, characterIndex + 1);
                    characterIndex += 1;

                    if (characterIndex < text.length) {
                        window.setTimeout(typeCharacter, 58);
                        return;
                    }

                    line.classList.remove('is-typing');
                    window.setTimeout(() => typeHeadingLine(lineIndex + 1), 180);
                };

                typeCharacter();
            };

            const typingObserver = new IntersectionObserver((entries) => {
                if (!entries.some((entry) => entry.isIntersecting) || hasTyped) return;

                hasTyped = true;
                typingObserver.disconnect();
                typeHeadingLine();
            }, { threshold: 0.35 });

            typingObserver.observe(typingHeading);
        }
    </script>
</body>
</html>
