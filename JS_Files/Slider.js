var swiperCategory = new Swiper(".product_slider", {
    spaceBetween: 24,
    loop: true,
    speed: 1500,
    autoplay: {
        delay: 1000,  
        disableOnInteraction: false,  
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1400: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});

