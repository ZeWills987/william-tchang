console.log("Mon script est bien chargé !");

const swiperContainer = document.querySelector(".swiper-projects");

if (swiperContainer) {
    console.log("Swiper est défini, initialisation du slider...");
    new Swiper(".swiper-projects", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: { delay: 5000 },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        pagination: { el: ".swiper-pagination" },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
        },
    });
}

// Menu Burger
const header = document.querySelector("header");
if (header) {
    console.log("Header trouvé, initialisation du menu burger...");
    const menu = header.querySelector('.nav-items');
    const burger_btn = header.querySelector('svg');
    if (burger_btn && menu) {
        console.log("Menu burger et menu trouvés, ajout de l'événement de clic...");
        burger_btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
}