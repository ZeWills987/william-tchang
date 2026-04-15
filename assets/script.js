console.log("Mon script est bien chargé !");

const swiperContainer = document.querySelector(".swiper-projects");

if (swiperContainer) {
    console.log("Swiper est défini, initialisation du slider...");
    new Swiper(".swiper-projects", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        autoplay: { delay: 5000 },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        pagination: { el: ".swiper-pagination" },
    });
}

// Menu Burger
const header = document.querySelector("header");
if (header) {
    const menu = header.querySelector('.nav-items');
    const burger_btn = header.querySelector('svg');
    if (burger_btn && menu) {
        burger_btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
}