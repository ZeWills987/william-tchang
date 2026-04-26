import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        console.log("Connexion du Swiper via Stimulus...");
        this.swiper = new Swiper(this.element, {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: { delay: 2000 },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: { el: ".swiper-pagination", clickable: true },
            breakpoints: {
                640: { slidesPerView: 1.5, spaceBetween: 20 },
                1024: { slidesPerView: 2, spaceBetween: 30 },
            },
        });
        console.log("Swiper connecté via Stimulus !");
    }

    disconnect() {
        if (this.swiper) {
            this.swiper.destroy();
        }
    }
}