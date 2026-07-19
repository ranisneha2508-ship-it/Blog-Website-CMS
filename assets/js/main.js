document.addEventListener("DOMContentLoaded", function(){

    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".nav-menu");

    menuToggle.addEventListener("click", function(){

        navMenu.classList.toggle("active");

    });

});

const swiper = new Swiper(".testimonialSwiper", {
    loop:true,
    navigation:{
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev",
    }
});

$(document).ready(function () {

    $('.banner-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800
    });

});

$(window).scroll(function(){

    if($(this).scrollTop() > 50){
        $('.header').addClass('sticky');
    }else{
        $('.header').removeClass('sticky');
    }

});
$(window).scroll(function(){

    if($(this).scrollTop() > 300){
        $(".scroll-top").addClass("show");
    }else{
        $(".scroll-top").removeClass("show");
    }

});