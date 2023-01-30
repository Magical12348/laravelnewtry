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

new Swiper("#swiper-container-continous", {
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 1,
        disableOnInteraction: false,
    },
    slidesPerView: 2,
    speed: 3500,
    grabCursor: true,
    mousewheelControl: true,
    keyboardControl: true,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
    // navigation: {
    //   nextEl: ".swiper-button-next",
    //   prevEl: ".swiper-button-prev"
    // }
});

// setTimeout("openPopup()", 120000); // for 2 min

// function openPopup() {
//   document.getElementById('modified_popup').classList.add("popup_active");
//   setTimeout(Popup(),480000); // for 8 min
// }

// function closePopup() {
//     document.getElementById('modified_popup').classList.remove("popup_active");
// }

// function Popup() {
//     setInterval(openPopup,480000); // for 8 min
// }

document.getElementById("year").innerHTML = new Date().getFullYear();

const nav = document.getElementById("navbar");

window.addEventListener("scroll", (e) => {
    if (this.scrollY > 30) {
        nav.classList.add("shadow-box");
    } else {
        nav.classList.remove("shadow-box");
    }
});
