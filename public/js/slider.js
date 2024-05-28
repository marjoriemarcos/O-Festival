// slider.js

export const slider = {
    currentIndex: 0,  // Index actuel du slider
    itemsPerPage: 4,  // Nombre d'éléments affichés par page
    slideContainer: null,  // Conteneur des diapositives
    slides: [],  // Liste des diapositives
    totalItems: 0,  // Nombre total d'éléments
    interval: null,  // Identifiant de l'intervalle pour le défilement automatique

    // Initialisation du slider
    init: function () {
        // Sélectionne le conteneur des diapositives
        slider.slideContainer = document.querySelector(".home-artist-list-slide");
        // Récupère toutes les diapositives
        slider.slides = Array.from(document.querySelectorAll(".home-artist-list-slide-artist"));
        // Définit le nombre total d'éléments
        slider.totalItems = slider.slides.length;

        // Ajoute un écouteur d'événement pour mettre à jour le nombre d'éléments par page lors du redimensionnement de la fenêtre
        window.addEventListener("resize", slider.updateItemsPerPage);
        // Met à jour le nombre d'éléments par page en fonction de la taille de la fenêtre
        slider.updateItemsPerPage();
        // Met à jour l'affichage des diapositives
        slider.updateDisplay();
        // Lie les boutons de navigation aux fonctions correspondantes
        slider.bind();

        // Démarre le défilement automatique
        slider.startAutoSlide();
    },

    // Lie les boutons de navigation aux fonctions correspondantes
    bind: function () {
        document.querySelector(".home-artist-list-slide-prev").addEventListener("click", slider.showPrev);
        document.querySelector(".home-artist-list-slide-next").addEventListener("click", slider.showNext);
    },

    // Met à jour le nombre d'éléments par page en fonction de la taille de la fenêtre
    updateItemsPerPage: function () {
        const screenWidth = window.innerWidth;
        slider.itemsPerPage = screenWidth < 775 ? 1 : 4;
        slider.updateDisplay();
    },

    // Met à jour l'affichage des diapositives
    updateDisplay: function () {
        slider.slides.forEach((slide, index) => {
            // Affiche les diapositives comprises entre l'index courant et l'index courant + le nombre d'éléments par page
            slide.style.display = index >= slider.currentIndex && index < slider.currentIndex + slider.itemsPerPage ? "block" : "none";
        });
    },

    // Affiche la diapositive précédente
    showPrev: function () {
        // Décrémente l'index courant ou le remet à la fin si on est au début
        slider.currentIndex = slider.currentIndex > 0 ? slider.currentIndex - 1 : slider.totalItems - slider.itemsPerPage;
        slider.updateDisplay();
    },

    // Affiche la diapositive suivante
    showNext: function () {
        // Incrémente l'index courant ou le remet au début si on est à la fin
        slider.currentIndex = slider.currentIndex < slider.totalItems - slider.itemsPerPage ? slider.currentIndex + 1 : 0;
        slider.updateDisplay();
    },

    // Démarre le défilement automatique
    startAutoSlid: function () {
        // Change les diapositives toutes les 3 secondes
        slider.interval = setInterval(slider.showNext, 3000);
    },

    // Arrête le défilement automatique
    stopAutoSlide: function () {
        clearInterval(slider.interval);
    }
};
