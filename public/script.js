// featured cases rotation
document.addEventListener("DOMContentLoaded", () => {
    const cases = window.featuredCases || [];
    let active = 0;

    function renderCase(index) {
        const c = cases[index];
        if (!c) return;

        document.getElementById('fc-title').innerText = c.title;
        document.getElementById('fc-type').innerText = c.type;
        document.getElementById('fc-description').innerText = c.description;
        document.getElementById('fc-link').href = c.link;
    }

    function rotateCases() {
        if (cases.length === 0) return;
        active = (active + 1) % cases.length;
        renderCase(active);
    }

    if (cases.length > 0) {
        renderCase(active);
        setInterval(rotateCases, 10000);
    }
});


// light/dark mode theme switch
function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
}

function toggleTheme() {
    const current = localStorage.getItem("theme") || "dark";
    const next = current === "dark" ? "light" : "dark";
    setTheme(next);
}

(function () {
    const saved = localStorage.getItem("theme") || "dark";
    setTheme(saved);
})();


// faq button dropdown
document.querySelectorAll(".faq-question").forEach(button => {
    button.addEventListener("click", () => {
        button.parentElement.classList.toggle("active");
    });
});


// discussion character count
// finds each discussion textarea
document.querySelectorAll('.discussion-form textarea').forEach(textarea => {
    const counter = textarea
        .closest('.discussion-form')
        .querySelector('.character-count');

    const updateCounter = () => {
        counter.textContent = textarea.value.length;
    };

    textarea.addEventListener('input', updateCounter);

    updateCounter();
});


// victims slider controls
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.victim-slide');

    if (slides.length === 0) {
        return;
    }

    let currentSlide = 0;
    let victimSliderInterval;

    function showVictimSlide(index) {
        if (index >= slides.length) {
            index = 0;
        }

        if (index < 0) {
            index = slides.length - 1;
        }

        slides.forEach((slide) => {
            slide.classList.remove('active');
        });

        slides[index].classList.add('active');

        currentSlide = index;
    }

    function nextVictimSlide() {
        showVictimSlide(currentSlide + 1);
    }

    function previousVictimSlide() {
        showVictimSlide(currentSlide - 1);
    }

    function startVictimSlider() {
        clearInterval(victimSliderInterval);
        victimSliderInterval = setInterval(() => {
            nextVictimSlide();
        }, 60000);
    }

    document.querySelectorAll('.victim-next').forEach((button) => {
        button.addEventListener('click', function () {
            nextVictimSlide();
            startVictimSlider();
        });
    });

    document.querySelectorAll('.victim-prev').forEach((button) => {
        button.addEventListener('click', function () {
            previousVictimSlide();
            startVictimSlider();
        });
    });

    showVictimSlide(0);
    startVictimSlider();
});