// navMenu.js

export const navMenu = {
    // Éléments du menu burger et de la barre de navigation
    menuBurgerElement: null,
    navBarreElement: null,

    // Initialisation de la fonction
    init: function () {
        // Initialisation des éléments HTML
        navMenu.initElements();
        // Vérification que les éléments ont bien été trouvés avant de gérer les événements
        if (navMenu.menuBurgerElement && navMenu.navBarreElement) {
            // Gestion des événements
            navMenu.bind();
        }
    },

    // Initialisation des éléments HTML
    initElements: function () {
        navMenu.menuBurgerElement = document.querySelector(".hamburger");
        navMenu.navBarreElement = document.querySelector(".nav-menu");
    },

    // Gestion des événements
    bind: function () {
        // Ajout d'un écouteur d'événement au clic sur le menu burger
        navMenu.menuBurgerElement.addEventListener("click", navMenu.toggleMenu);
    },

    // Gestionnaire d'événements pour le clic sur le menu burger
    toggleMenu: function () {
        // Ajout/Suppression de la classe "active" pour le menu burger
        navMenu.menuBurgerElement.classList.toggle("active");
        // Ajout/Suppression de la classe "active" pour la barre de navigation
        navMenu.navBarreElement.classList.toggle("active");
    }
};

