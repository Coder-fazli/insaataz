
    var swiper = new Swiper(".about__slider", {
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-prev",
            prevEl: ".swiper-next",
        },
        loop:true,
        slidesPerView:4,
        autoplay: {
            delay: 2000, // Otomatik oynatma süresi (ms cinsinden)
        },
        breakpoints:{
            280:{
                slidesPerView:2
                
            },
            768:{
                slidesPerView:3
                
            },
            1200:{
                slidesPerView:4
            }
        },
        spaceBetween:20,
    });
    
    
    
    var swiper = new Swiper(".partners__slider", {
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".partner-prev",
            prevEl: ".partner-next",
        },
        loop:true,
        slidesPerView:4,
        autoplay: {
            delay: 2000, // Otomatik oynatma süresi (ms cinsinden)
        },
        breakpoints:{
            280:{
                slidesPerView:2
                
            },
            768:{
                slidesPerView:3
                
            },
            1200:{
                slidesPerView:4
            }
        },
        spaceBetween:20,
    });
    