/* Template: Pavo Mobile App Website Tailwind CSS HTML Template
   Description: Custom JS file
*/
import("./bootstrap");
import "@nextapps-be/livewire-sortablejs";

// Swiper
import Swiper, { Navigation, Autoplay } from 'swiper';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/autoplay';

// init Swiper:
const swiper = new Swiper('.swiper', {
    modules: [ Navigation, Autoplay ],
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
        delay: 5000,
      },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 0,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 0,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 0,
      },
      1280: {
          slidesPerView: 5,
          spaceBetween: 0,
        },
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import "../sass/app.scss";

/// Result quiz progress   ////

var percentageComplete = 0.9;
var strokeDashOffsetValue = 100 - percentageComplete * 100;
var progressBar = $(".js-progress-bar");
progressBar.css("stroke-dashoffset", strokeDashOffsetValue);

/// End of result quiz progress
