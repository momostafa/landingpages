/**
 * Sets the language and reloads the page ONLY if the URL
 * doesn't already contain the correct language parameter.
 */
function setLanguage(lang) {
    const html = document.documentElement;
    html.setAttribute("lang", lang);
    html.setAttribute("dir", lang === "ar" ? "rtl" : "ltr");

    // 1. Update button styles (UI only - does not cause reload)
    const btnEn = document.getElementById("langSwitcherEn");
    const btnAr = document.getElementById("langSwitcherAr");
    if (btnEn && btnAr) {
        if (lang === "en") {
            btnEn.classList.add("bg-white", "text-dark");
            btnAr.classList.remove("bg-white", "text-dark");
        } else {
            btnAr.classList.add("bg-white", "text-dark");
            btnEn.classList.remove("bg-white", "text-dark");
        }
    }

    // 2. Persist to localStorage
    localStorage.setItem("preferredLang", lang);

    // 3. Check if we actually need to redirect
    const url = new URL(window.location.href);
    const currentUrlLang = url.searchParams.get('lang');

    // ONLY redirect if the URL language is missing or different from what's requested
    if (currentUrlLang !== lang) {
        url.searchParams.set('lang', lang);

        let finalUrl = url.toString();
        // Preserve hash (#home) at the very end of the URL
        if (window.location.hash) {
            finalUrl = finalUrl.split('#')[0] + window.location.hash;
        }

        window.location.href = finalUrl;
    } else {
        // If the URL already has ?lang=xx, we do nothing!
        // This breaks the infinite loop.
        console.log("Language already matches URL. No reload needed.");
    }
}

/**
 * Automatically appends the current language parameter to any link clicked.
 */
function initLinkFixer() {
    document.addEventListener('click', function(e) {
        const target = e.target.closest('a');
        if (!target || target.getAttribute('target') === '_blank') return;

        const href = target.getAttribute('href');
        // Skip if it's a hash link, a mailto, or a phone link
        if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;

        try {
            const url = new URL(href, window.location.origin);
            const currentLang = localStorage.getItem("preferredLang") || "en";

            // If the link doesn't already have a lang parameter, add it
            if (!url.searchParams.has('lang')) {
                url.searchParams.set('lang', currentLang);
                target.href = url.toString();
            }
        } catch (err) {
            console.error("Link fixer error:", err);
        }
    });
}

// Initialize everything on page load
document.addEventListener("DOMContentLoaded", () => {
    // Get the language from URL first, then fallback to localStorage
    const urlParams = new URLSearchParams(window.location.search);
    const langFromUrl = urlParams.get('lang');
    const savedLang = localStorage.getItem("preferredLang") || "en";

    // Use URL param if it exists (highest priority), otherwise use LocalStorage
    const targetLang = langFromUrl || savedLang;

    setLanguage(targetLang);

    // Start the link fixer to handle child pages automatically
    initLinkFixer();
});


// function setLanguage(lang) {
//   const html = document.documentElement;
//   html.setAttribute("lang", lang);
//   html.setAttribute("dir", lang === "ar" ? "rtl" : "ltr");

//   // Update button styles to show active language
//   const btnEn = document.getElementById("langSwitcherEn");
//   const btnAr = document.getElementById("langSwitcherAr");
//   if (btnEn && btnAr) {
//     if (lang === "en") {
//       btnEn.classList.add("bg-white", "text-dark");
//       btnAr.classList.remove("bg-white", "text-dark");
//     } else {
//       btnAr.classList.add("bg-white", "text-dark");
//       btnEn.classList.remove("bg-white", "text-dark");
//     }
//   }

//   localStorage.setItem("preferredLang", lang);
// }

// // Initialize language from localStorage or default to 'en'
// document.addEventListener("DOMContentLoaded", () => {
//   const savedLang = localStorage.getItem("preferredLang") || "en";
//   setLanguage(savedLang);
// });
