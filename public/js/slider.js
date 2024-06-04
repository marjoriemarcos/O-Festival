export const slider = {
    currentIndex: 0,  // Current index of the slider
    itemsPerPage: 4,  // Number of items displayed per page
    slideContainer: null,  // Slides container
    slides: [],  // List of slides
    totalItems: 0,  // Total number of items
    interval: null,  // Interval identifier for automatic scrolling

    // Initialize the slider
    init: function () {
        // Select the slide container
        slider.slideContainer = document.querySelector(".home-artist-list-slide");
        // Get all slides
        slider.slides = Array.from(document.querySelectorAll(".home-artist-list-slide-artist"));
        // Set the total number of items
        slider.totalItems = slider.slides.length;

        // Check if the slider is needed before proceeding
        if (slider.slideContainer && slider.slides.length > 0) {
            // Add an event listener to update the number of items per page when resizing the window
            window.addEventListener("resize", slider.updateItemsPerPage);
            // Update the number of items per page based on the window size
            slider.updateItemsPerPage();
            // Update the display of slides
            slider.updateDisplay();
            // Bind navigation buttons to corresponding functions
            slider.bind();

            // Start automatic scrolling
            slider.startAutoSlide();
        }
    },

    // Bind navigation buttons to corresponding functions
    bind: function () {
        document.querySelector(".home-artist-list-slide-prev").addEventListener("click", slider.showPrev);
        document.querySelector(".home-artist-list-slide-next").addEventListener("click", slider.showNext);

        // Stop automatic slide when mouse hovers over slide container
        slider.slideContainer.addEventListener("mouseenter", slider.stopAutoSlide);
        slider.slideContainer.addEventListener("mouseleave", slider.startAutoSlide);
    },

    // Update the number of items per page based on the window size
    updateItemsPerPage: function () {
        const screenWidth = window.innerWidth;
        slider.itemsPerPage = screenWidth < 775 ? 1 : 4;
        slider.updateDisplay();
    },

    // Update the display of slides
    updateDisplay: function () {
        slider.slides.forEach((slide, index) => {
            // Display slides between the current index and the current index + the number of items per page
            slide.style.display = index >= slider.currentIndex && index < slider.currentIndex + slider.itemsPerPage ? "block" : "none";
        });
    },

    // Show the previous slide
    showPrev: function () {
        // Decrement the current index or set it to the end if at the beginning
        slider.currentIndex = slider.currentIndex > 0 ? slider.currentIndex - 1 : slider.totalItems - slider.itemsPerPage;
        slider.updateDisplay();
    },

    // Show the next slide
    showNext: function () {
        // Increment the current index or set it to the beginning if at the end
        slider.currentIndex = slider.currentIndex < slider.totalItems - slider.itemsPerPage ? slider.currentIndex + 1 : 0;
        slider.updateDisplay();
    },

    // Start automatic scrolling
    startAutoSlide: function () {
        // Change slides every 3 seconds
        slider.interval = setInterval(slider.showNext, 3000);
    },

    // Stop automatic scrolling
    stopAutoSlide: function () {
        clearInterval(slider.interval);
    }
};
