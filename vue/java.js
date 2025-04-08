// Fonction pour convertir un champ en majuscules après la saisie
function convertirEnMajuscules(id) {
    const input = document.getElementById(id);
    input.addEventListener("blur", function() {
        this.value = this.value.toUpperCase();
    });
}

// Appliquer la conversion aux champs NOM et PRÉNOM
convertirEnMajuscules("nom");
convertirEnMajuscules("prenom");

// Sélectionne le bouton
const topButton = document.getElementById("topButton");

// Afficher le bouton lorsque l'utilisateur descend
window.onscroll = function () {
    if (document.documentElement.scrollTop > 300) {
        topButton.style.display = "block"; // Affiche le bouton
    } else {
        topButton.style.display = "none"; // Cache le bouton
    }
};

// Fonction pour remonter en haut de la page en douceur
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function toggleMenu() {
    document.querySelector("nav").classList.toggle("nav-active");
}