<?php
session_start();

// CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Language handling
$defaultLang = 'en';
if (isset($_POST['lang']) && in_array($_POST['lang'], ['en', 'fr', 'ar'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
$currentLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $defaultLang;

// Translation arrays
$langs = [
    'en' => [
        'meta_description' => 'Discover VoIP Savvy’s comprehensive VoIP solutions, including IP PBX, contact centers, and AI bots.',
        'page_title' => 'Solutions | VoIP Savvy',
        'skip_to_content' => 'Skip to main content',
        'call_phone' => 'Call +966 572 434 266',
        'email_contact' => 'Email hello@voipsavvy.com',
        'select_language' => 'Select language',
        'lang_en' => 'English',
        'lang_ar' => 'Arabic',
        'lang_fr' => 'French',
        'home_logo' => 'VoIP Savvy Home',
        'main_nav' => 'Main navigation',
        'toggle_menu' => 'Toggle mobile menu',
        'mobile_nav' => 'Mobile navigation',
        'top_bar_phone' => '+966 572 434 266',
        'top_bar_email' => 'hello@voipsavvy.com',
        'nav_home' => 'Home',
        'nav_solutions' => 'Solutions',
        'nav_saas' => 'SaaS',
        'nav_professional_services' => 'Professional Services',
        'nav_resources' => 'Resources',
        'nav_company' => 'Company',
        'nav_partner_program' => 'Partner Program',
        'nav_faq' => 'FAQ',
        'hero_title' => 'Comprehensive VoIP Solutions',
        'hero_subtitle' => 'From IP PBX to AI-powered bots, we have your communication needs covered.',
        'hero_cta' => 'Explore Solutions',
        'solutions_title' => 'Our Solutions',
        'solutions_subtitle' => 'Tailored VoIP technologies to enhance your business communication.',
        'solution_pbx_title' => 'IP PBX',
        'solution_pbx_desc' => 'Robust, on-premise or cloud-based phone systems.',
        'solution_contact_center_title' => 'Contact Center',
        'solution_contact_center_desc' => 'Omnichannel support for seamless customer interactions.',
        'solution_ai_bots_title' => 'AI Voice & Chat Bots',
        'solution_ai_bots_desc' => 'Automate customer service with intelligent bots.',
        'solution_crm_title' => 'Sales & Service CRM',
        'solution_crm_desc' => 'Streamline customer relationships with integrated tools.',
        'solution_ivr_title' => 'Interactive Voice Response',
        'solution_ivr_desc' => 'Efficient call routing with customizable menus.',
        'footer_solutions' => 'Solutions',
        'footer_saas' => 'SaaS',
        'footer_company' => 'Company',
        'footer_connect' => 'Connect',
        'footer_privacy' => 'Privacy Policy',
        'footer_terms' => 'Terms of Use',
        'footer_copyright' => '© 2025 VoIP Savvy. All rights reserved.',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'Contact Center',
        'footer_ai_bots' => 'AI Voice & Chat Bots',
        'footer_crm' => 'Sales & Service CRM',
        'footer_ivr' => 'Interactive Voice Response',
        'footer_cloud_telephony' => 'Cloud Telephony',
        'footer_ccaas' => 'Contact Center as a Service',
        'footer_hosted_ivr' => 'Hosted IVR',
        'footer_about' => 'About VoIP Savvy',
        'footer_blog' => 'Blog & Insights',
        'footer_careers' => 'Careers',
        'footer_contact' => 'Contact Us',
        'footer_facebook' => 'Facebook',
        'footer_instagram' => 'Instagram',
        'footer_x' => 'X',
        'footer_linkedin' => 'LinkedIn',
        'footer_youtube' => 'YouTube'
    ],
    'fr' => [
        'meta_description' => 'Découvrez les solutions VoIP complètes de VoIP Savvy, y compris IP PBX, centres de contact et bots IA.',
        'page_title' => 'Solutions | VoIP Savvy',
        'skip_to_content' => 'Aller au contenu principal',
        'call_phone' => 'Appelez +966 572 434 266',
        'email_contact' => 'Envoyez un email à hello@voipsavvy.com',
        'select_language' => 'Choisir la langue',
        'lang_en' => 'Anglais',
        'lang_ar' => 'Arabe',
        'lang_fr' => 'Français',
        'home_logo' => 'Accueil VoIP Savvy',
        'main_nav' => 'Navigation principale',
        'toggle_menu' => 'Basculer le menu mobile',
        'mobile_nav' => 'Navigation mobile',
        'top_bar_phone' => '+966 572 434 266',
        'top_bar_email' => 'hello@voipsavvy.com',
        'nav_home' => 'Accueil',
        'nav_solutions' => 'Solutions',
        'nav_saas' => 'SaaS',
        'nav_professional_services' => 'Services Professionnels',
        'nav_resources' => 'Ressources',
        'nav_company' => 'Société',
        'nav_partner_program' => 'Programme Partenaires',
        'nav_faq' => 'FAQ',
        'hero_title' => 'Solutions VoIP Complètes',
        'hero_subtitle' => 'Des IP PBX aux bots alimentés par l’IA, nous couvrons tous vos besoins en communication.',
        'hero_cta' => 'Explorer les Solutions',
        'solutions_title' => 'Nos Solutions',
        'solutions_subtitle' => 'Technologies VoIP adaptées pour améliorer votre communication d’entreprise.',
        'solution_pbx_title' => 'IP PBX',
        'solution_pbx_desc' => 'Systèmes téléphoniques robustes, sur site ou basés sur le cloud.',
        'solution_contact_center_title' => 'Centre de Contact',
        'solution_contact_center_desc' => 'Support omnicanal pour des interactions client fluides.',
        'solution_ai_bots_title' => 'Bots Vocaux & Chat IA',
        'solution_ai_bots_desc' => 'Automatisez le service client avec des bots intelligents.',
        'solution_crm_title' => 'CRM Ventes & Services',
        'solution_crm_desc' => 'Simplifiez les relations client avec des outils intégrés.',
        'solution_ivr_title' => 'Réponse Vocale Interactive',
        'solution_ivr_desc' => 'Routage d’appels efficace avec des menus personnalisables.',
        'footer_solutions' => 'Solutions',
        'footer_saas' => 'SaaS',
        'footer_company' => 'Société',
        'footer_connect' => 'Connectez-vous',
        'footer_privacy' => 'Politique de Confidentialité',
        'footer_terms' => 'Conditions d’Utilisation',
        'footer_copyright' => '© 2025 VoIP Savvy. Tous droits réservés.',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'Centre de Contact',
        'footer_ai_bots' => 'Bots Vocaux & Chat IA',
        'footer_crm' => 'CRM Ventes & Services',
        'footer_ivr' => 'Réponse Vocale Interactive',
        'footer_cloud_telephony' => 'Téléphonie Cloud',
        'footer_ccaas' => 'Centre de Contact en Service',
        'footer_hosted_ivr' => 'IVR Hébergé',
        'footer_about' => 'À propos de VoIP Savvy',
        'footer_blog' => 'Blog & Perspectives',
        'footer_careers' => 'Carrières',
        'footer_contact' => 'Contactez-nous',
        'footer_facebook' => 'Facebook',
        'footer_instagram' => 'Instagram',
        'footer_x' => 'X',
        'footer_linkedin' => 'LinkedIn',
        'footer_youtube' => 'YouTube'
    ],
    'ar' => [
        'meta_description' => 'اكتشف حلول VoIP الشاملة من VoIP Savvy، بما في ذلك IP PBX، مراكز الاتصال، وروبوتات الذكاء الاصطناعي.',
        'page_title' => 'الحلول | VoIP Savvy',
        'skip_to_content' => 'تخطي إلى المحتوى الرئيسي',
        'call_phone' => 'اتصل بـ +966 572 434 266',
        'email_contact' => 'أرسل بريدًا إلكترونيًا إلى hello@voipsavvy.com',
        'select_language' => 'اختر اللغة',
        'lang_en' => 'الإنجليزية',
        'lang_ar' => 'العربية',
        'lang_fr' => 'الفرنسية',
        'home_logo' => 'الصفحة الرئيسية لـ VoIP Savvy',
        'main_nav' => 'التنقل الرئيسي',
        'toggle_menu' => 'تبديل القائمة المحمولة',
        'mobile_nav' => 'التنقل المحمول',
        'top_bar_phone' => '+966 572 434 266',
        'top_bar_email' => 'hello@voipsavvy.com',
        'nav_home' => 'الرئيسية',
        'nav_solutions' => 'الحلول',
        'nav_saas' => 'سحابية',
        'nav_professional_services' => 'الخدمات الاحترافية',
        'nav_resources' => 'الموارد',
        'nav_company' => 'الشركة',
        'nav_partner_program' => 'برنامج الشركاء',
        'nav_faq' => 'الأسئلة الشائعة',
        'hero_title' => 'حلول VoIP شاملة',
        'hero_subtitle' => 'من IP PBX إلى روبوتات مدعومة بالذكاء الاصطناعي، نحن نغطي احتياجات الاتصال الخاصة بك.',
        'hero_cta' => 'استكشف الحلول',
        'solutions_title' => 'حلولنا',
        'solutions_subtitle' => 'تقنيات VoIP مصممة لتعزيز الاتصال التجاري الخاص بك.',
        'solution_pbx_title' => 'IP PBX',
        'solution_pbx_desc' => 'أنظمة هاتفية قوية، سواء في الموقع أو على السحابة.',
        'solution_contact_center_title' => 'مركز الاتصال',
        'solution_contact_center_desc' => 'دعم متعدد القنوات لتفاعلات سلسة مع العملاء.',
        'solution_ai_bots_title' => 'روبوتات صوتية ودردشة بالذكاء الاصطناعي',
        'solution_ai_bots_desc' => 'أتمتة خدمة العملاء باستخدام روبوتات ذكية.',
        'solution_crm_title' => 'CRM المبيعات والخدمات',
        'solution_crm_desc' => 'تبسيط علاقات العملاء باستخدام أدوات مدمجة.',
        'solution_ivr_title' => 'الاستجابة الصوتية التفاعلية',
        'solution_ivr_desc' => 'توجيه المكالمات بكفاءة باستخدام قوائم قابلة للتخصيص.',
        'footer_solutions' => 'الحلول',
        'footer_saas' => 'سحابية',
        'footer_company' => 'الشركة',
        'footer_connect' => 'تواصل',
        'footer_privacy' => 'سياسة الخصوصية',
        'footer_terms' => 'شروط الاستخدام',
        'footer_copyright' => '© 2025 VoIP Savvy. جميع الحقوق محفوظة.',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'مركز الاتصال',
        'footer_ai_bots' => 'روبوتات صوتية ودردشة بالذكاء الاصطناعي',
        'footer_crm' => 'CRM المبيعات والخدمات',
        'footer_ivr' => 'الاستجابة الصوتية التفاعلية',
        'footer_cloud_telephony' => 'التلفونية السحابية',
        'footer_ccaas' => 'مركز الاتصال كخدمة',
        'footer_hosted_ivr' => 'IVR مستضاف',
        'footer_about' => 'حول VoIP Savvy',
        'footer_blog' => 'المدونة والرؤى',
        'footer_careers' => 'الوظائف',
        'footer_contact' => 'تواصل معنا',
        'footer_facebook' => 'فيسبوك',
        'footer_instagram' => 'إنستغرام',
        'footer_x' => 'إكس',
        'footer_linkedin' => 'لينكدإن',
        'footer_youtube' => 'يوتيوب'
    ]
];

// Current language translations
$t = $langs[$currentLang];
$direction = $currentLang === 'ar' ? 'rtl' : 'ltr';
?>

<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>" dir="<?php echo $direction; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $t['meta_description']; ?>">
    <meta name="author" content="VoIP Savvy">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdn.tailwindcss.com https://unpkg.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;">
    <title><?php echo $t['page_title']; ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins and Amiri -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: <?php echo $currentLang === 'ar' ? "'Amiri', serif" : "'Poppins', sans-serif"; ?>;
            background: #E6F0FA;
            scroll-behavior: smooth;
        }
        header.sticky {
            backdrop-filter: blur(15px) saturate(180%);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }
        .btn-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-hover:hover, .btn-hover:focus {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            outline: 2px solid #3B82F6;
        }
        .card-hover {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-radius: 1rem;
        }
        .card-hover:hover, .card-hover:focus {
            transform: translateY(-12px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            outline: 2px solid #3B82F6;
        }
        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/callcenter1.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .gradient-text {
            background: linear-gradient(90deg, #3B82F6, #A5BFFA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #E6F0FA;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#3B82F6, #A5BFFA);
            border-radius: 5px;
        }
        .section-bg {
            background: linear-gradient(135deg, #E6F0FA 0%, #D1E0FA 100%);
        }
        .language-select {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>') no-repeat right 0.5rem center/1rem 1rem;
        }
        [dir="rtl"] .language-select {
            background-position: left 0.5rem center;
        }
        [dir="rtl"] .flex {
            flex-direction: row-reverse;
        }
        [dir="rtl"] .grid {
            direction: rtl;
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }
        .focus\:not-sr-only:focus {
            position: static;
            width: auto;
            height: auto;
            padding: 0.5rem;
            margin: 0;
            overflow: visible;
            clip: auto;
        }
        .mobile-menu {
            transform: translateX(<?php echo $direction === 'rtl' ? '100%' : '-100%'; ?>);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        @media (max-width: 768px) {
            .hero-bg {
                background-attachment: scroll;
            }
            .text-7xl {
                font-size: 3rem;
            }
            .text-5xl {
                font-size: 2.5rem;
            }
            .text-xl {
                font-size: 1.125rem;
            }
            .py-24 {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            .text-7xl {
                font-size: 4rem;
            }
            .py-24 {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
        }
    </style>
</head>
<body class="<?php echo $direction === 'rtl' ? 'rtl' : ''; ?>">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-blue-500 focus:text-white focus:p-2">
        <?php echo $t['skip_to_content']; ?>
    </a>

    <!-- Top Bar -->
    <div class="bg-blue-500 text-white text-sm py-2 px-4 sm:px-6 flex flex-col sm:flex-row justify-between items-center">
        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 <?php echo $direction === 'rtl' ? 'sm:space-x-reverse' : ''; ?>">
            <a href="tel:+966572434266" class="hover:underline" aria-label="<?php echo $t['call_phone']; ?>"><?php echo $t['top_bar_phone']; ?></a>
            <a href="mailto:hello@voipsavvy.com" class="hover:underline" aria-label="<?php echo $t['email_contact']; ?>"><?php echo $t['top_bar_email']; ?></a>
        </div>
        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <select name="lang" onchange="this.form.submit()" class="language-select bg-transparent border-none text-white focus:outline-none text-sm" aria-label="<?php echo $t['select_language']; ?>">
                <option value="en" <?php echo $currentLang === 'en' ? 'selected' : ''; ?>><?php echo $t['lang_en']; ?></option>
                <option value="fr" <?php echo $currentLang === 'fr' ? 'selected' : ''; ?>><?php echo $t['lang_fr']; ?></option>
                <option value="ar" <?php echo $currentLang === 'ar' ? 'selected' : ''; ?>><?php echo $t['lang_ar']; ?></option>
            </select>
        </form>
    </div>

    <!-- Main Header -->
    <header id="header" class="fixed w-full z-50 bg-white py-4 px-6 flex justify-between items-center" style="top: 40px;">
        <div class="text-3xl font-bold text-blue-500">
            <a href="index.php" aria-label="<?php echo $t['home_logo']; ?>">VoIP Savvy</a>
        </div>
        <nav class="hidden md:flex space-x-6 lg:space-x-8 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?>" aria-label="<?php echo $t['main_nav']; ?>">
            <?php
            $navItems = [
                ['href' => 'index.php', 'label' => $t['nav_home']],
                ['href' => 'solutions.php', 'label' => $t['nav_solutions']],
                ['href' => 'saas.php', 'label' => $t['nav_saas']],
                ['href' => 'professional-services.php', 'label' => $t['nav_professional_services']],
                ['href' => 'resources.php', 'label' => $t['nav_resources']],
                ['href' => 'company.php', 'label' => $t['nav_company']],
                ['href' => 'partner-program.php', 'label' => $t['nav_partner_program']],
                ['href' => 'faq.php', 'label' => $t['nav_faq']]
            ];
            foreach ($navItems as $item) {
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
            }
            ?>
        </nav>
        <button id="menu-toggle" class="md:hidden text-blue-500" aria-label="<?php echo $t['toggle_menu']; ?>" aria-expanded="false">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-white w-full p-4 absolute z-40 shadow-lg mobile-menu" style="top: 96px;">
        <nav class="flex flex-col space-y-4" aria-label="<?php echo $t['mobile_nav']; ?>">
            <?php
            foreach ($navItems as $item) {
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
            }
            ?>
        </nav>
    </div>

    <main id="main-content" style="padding-top: 96px;">
        <!-- Hero Section -->
        <section class="pt-20 pb-20 hero-bg text-center text爱白" role="region" aria-labelledby="hero-heading">
            <div class="py-24 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
                <h1 id="hero-heading" class="text-5xl md:text-7xl font-bold gradient-text"><?php echo $t['hero_title']; ?></h1>
                <p class="mt-4 text-xl"><?php echo $t['hero_subtitle']; ?></p>
                <div class="mt-8 flex justify-center">
                    <a href="#solutions" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $t['hero_cta']; ?></a>
                </div>
            </div>
        </section>

        <!-- Solutions Section -->
        <section id="solutions" class="py-20 px-4 sm:px-6 bg-white section-bg" role="region" aria-labelledby="solutions-heading">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <h2 id="solutions-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $t['solutions_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['solutions_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $solutions = [
                        [
                            'id' => 'ip-pbx',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                            'title' => $t['solution_pbx_title'],
                            'desc' => $t['solution_pbx_desc']
                        ],
                        [
                            'id' => 'contact-center',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>',
                            'title' => $t['solution_contact_center_title'],
                            'desc' => $t['solution_contact_center_desc']
                        ],
                        [
                            'id' => 'ai-bots',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
                            'title' => $t['solution_ai_bots_title'],
                            'desc' => $t['solution_ai_bots_desc']
                        ],
                        [
                            'id' => 'crm',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>',
                            'title' => $t['solution_crm_title'],
                            'desc' => $t['solution_crm_desc']
                        ],
                        [
                            'id' => 'ivr',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
                            'title' => $t['solution_ivr_title'],
                            'desc' => $t['solution_ivr_desc']
                        ]
                    ];
                    foreach ($solutions as $index => $solution) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500 mb-4' fill='none' stroke='currentColor' viewBox='0 0 24 24' aria-hidden='true'>{$solution['icon']}</svg>
                            <h3 class='text-xl font-semibold text-gray-700'>{$solution['title']}</h3>
                            <p class='text-gray-600'>{$solution['desc']}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-100 py-8 text-center text-gray-500 text-sm section-bg" role="contentinfo">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['footer_solutions']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="solutions.php#ip-pbx" class="hover:text-blue-500"><?php echo $t['footer_ip_pbx']; ?></a></li>
                        <li><a href="solutions.php#contact-center" class="hover:text-blue-500"><?php echo $t['footer_contact_center']; ?></a></li>
                        <li><a href="solutions.php#ai-bots" class="hover:text-blue-500"><?php echo $t['footer_ai_bots']; ?></a></li>
                        <li><a href="solutions.php#crm" class="hover:text-blue-500"><?php echo $t['footer_crm']; ?></a></li>
                        <li><a href="solutions.php#ivr" class="hover:text-blue-500"><?php echo $t['footer_ivr']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['footer_saas']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="saas.php#cloud-telephony" class="hover:text-blue-500"><?php echo $t['footer_cloud_telephony']; ?></a></li>
                        <li><a href="saas.php#ccaas" class="hover:text-blue-500"><?php echo $t['footer_ccaas']; ?></a></li>
                        <li><a href="saas.php#crm" class="hover:text-blue-500"><?php echo $t['footer_crm']; ?></a></li>
                        <li><a href="saas.php#hosted-ivr" class="hover:text-blue-500"><?php echo $t['footer_hosted_ivr']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['footer_company']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="company.php#about" class="hover:text-blue-500"><?php echo $t['footer_about']; ?></a></li>
                        <li><a href="company.php#blog" class="hover:text-blue-500"><?php echo $t['footer_blog']; ?></a></li>
                        <li><a href="company.php#careers" class="hover:text-blue-500"><?php echo $t['footer_careers']; ?></a></li>
                        <li><a href="company.php#partner-program" class="hover:text-blue-500"><?php echo $t['nav_partner_program']; ?></a></li>
                        <li><a href="contact.php" class="hover:text-blue-500"><?php echo $t['footer_contact']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['footer_connect']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="https://www.facebook.com/voipsavvy/" class="hover:text-blue-500"><?php echo $t['footer_facebook']; ?></a></li>
                        <li><a href="https://www.instagram.com/voipsavvy/" class="hover:text-blue-500"><?php echo $t['footer_instagram']; ?></a></li>
                        <li><a href="https://x.com/SavvyVoip" class="hover:text-blue-500"><?php echo $t['footer_x']; ?></a></li>
                        <li><a href="https://www.linkedin.com/company/voip-savvy" class="hover:text-blue-500"><?php echo $t['footer_linkedin']; ?></a></li>
                        <li><a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" class="hover:text-blue-500"><?php echo $t['footer_youtube']; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?> mb-4">
                <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $t['footer_privacy']; ?></a>
                <a href="terms-of-use.php" class="hover:text-blue-500"><?php echo $t['footer_terms']; ?></a>
            </div>
            <p><?php echo $t['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
    <script>
        AOS.init({ duration: 1000, once: true, easing: 'ease-out' });

        // Sticky header
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            header.classList.toggle('sticky', window.scrollY > 10);
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const isOpen = mobileMenu.classList.contains('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
            menuToggle.innerHTML = isOpen ?
                `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>` :
                `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>`;
        });

        // Keyboard navigation for cards
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    card.focus();
                }
            });
        });
    </script>
</body>
</html>