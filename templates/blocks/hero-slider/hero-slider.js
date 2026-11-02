import { Carousel } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.block__hero-slider .carousel').forEach((slider) => {
        Carousel.getOrCreateInstance(slider, { interval: false, ride: false });
    });
});
