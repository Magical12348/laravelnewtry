require("./bootstrap");

import AOS from "aos";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

AOS.init();

new Swiper("#mySwiper", {
    spaceBetween: 30,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    speed: 1000,
    keyboard: {
        enabled: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    slidesPerView: "auto",
    loop: true,
    autoplay: {
        delay: 6000,
        disableOnInteraction: true,
    },
});

// new Swiper("#swiper-container-continous", {
//     spaceBetween: 30,
//     loop: true,
//     autoplay: {
//         delay: 1,
//         disableOnInteraction: false,
//     },
//     slidesPerView: 3,
//     speed: 3500,
//     grabCursor: true,
//     mousewheelControl: true,
//     keyboardControl: true,
//     breakpoints: {
//         640: {
//             slidesPerView: 5,
//             spaceBetween: 20,
//         },
//         768: {
//             slidesPerView: 7,
//             spaceBetween: 40,
//         },
//     },
// });

if (sessionStorage.getItem("popup")) {
    setTimeout(openPopup, 300000); // for 5 min
} else {
    setTimeout(openPopup, 10000); // for 10 sec
}

clearTimeout(openPopup);

function openPopup() {
    document.getElementById("contact-popup").setAttribute("open");
    setInterval(Popup, 300000); // for 5 min

    if (!sessionStorage.getItem("popup")) {
        sessionStorage.setItem("popup", 1);
    }
}

function Popup() {
    document.getElementById("contact-popup").setAttribute("open");
}

document.getElementById("year").innerHTML = new Date().getFullYear();
