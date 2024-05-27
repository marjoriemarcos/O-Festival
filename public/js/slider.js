export const slider = {
    currentIndex: 0,
    itemsPerPage: 4,
    slideContainer: null,
    slides: [],

    init: function () {
        slider.slideContainer = document.querySelector(".home-programming-slide");
        slider.slides = Array.from(document.querySelectorAll(".home-programming-slide-artist"));
        slider.totalItems = slider.slides.length;

        window.addEventListener("resize", slider.updateItemsPerPage);
        slider.updateItemsPerPage();
        slider.updateDisplay();
        slider.bind();
    },

    bind: function () {
        document.querySelector(".home-programming-slide-prev").addEventListener("click", slider.showPrev);
        document.querySelector(".home-programming-slide-next").addEventListener("click", slider.showNext);
    },

    updateItemsPerPage: function () {
        const screenWidth = window.innerWidth;
        slider.itemsPerPage = screenWidth < 775 ? 1 : 4;
        slider.updateDisplay();
    },

    updateDisplay: function () {
        slider.slides.forEach((slide, index) => {
            slide.style.display = index >= slider.currentIndex && index < slider.currentIndex + slider.itemsPerPage ? "block" : "none";
        });
    },

    showPrev: function () {
        slider.currentIndex = slider.currentIndex > 0 ? slider.currentIndex - 1 : slider.totalItems - 1;
        slider.updateDisplay();
    },

    showNext: function () {
        slider.currentIndex = slider.currentIndex < slider.totalItems - 1 ? slider.currentIndex + 1 : 0;
        slider.updateDisplay();
    }
};

document.addEventListener("DOMContentLoaded", slider.init);
