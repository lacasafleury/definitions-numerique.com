document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".menu-button");
    const currentPage = window.location.pathname.split("/").pop(); // Récupère le fichier de la page actuelle

    buttons.forEach(button => {
        if (button.getAttribute("href") === currentPage) {
            button.classList.add("active"); // Ajoute la classe active au bouton correspondant
        } else {
            button.classList.remove("active"); // Assure que les autres boutons ne sont pas actifs
        }
    });
});
