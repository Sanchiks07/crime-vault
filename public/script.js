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


// ===== LOGIN RATE LIMIT COUNTDOWN =====
const loginLockout = document.querySelector('#login-lockout');

if (loginLockout) {
    const countdown = document.querySelector('#login-countdown');

    let seconds = parseInt(loginLockout.dataset.seconds, 10);

    const timer = setInterval(() => {
        seconds--;

        if (seconds <= 0) {
            clearInterval(timer);

            loginLockout.textContent = 'You can try logging in again now.';
            return;
        }

        countdown.textContent = seconds;
    }, 1000);
}


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
    const timelineNoResults = explorePage.querySelector('#timeline-no-results');

    const mapElement = explorePage.querySelector('#case-map');
    const mapNoResults = explorePage.querySelector('#map-no-results');

    let activeCaseFilter = 'all';
    let map = null;
    let mapMarkers = [];

    // timeline filtering
    function filterTimeline() {
        const selectedEventType = eventTypeFilter.value;

        let visibleEventCount = 0;

        timelineEvents.forEach(event => {
            const caseType = event.dataset.caseType;
            const eventType = event.dataset.eventType;

            const matchesCase = activeCaseFilter === 'all' || caseType === activeCaseFilter;
            const matchesEvent = selectedEventType === 'all' || eventType === selectedEventType;

            const shouldShow = matchesCase && matchesEvent;

            event.hidden = !shouldShow;

            if (shouldShow) {
                visibleEventCount++;
            }
        });

        updateTimelineYears();

        timelineNoResults.hidden = visibleEventCount !== 0;
    }

    // hide empty years
    function updateTimelineYears() {
        timelineYears.forEach(year => {
            let nextElement = year.nextElementSibling;
            let hasVisibleEvent = false;

            while (
                nextElement &&
                !nextElement.classList.contains('timeline-year')
            ) {
                if (
                    nextElement.classList.contains('timeline-event') &&
                    !nextElement.hidden
                ) {
                    hasVisibleEvent = true;
                    break;
                }

                nextElement = nextElement.nextElementSibling;
            }

            year.hidden = !hasVisibleEvent;
        });
    }

    // map filtering
    function filterMap() {
        if (!map) {
            return;
        }

        const selectedEventType = eventTypeFilter.value;

        let visibleMarkerCount = 0;

        mapMarkers.forEach(item => {
            const matchesCase =
                activeCaseFilter === 'all' ||
                item.caseType === activeCaseFilter;

            const matchesEvent =
                selectedEventType === 'all' ||
                item.eventType === selectedEventType;

            const shouldShow = matchesCase && matchesEvent;

            if (shouldShow) {
                visibleMarkerCount++;

                if (!map.hasLayer(item.marker)) {
                    item.marker.addTo(map);
                }
            } else {
                if (map.hasLayer(item.marker)) {
                    map.removeLayer(item.marker);
                }
            }
        });

        mapNoResults.hidden = visibleMarkerCount !== 0;

        if (visibleMarkerCount > 0) {
            fitMapToVisibleMarkers();
        }
    }

    function fitMapToVisibleMarkers() {
        if (!map) {
            return;
        }

        const visibleMarkers = mapMarkers
            .filter(item => map.hasLayer(item.marker))
            .map(item => item.marker);

        if (visibleMarkers.length === 0) {
            return;
        }

        if (visibleMarkers.length === 1) {
            map.setView(
                visibleMarkers[0].getLatLng(),
                8
            );

            return;
        }

        const group = L.featureGroup(visibleMarkers);

        map.fitBounds(group.getBounds(), {
            padding: [40, 40],
            maxZoom: 8
        });
    }

    // case type filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            activeCaseFilter = button.dataset.filter;

            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            button.classList.add('active');

            filterTimeline();
            filterMap();
        });
    });

    // event type filter
    eventTypeFilter.addEventListener('change', () => {
        filterTimeline();
        filterMap();
    });

    // interactive map
    if (mapElement && typeof L !== 'undefined') {
        const mapEvents = JSON.parse(mapElement.dataset.events);

        map = L.map('case-map').setView([39.5, -98.35], 4);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);


        // create markers
        mapEvents.forEach(event => {
            const latitude = parseFloat(event.latitude);
            const longitude = parseFloat(event.longitude);

            if (Number.isNaN(latitude) || Number.isNaN(longitude)) {
                return;
            }

            const marker = L.marker([
                latitude,
                longitude
            ]).addTo(map);

            marker.bindPopup(`
                <div class="case-map-popup">
                    <span class="map-popup-type">
                        ${event.event_type}
                    </span>

                    <h3>${event.title}</h3>

                    <strong>${event.case_name}</strong>

                    <p>${event.date}</p>

                    ${event.location ? `<p>${event.location}</p>` : ''}
                </div>
            `);

            mapMarkers.push({
                marker: marker,
                caseType: event.case_type,
                eventType: event.event_type
            });
        });
    }

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

                if (map) {
                    setTimeout(() => {
                        map.invalidateSize();
                        fitMapToVisibleMarkers();
                    }, 100);
                }
            }
        });
    });
}