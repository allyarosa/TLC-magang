document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.getElementById("banner-carousel");
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    let currentIndex = 0;
    const totalSlides = slides.length;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;

        // Update dot active state
        dots.forEach(dot => dot.classList.remove("bg-opacity-100", "active"));
        dots[currentIndex].classList.add("bg-opacity-100", "active");
    }

    document.getElementById("prevBtn").addEventListener("click", function() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });

    document.getElementById("nextBtn").addEventListener("click", function() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener("click", function() {
            currentIndex = index;
            updateCarousel();
        });
    });

    setInterval(function() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }, 5000);
});

// Add touch animations for interactive elements
document.addEventListener('DOMContentLoaded', function() {
    const interactiveElements = document.querySelectorAll(
        '.level-box, .test-box, .result-item, .cert-item, .curved-arrow-left, .curved-arrow-right');

    interactiveElements.forEach(elem => {
        elem.addEventListener('touchstart', function() {
            this.classList.add('active');
        });

        elem.addEventListener('touchend', function() {
            this.classList.remove('active');
        });
    });
});