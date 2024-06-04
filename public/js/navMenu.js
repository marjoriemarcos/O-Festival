// navMenu.js

export const navMenu = {
    // Elements for the burger menu and the navigation bar
    menuBurgerElement: null,
    navBarreElement: null,

    // Initialization function
    init: function () {
        // Initialize HTML elements
        navMenu.initElements();
        // Check if elements have been successfully found before handling events
        if (navMenu.menuBurgerElement && navMenu.navBarreElement) {
            // Bind event handlers
            navMenu.bind();
        }
    },

    // Initialize HTML elements
    initElements: function () {
        navMenu.menuBurgerElement = document.querySelector(".hamburger");  // Select the burger menu element
        navMenu.navBarreElement = document.querySelector(".nav-menu");    // Select the navigation bar element
    },

    // Bind event handlers
    bind: function () {
        // Add a click event listener to the burger menu
        navMenu.menuBurgerElement.addEventListener("click", navMenu.toggleMenu);
    },

    // Event handler for the burger menu click
    toggleMenu: function () {
        // Toggle the "active" class on the burger menu element
        navMenu.menuBurgerElement.classList.toggle("active");
        // Toggle the "active" class on the navigation bar element
        navMenu.navBarreElement.classList.toggle("active");
    }
};
