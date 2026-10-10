<script setup>
const landingBackground = {
    backgroundImage: "url('/images/customer/landing-pattern.png')",
};

const logoSrc = '/images/landing-images/bon-ace-logo.jpg';

const collageImages = [
    { className: 'landing-page__tile--decor', src: '/images/customer/home-decor-photo.jpg', alt: 'Bon-Ace decorative bowl', title: 'Home Décor' },
    { className: 'landing-page__tile--fashion', src: '/images/landing-images/fashion-accessories.jpg', alt: 'Bon-Ace fashion accessories', title: 'Fashion Accessories' },
    { className: 'landing-page__tile--furniture', src: '/images/landing-images/accent-furniture.jpg', alt: 'Bon-Ace accent furniture', title: 'Accent Furniture' },
    { className: 'landing-page__tile--lighting', src: '/images/landing-images/lighting.jpg', alt: 'Bon-Ace lighting', title: 'Lighting' },
];
</script>

<template>
    <main class="landing-page" :style="landingBackground">
        <div class="landing-page__collage" aria-hidden="true">
            <figure v-for="image in collageImages" :key="image.className" class="landing-page__tile" :class="image.className">
                <img :src="image.src" :alt="image.alt">
                <figcaption class="landing-page__tile-label">{{ image.title }}</figcaption>
            </figure>
        </div>
        <a class="landing-page__brand" href="/bon-ace-fashion-tools" aria-label="Visit Bon-Ace Fashion Tools">
            <img class="landing-page__logo" :src="logoSrc" alt="Bon-Ace Lifestyle">
        </a>
    </main>
</template>
