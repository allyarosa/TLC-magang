document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    const profileButton = document.getElementById("profile-button");
    const profileMenu = document.getElementById("profile-menu");
    profileButton.addEventListener("click", function (event) {
        event.stopPropagation();
        profileMenu.classList.toggle("hidden");
    });
    document.addEventListener("click", function (event) {
        if (!profileMenu.contains(event.target) && !profileButton.contains(event.target)) {
            profileMenu.classList.add("hidden");
        }
    });
});

document.querySelectorAll('.group').forEach(group => {
    group.addEventListener('mouseenter', () => {
        const number = group.querySelector('span');
        number.classList.add('animate__animated', 'animate__pulse');
        setTimeout(() => {
            number.classList.remove('animate__animated', 'animate__pulse');
        }, 1000);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('webinar-slider');
    const sliderWrapper = slider.querySelector('.slider-wrapper');
    const slides = slider.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    const prevButton = document.getElementById('prev-slide');
    const nextButton = document.getElementById('next-slide');

    let currentSlide = 0;
    const totalSlides = slides.length;

    function updateSlider() {
        const slideWidth = slides[0].offsetWidth;
        sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        indicators.forEach((indicator, index) => {
            if (index === currentSlide) {
                indicator.classList.remove('bg-blue-300', 'w-2');
                indicator.classList.add('bg-blue-600', 'w-6');
            } else {
                indicator.classList.remove('bg-blue-600', 'w-6');
                indicator.classList.add('bg-blue-300', 'w-2');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    indicators.forEach((indicator) => {
        indicator.addEventListener('click', () => {
            currentSlide = parseInt(indicator.dataset.slide);
            updateSlider();
        });
    });

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    // Auto slide
    setInterval(nextSlide, 5000);
    updateSlider();

    window.addEventListener('resize', updateSlider);

    // Swipe for mobile
    let startX = 0;
    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });
    slider.addEventListener('touchend', (e) => {
        let endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) nextSlide();
        if (endX - startX > 50) prevSlide();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('testimonialTrack');
    const slides = document.querySelectorAll('.testimonial-slide');
    let currentIndex = 0;

    function getSlideWidth() {
        return slides[0].offsetWidth + 16; // width + gap
    }

    function goToSlide(index) {
        track.style.transform = `translateX(-${index * getSlideWidth()}px)`;
    }

    function autoScroll() {
        currentIndex++;
        if (currentIndex >= slides.length) {
            currentIndex = 0;
        }
        goToSlide(currentIndex);
    }

    let interval = setInterval(autoScroll, 5000);

    // Swipe
    let startX = 0;
    let isDragging = false;

    track.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
        clearInterval(interval);
    });

    track.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const currentX = e.touches[0].clientX;
        const diff = startX - currentX;
        if (diff > 50) {
            currentIndex++;
            if (currentIndex >= slides.length) currentIndex = 0;
            goToSlide(currentIndex);
            isDragging = false;
        } else if (diff < -50) {
            currentIndex--;
            if (currentIndex < 0) currentIndex = slides.length - 1;
            goToSlide(currentIndex);
            isDragging = false;
        }
    });

    track.addEventListener('touchend', () => {
        isDragging = false;
        interval = setInterval(autoScroll, 5000);
    });

    window.addEventListener('resize', () => {
        goToSlide(currentIndex);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("testimonialContainer");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    let autoScroll;

    function startAutoScroll() {
        autoScroll = setInterval(() => {
            container.scrollBy({
                left: container.offsetWidth * 0.9,
                behavior: "smooth"
            });
            if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 5) {
                container.scrollTo({
                    left: 0,
                    behavior: "smooth"
                });
            }
        }, 3500);
    }

    function stopAutoScroll() {
        clearInterval(autoScroll);
    }

    nextBtn.addEventListener("click", () => {
        stopAutoScroll();
        container.scrollBy({
            left: container.offsetWidth * 0.9,
            behavior: "smooth"
        });
        startAutoScroll();
    });

    prevBtn.addEventListener("click", () => {
        stopAutoScroll();
        container.scrollBy({
            left: -container.offsetWidth * 0.9,
            behavior: "smooth"
        });
        startAutoScroll();
    });

    container.addEventListener("mouseenter", stopAutoScroll);
    container.addEventListener("mouseleave", startAutoScroll);

    startAutoScroll();
});
document.addEventListener('DOMContentLoaded', function () {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(document.querySelectorAll('.carousel-slide'));
    const dots = Array.from(document.querySelectorAll('.dot'));
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');

    let currentIndex = 0;
    const slideWidth = 100; // 100%

    // Initialize the carousel
    function updateCarousel() {
        // Update track position with smooth animation
        track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-teal-500');
            } else {
                dot.classList.remove('bg-teal-500');
                dot.classList.add('bg-gray-300');
            }
        });

        // Update button states
        prevButton.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextButton.style.opacity = currentIndex === slides.length - 1 ? '0.5' : '1';
    }

    // Handle prev button click
    prevButton.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    // Handle next button click
    nextButton.addEventListener('click', function () {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Handle dot clicks
    dots.forEach((dot) => {
        dot.addEventListener('click', function () {
            currentIndex = parseInt(this.getAttribute('data-index'));
            updateCarousel();
        });
    });

    // Auto slide every 5 seconds
    let autoSlideInterval = setInterval(autoSlide, 5000);

    function autoSlide() {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    }

    // Pause auto slide on hover
    const carouselContainer = document.querySelector('.carousel-container');
    carouselContainer.addEventListener('mouseenter', function () {
        clearInterval(autoSlideInterval);
    });

    carouselContainer.addEventListener('mouseleave', function () {
        autoSlideInterval = setInterval(autoSlide, 5000);
    });

    // Touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carouselContainer.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    carouselContainer.addEventListener('touchend', function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left
            if (currentIndex < slides.length - 1) {
                currentIndex++;
                updateCarousel();
            }
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }
    }

    // Initialize
    updateCarousel();
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 15,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        640: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
    }
});
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