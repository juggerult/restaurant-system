document.addEventListener("DOMContentLoaded", function() {
    const backgrounds = [
        "https://restoran5el.com.ua/image/catalog/about/rest_kuhnia_008.jpg",
        "https://restoran5el.com.ua/image/catalog/about/rest_kuhnia_005.jpg",
        "https://restoran5el.com.ua/image/catalog/about/rest_kuhnia_004.jpg"
    ];
    const randomIndex = Math.floor(Math.random() * backgrounds.length);
    const randomBackground = backgrounds[randomIndex];
    const headerOverlay = document.querySelector(".header-owerlay");
    headerOverlay.style.backgroundImage = `url('${randomBackground}')`;
});
