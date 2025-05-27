import langService from './lang.js';

/**
 * Initialize the language functionality on the page
 */
function initLanguage() {
    // Update all elements with data-i18n attribute
    updateTranslations();

    // Set up language switcher
    setupLanguageSwitcher();

    // Listen for language changes
    document.addEventListener('languageChanged', () => {
        updateTranslations();
        updateDirectionalStyles();
    });
}

/**
 * Update all elements with data-i18n attributes
 */
function updateTranslations() {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');

        // Check if we need to update an attribute instead of content
        if (el.hasAttribute('data-i18n-attr')) {
            const attr = el.getAttribute('data-i18n-attr');
            el.setAttribute(attr, langService.t(key));
        } else {
            el.textContent = langService.t(key);
        }
    });
}

/**
 * Set up language switcher dropdown
 */
function setupLanguageSwitcher() {
    const languageSwitchers = document.querySelectorAll('.language-select');

    languageSwitchers.forEach(switcher => {
        // Clear existing options
        switcher.innerHTML = '';

        // Add options for each supported language
        langService.getSupportedLanguages().forEach(lang => {
            const option = document.createElement('option');
            option.value = lang;
            option.textContent = langService.t(lang === 'en' ? 'english' : (lang === 'fr' ? 'french' : 'arabic'));
            option.selected = lang === langService.getCurrentLanguage();
            switcher.appendChild(option);
        });

        // Add change event handler
        switcher.addEventListener('change', e => {
            langService.setLanguage(e.target.value);
        });
    });
}

/**
 * Update any direction-specific styles based on current language
 */
function updateDirectionalStyles() {
    const direction = langService.getDirection();

    // Handle RTL-specific spacing classes
    if (direction === 'rtl') {
        document.querySelectorAll('.space-x-4, .space-x-6, .space-x-8').forEach(el => {
            el.classList.add('space-x-reverse');
        });
    } else {
        document.querySelectorAll('.space-x-reverse').forEach(el => {
            el.classList.remove('space-x-reverse');
        });
    }

    // Handle mobile menu positioning
    document.querySelectorAll('.mobile-menu').forEach(menu => {
        menu.style.transform = `translateX(${direction === 'rtl' ? '100%' : '-100%'})`;
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', initLanguage);

// Make langService available globally
window.langService = langService;