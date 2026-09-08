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


// victim slide
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".victim-slide");

    if (!slides.length) return;
    let current = 0;

    slides[current].classList.add("active");

    setInterval(() => {
        slides[current].classList.remove("active");
        current = (current + 1) % slides.length;
        slides[current].classList.add("active");
    }, 15000);
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