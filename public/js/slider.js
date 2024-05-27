export const slider = {
    currentIndex: 0, // Index de la diapositive actuellement visible
    itemsPerPage: 4, // Nombre d'éléments à afficher par page
    slideContainer: null, // Conteneur du slider
    slideInner: null, // Partie intérieure du slider
    slides: [], // Tableau des diapositives
    totalItems: 0, // Nombre total d'éléments
    slideInterval: null, // ID de l'intervalle du défilement automatique

    // Initialisation du slider
    init: function () {
        slider.slideContainer = document.querySelector(".home-programming-slide");
        slider.slideInner = document.createElement('div');
        slider.slideInner.classList.add('home-programming-slide-inner');
        slider.slideContainer.appendChild(slider.slideInner);

        // Récupération des diapositives
        slider.slides = Array.from(document.querySelectorAll(".home-programming-slide-artist"));
        slider.totalItems = slider.slides.length;

        // Ajout des diapositives dans la partie intérieure du slider
        slider.slides.forEach(slide => {
            slider.slideInner.appendChild(slide);
        });

        // Duplication des diapositives pour l'effet infini
        slider.slides.forEach(slide => {
            const clone = slide.cloneNode(true);
            slider.slideInner.appendChild(clone);
        });

        // Gestion des événements de redimensionnement de la fenêtre
        window.addEventListener("resize", slider.updateItemsPerPage);
        slider.updateItemsPerPage();

        // Liaison des boutons précédent et suivant
        slider.bind();

        // Démarrage du défilement automatique
        slider.startAutoSlide();
    },

    // Liaison des événements aux boutons précédent et suivant
    bind: function () {
        document.querySelector(".home-programming-slide-prev").addEventListener("click", slider.showPrev);
        document.querySelector(".home-programming-slide-next").addEventListener("click", slider.showNext);
    },

    // Mise à jour du nombre d'éléments à afficher par page en fonction de la largeur de la fenêtre
    updateItemsPerPage: function () {
        const screenWidth = window.innerWidth;
        slider.itemsPerPage = screenWidth < 767 ? 1 : 4;
        slider.updateDisplay();
    },

    // Mise à jour de l'affichage des diapositives
    updateDisplay: function () {
        const screenWidth = window.innerWidth;
        if (screenWidth < 767) {
            // Pour les écrans plus petits que 767px, nous voulons que chaque slide occupe toute la largeur
            const slideWidth = slider.slideContainer.offsetWidth;
            slider.slideInner.style.transform = `translateX(${-slider.currentIndex * slideWidth}px)`;
        } else {
            // Pour les écrans plus grands, nous utilisons la même logique que précédemment
            const slideWidth = slider.slideContainer.offsetWidth / slider.itemsPerPage;
            slider.slideInner.style.transform = `translateX(${-slider.currentIndex * slideWidth}px)`;
        }
    },
    // Affichage de la diapositive précédente
    showPrev: function () {
        slider.currentIndex--;
        if (slider.currentIndex < 0) {
            slider.slideInner.style.transition = 'none';
            slider.currentIndex = slider.totalItems - slider.itemsPerPage;
            slider.updateDisplay();
            requestAnimationFrame(() => {
                slider.slideInner.style.transition = 'transform 0.5s ease';
                slider.currentIndex--;
                slider.updateDisplay();
            });
        } else {
            slider.updateDisplay();
        }
        slider.restartAutoSlide();
    },

    // Affichage de la diapositive suivante
    showNext: function () {
        slider.currentIndex++;
        if (slider.currentIndex >= slider.totalItems) {
            slider.slideInner.style.transition = 'none';
            slider.currentIndex = 0;
            slider.updateDisplay();
            requestAnimationFrame(() => {
                slider.slideInner.style.transition = 'transform 0.5s ease';
                slider.currentIndex++;
                slider.updateDisplay();
            });
        } else {
            slider.updateDisplay();
        }
        slider.restartAutoSlide();
    },

    // Démarrage du défilement automatique
    startAutoSlide: function () {
        slider.slideInterval = setInterval(slider.showNext, 5000);
    },

    // Redémarrage du défilement automatique
    restartAutoSlide: function () {
        clearInterval(slider.slideInterval);
        slider.startAutoSlide();
    }
};

// Initialisation du slider lorsque le DOM est chargé
document.addEventListener("DOMContentLoaded", slider.init);
