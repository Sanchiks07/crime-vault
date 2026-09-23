// ===== FEATURED CASES ROTATION =====
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


// ===== LIGHT / DARK MODE THEME SWITCH =====
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


// ===== FAQ BUTTON DROPDOWN =====
document.querySelectorAll(".faq-question").forEach(button => {
    button.addEventListener("click", () => {
        button.parentElement.classList.toggle("active");
    });
});


// ===== DISCUSSION CHARACTER COUNT =====
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


// ===== vICTIMS SLIDER CONTROLS & TIMER =====
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


// ===== EXPLORE PAGE =====
const explorePage = document.querySelector('.explore-page');

if (explorePage) {
    const viewButtons = explorePage.querySelectorAll('.explore-view-btn');
    const timelineView = explorePage.querySelector('#timeline-view');
    const mapView = explorePage.querySelector('#map-view');

    const filterButtons = explorePage.querySelectorAll('.explore-filter-btn');
    const eventTypeFilter = explorePage.querySelector('#event-type-filter');
    const timelineEvents = explorePage.querySelectorAll('.timeline-event');
    const timelineYears = explorePage.querySelectorAll('.timeline-year');

    let activeCaseFilter = 'all';

    // timeline / map switcher
    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const selectedView = button.dataset.view;

            viewButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            button.classList.add('active');

            if (selectedView === 'timeline') {
                timelineView.hidden = false;
                mapView.hidden = true;
            } else {
                timelineView.hidden = true;
                mapView.hidden = false;
            }
        });
    });

    // timeline filters
    function filterTimeline() {
        const selectedEventType = eventTypeFilter.value;

        timelineEvents.forEach(event => {
            const caseType = event.dataset.caseType;
            const eventType = event.dataset.eventType;

            const matchesCase = activeCaseFilter === 'all' || caseType === activeCaseFilter;
            const matchesEvent = selectedEventType === 'all' || eventType === selectedEventType;

            event.hidden = !(matchesCase && matchesEvent);
        });

        updateTimelineYears();
    }

    // hide empty years
    function updateTimelineYears() {
        timelineYears.forEach(year => {
            let nextElement = year.nextElementSibling;
            let hasVisibleEvent = false;

            while (nextElement && !nextElement.classList.contains('timeline-year')) {
                if (nextElement.classList.contains('timeline-event') && !nextElement.hidden) {
                    hasVisibleEvent = true;
                    break;
                }

                nextElement = nextElement.nextElementSibling;
            }

            year.hidden = !hasVisibleEvent;
        });
    }

    // case type buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            activeCaseFilter = button.dataset.filter;

            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            button.classList.add('active');

            filterTimeline();
        });
    });

    // event type dropdown
    eventTypeFilter.addEventListener('change', filterTimeline);
}