/**
 * VoIP Savvy Language Module
 * Provides multilingual support for the website
 */

class VoIPSavvyLang {
    constructor() {
        this.defaultLang = 'en';
        this.currentLang = this.defaultLang;
        this.supportedLanguages = ['en', 'fr', 'ar'];
        this.translations = {};
        this.direction = 'ltr';

        // Initialize translations
        this.initTranslations();

        // Try to load saved language preference
        this.loadLanguagePreference();

        // Set initial language
        this.setLanguage(this.currentLang);
    }

    /**
     * Initialize translation dictionary
     */
    initTranslations() {
        this.translations = {
            'en': {
                'meta_desc': 'VoIP Savvy offers smart VoIP and AI-powered communication solutions for businesses, including IP PBX, AI chatbots, contact centers, and more.',
                'title': 'VoIP Savvy | Smart VoIP & AI Communication',
                'skip': 'Skip to main content',
                'home': 'Home',
                'solutions': 'Solutions',
                'saas': 'SaaS',
                'professional': 'Professional Services',
                'resources': 'Resources',
                'company': 'Company',
                'partner': 'Partner Program',
                'faq': 'FAQ',
                'demo': 'Your Demo Awaits',
                'trusted': 'Trusted by Businesses Across Industries',
                'about_title': 'About VoIP Savvy',
                'about_desc1': 'VoIP Savvy was founded to revolutionize business communication. Our open-source roots and AI-driven solutions empower businesses with flexible, scalable, and cost-effective telephony systems—free from vendor lock-ins.',
                'about_desc2': 'We deliver enterprise-grade quality at unbeatable value, bridging the gap between DIY platforms and complex UC systems. Trusted by over 1000+ businesses, we\'re here to help you communicate smarter.',
                'more_about': 'More About Us',
                'smart_solutions': 'Smart Solutions That Scale With You',
                'solutions_desc': 'Discover our AI-driven VoIP and communication solutions designed for flexibility and growth.',
                'why_choose': 'Why Choose VoIP Savvy',
                'why_desc': 'Our unique strengths empower your business to communicate smarter.',
                'contact_title': 'Get in Touch',
                'contact_desc': 'Have questions or need assistance? Reach out to us directly.',
                'contact_details': 'Contact Details',
                'connect_with': 'Connect With Us',
                'privacy': 'Privacy Policy',
                'terms': 'Terms of Use',
                'select_lang': 'Select language',
                'english': 'English',
                'french': 'French',
                'arabic': 'Arabic',
                'hero_title': 'Unleash Smart VoIP & AI-Powered Communication',
                'hero_subtitle': 'Born open-source. Backed by humans. Loved by businesses.',
                'hero_description': 'Reduce costs, scale with confidence, and elevate customer experiences with smart VoIP and AI-powered communication.',
                'customer_stories': 'See Customer Stories',
                'explore_solutions': 'Explore All Solutions',
                'cta_title': 'Ready to Level Up Your Business Communication?',
                'cta_desc': 'VoIP Savvy delivers powerful, AI-enabled VoIP and contact center tools that are customizable, scalable, and future-proof. Whether you\'re migrating from legacy systems or starting fresh—we\'ve got your back.',
                'badges_title': 'Built with Trust and Compliance',
                'badges_desc': 'We build with trust, transparency, and compliance - so you can scale worry-free.',
                'footer_facebook': 'Facebook',
                'footer_instagram': 'Instagram',
                'footer_x': 'X',
                'footer_linkedin': 'LinkedIn',
                'footer_youtube': 'YouTube',
                'footer_copyright': '© 2025 VoIP Savvy. All rights reserved.'
            },
            'fr': {
                'meta_desc': 'VoIP Savvy propose des solutions intelligentes de VoIP et de communication alimentées par l\'IA pour les entreprises, y compris IP PBX, chatbots IA, centres de contact, et plus.',
                'title': 'VoIP Savvy | Communication VoIP & IA intelligente',
                'skip': 'Aller au contenu principal',
                'home': 'Accueil',
                'solutions': 'Solutions',
                'saas': 'SaaS',
                'professional': 'Services Professionnels',
                'resources': 'Ressources',
                'company': 'Société',
                'partner': 'Programme Partenaires',
                'faq': 'FAQ',
                'demo': 'Votre Démo Vous Attend',
                'trusted': 'Approuvé par des entreprises de tous secteurs',
                'about_title': 'À propos de VoIP Savvy',
                'about_desc1': 'VoIP Savvy a été fondé pour révolutionner la communication d\'entreprise. Nos racines open source et nos solutions basées sur l\'IA offrent aux entreprises des systèmes téléphoniques flexibles, évolutifs et économiques, sans dépendance fournisseur.',
                'about_desc2': 'Nous offrons une qualité de niveau entreprise à une valeur imbattable, comblant le fossé entre les plateformes DIY et les systèmes UC complexes. Plus de 1000 entreprises nous font confiance pour améliorer leurs communications.',
                'more_about': 'En savoir plus',
                'smart_solutions': 'Des solutions intelligentes et évolutives',
                'solutions_desc': 'Découvrez nos solutions VoIP et de communication alimentées par l\'IA, conçues pour la flexibilité et la croissance.',
                'why_choose': 'Pourquoi choisir VoIP Savvy',
                'why_desc': 'Nos atouts uniques permettent à votre entreprise de communiquer plus intelligemment.',
                'contact_title': 'Contactez-nous',
                'contact_desc': 'Des questions ou besoin d\'aide ? Contactez-nous directement.',
                'contact_details': 'Coordonnées',
                'connect_with': 'Connectez-vous avec nous',
                'privacy': 'Politique de Confidentialité',
                'terms': 'Conditions d\'Utilisation',
                'select_lang': 'Choisir la langue',
                'english': 'Anglais',
                'french': 'Français',
                'arabic': 'Arabe',
                'hero_title': 'Libérez des Communications VoIP et IA Intelligentes',
                'hero_subtitle': 'Né open-source. Soutenu par des humains. Apprécié par les entreprises.',
                'hero_description': 'Réduisez les coûts, évoluez en confiance et améliorez l\'expérience client avec des communications intelligentes VoIP et IA.',
                'customer_stories': 'Voir les histoires de clients',
                'explore_solutions': 'Explorer toutes les solutions',
                'cta_title': 'Prêt à améliorer votre communication d\'entreprise ?',
                'cta_desc': 'VoIP Savvy propose des outils VoIP et de centre de contact puissants et activés par l\'IA, personnalisables, évolutifs et prêts pour l\'avenir. Que vous migriez depuis des systèmes legacy ou que vous commenciez de zéro, nous sommes là pour vous.',
                'badges_title': 'Conçu avec confiance et conformité',
                'badges_desc': 'Nous construisons avec confiance, transparence et conformité - pour que vous puissiez évoluer sans soucis.',
                'footer_facebook': 'Facebook',
                'footer_instagram': 'Instagram',
                'footer_x': 'X',
                'footer_linkedin': 'LinkedIn',
                'footer_youtube': 'YouTube',
                'footer_copyright': '© 2025 VoIP Savvy. Tous droits réservés.'
            },
            'ar': {
                'meta_desc': 'تقدم VoIP Savvy حلول VoIP ذكية مدعومة بالذكاء الاصطناعي للأعمال، بما في ذلك IP PBX، وروبوتات الدردشة، ومراكز الاتصال والمزيد.',
                'title': 'VoIP Savvy | حلول الاتصالات الذكية والذكاء الاصطناعي',
                'skip': 'تخطي إلى المحتوى الرئيسي',
                'home': 'الرئيسية',
                'solutions': 'الحلول',
                'saas': 'سحابية',
                'professional': 'الخدمات الاحترافية',
                'resources': 'الموارد',
                'company': 'الشركة',
                'partner': 'برنامج الشركاء',
                'faq': 'الأسئلة الشائعة',
                'demo': 'جرب العرض الآن',
                'trusted': 'موثوق من قبل شركات عبر الصناعات',
                'about_title': 'حول VoIP Savvy',
                'about_desc1': 'تأسست VoIP Savvy لإحداث ثورة في الاتصال المؤسسي. جذورنا مفتوحة المصدر وحلولنا المدعومة بالذكاء الاصطناعي تمنح الشركات أنظمة هاتفية مرنة وقابلة للتوسع وفعّالة من حيث التكلفة - دون احتكار الموردين.',
                'about_desc2': 'نقدم جودة من مستوى المؤسسات بقيمة لا تضاهى، ونربط الفجوة بين المنصات الذاتية وأنظمة UC المعقدة. نحن هنا لمساعدتك على الاتصال بذكاء.',
                'more_about': 'المزيد عنا',
                'smart_solutions': 'حلول ذكية تتوسع معك',
                'solutions_desc': 'اكتشف حلولنا الذكية للاتصالات المدعومة بالذكاء الاصطناعي المصممة للمرونة والنمو.',
                'why_choose': 'لماذا تختار VoIP Savvy',
                'why_desc': 'تمنحك نقاط القوة الفريدة لدينا القدرة على الاتصال بشكل أذكى.',
                'contact_title': 'تواصل معنا',
                'contact_desc': 'هل لديك أسئلة أو تحتاج إلى المساعدة؟ تواصل معنا مباشرة.',
                'contact_details': 'تفاصيل الاتصال',
                'connect_with': 'تواصل معنا',
                'privacy': 'سياسة الخصوصية',
                'terms': 'شروط الاستخدام',
                'select_lang': 'اختر اللغة',
                'english': 'الإنجليزية',
                'french': 'الفرنسية',
                'arabic': 'العربية',
                'hero_title': 'أطلق العنان للاتصالات الذكية بتقنية VoIP والذكاء الاصطناعي',
                'hero_subtitle': 'مولود مفتوح المصدر. مدعوم من البشر. محبوب من الشركات.',
                'hero_description': 'قلل التكاليف، قم بالتوسع بثقة، وارفع تجارب العملاء مع اتصالات ذكية بتقنية VoIP والذكاء الاصطناعي.',
                'customer_stories': 'شاهد قصص العملاء',
                'explore_solutions': 'استكشف جميع الحلول',
                'cta_title': 'هل أنت جاهز لرفع مستوى اتصالات عملك؟',
                'cta_desc': 'تقدم VoIP Savvy أدوات VoIP ومراكز اتصال قوية مدعومة بالذكاء الاصطناعي، قابلة للتخصيص، وقابلة للتوسع، ومستقبلية. سواء كنت تنتقل من أنظمة قديمة أو تبدأ من جديد، نحن هنا لدعمك.',
                'badges_title': 'مبني بثقة وامتثال',
                'badges_desc': 'نبني بالثقة والشفافية والامتثال - حتى تتمكن من التوسع دون قلق.',
                'footer_facebook': 'فيسبوك',
                'footer_instagram': 'إنستغرام',
                'footer_x': 'إكس',
                'footer_linkedin': 'لينكدإن',
                'footer_youtube': 'يوتيوب',
                'footer_copyright': '© 2025 فويب سافي. جميع الحقوق محفوظة.'
            }
        };
    }

    /**
     * Try to load the user's language preference from localStorage
     */
    loadLanguagePreference() {
        try {
            const savedLang = localStorage.getItem('voipSavvyLang');
            if (savedLang && this.supportedLanguages.includes(savedLang)) {
                this.currentLang = savedLang;
            } else {
                // Try to detect browser language
                const browserLang = navigator.language.split('-')[0];
                if (this.supportedLanguages.includes(browserLang)) {
                    this.currentLang = browserLang;
                }
            }
        } catch (e) {
            console.warn('Could not access localStorage for language settings');
        }
    }

    /**
     * Set the active language and update the page accordingly
     * @param {string} lang - Language code to set (en, fr, ar)
     */
    setLanguage(lang) {
        if (!this.supportedLanguages.includes(lang)) {
            console.error(`Language "${lang}" is not supported`);
            return false;
        }

        this.currentLang = lang;
        this.direction = lang === 'ar' ? 'rtl' : 'ltr';

        // Save preference to localStorage
        try {
            localStorage.setItem('voipSavvyLang', lang);
        } catch (e) {
            console.warn('Could not save language preference to localStorage');
        }

        // Update HTML language and direction attributes
        document.documentElement.lang = lang;
        document.documentElement.dir = this.direction;

        // Update page title
        document.title = this.translate('title');

        // Update meta description
        const metaDesc = document.querySelector('meta[name="description"]');
        if (metaDesc) {
            metaDesc.setAttribute('content', this.translate('meta_desc'));
        }

        // Dispatch an event so other components can react to language change
        const event = new CustomEvent('languageChanged', {
            detail: {
                language: lang,
                direction: this.direction
            }
        });
        document.dispatchEvent(event);

        return true;
    }

    /**
     * Get a translated string for the current language
     * @param {string} key - Translation key
     * @param {Object} replacements - Optional object with replacement values
     * @returns {string} Translated text
     */
    translate(key, replacements = {}) {
        const langDict = this.translations[this.currentLang] || this.translations[this.defaultLang];
        let text = langDict[key] || key;

        // Replace any variables in the translation string
        Object.keys(replacements).forEach(variable => {
            const regex = new RegExp(`{${variable}}`, 'g');
            text = text.replace(regex, replacements[variable]);
        });

        return text;
    }

    /**
     * Shorthand for translate method
     */
    t(key, replacements = {}) {
        return this.translate(key, replacements);
    }

    /**
     * Get current language code
     * @returns {string} Current language code
     */
    getCurrentLanguage() {
        return this.currentLang;
    }

    /**
     * Get current text direction
     * @returns {string} Current text direction (ltr or rtl)
     */
    getDirection() {
        return this.direction;
    }

    /**
     * Get list of supported languages
     * @returns {Array} Array of supported language codes
     */
    getSupportedLanguages() {
        return this.supportedLanguages;
    }
}

// Create and export a singleton instance
const langService = new VoIPSavvyLang();
export default langService;