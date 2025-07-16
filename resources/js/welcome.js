window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload();
    }
};
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll("#navbar-sticky a");

    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            navLinks.forEach(navLink => navLink.classList.remove("text-blue-700",
                "dark:text-blue-500", "font-bold")); // Hapus kelas dari semua tautan
            this.classList.add("text-blue-700", "dark:text-blue-500",
                "font-bold"); // Tambahkan kelas ke tautan yang diklik
        });
    });
});
// Autoslide logic
const carouselContent = document.getElementById('carousel-content');
const items = carouselContent.children;
let index = 0;

setInterval(() => {
    index = (index + 1) % items.length;
    carouselContent.style.transform = `translateX(-${index * 100}%)`;
}, 5000); // Change slide every 5 seconds


// ScrollReveal().reveal('.view');
ScrollReveal().reveal('.view', {
    origin: 'right',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view2', {
    origin: 'left',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view3', {
    origin: 'right',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view4', {
    origin: 'left',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view5', {
    origin: 'right',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view6', {
    origin: 'left',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view7', {
    origin: 'right',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});
ScrollReveal().reveal('.view8', {
    origin: 'left',
    distance: '50px',
    duration: 800,
    delay: 200,
    easing: 'ease-in-out',
    reset: true
});