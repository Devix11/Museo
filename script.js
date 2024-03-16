let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("carousel-slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); // Cambia immagine ogni 5 secondi
}

// Ottieni il colore di sfondo della navbar
const navbarColor = window.getComputedStyle(document.querySelector('.navbar')).backgroundColor;

// Applica il colore di sfondo della navbar alla scrollbar
document.documentElement.style.setProperty('--scrollbar-background-color', navbarColor);