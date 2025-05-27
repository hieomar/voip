<?php
session_start();

// Security: Initialize CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Language Handling
$defaultLang = 'en';
if (isset($_POST['lang']) && in_array($_POST['lang'], ['en', 'fr', 'ar'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
$currentLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $defaultLang;

// Translation Arrays
$langs = [
    'en' => [
        'meta_description' => 'Explore VoIP Savvy’s resources, including blogs, case studies, and whitepapers on AI-powered VoIP solutions.',
        'page_title' => 'Resources | VoIP Savvy',
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
        'hero_title' => 'Learn with VoIP Savvy',
        'hero_subtitle' => 'Explore blogs, case studies, and whitepapers on AI-powered communications.',
        'blog_heading' => 'Blog & Insights',
        'blog_subtitle' => 'Stay informed with the latest in VoIP and AI technology.',
        'blog_hosted_ivr_title' => 'What is Hosted IVR?',
        'blog_hosted_ivr_desc' => 'Learn how automated call routing simplifies your operations.',
        'blog_contact_center_title' => 'AI in Contact Centers',
        'blog_contact_center_desc' => 'Discover how intelligent chatbots enhance customer support.',
        'blog_asterisk_title' => 'Asterisk Consulting',
        'blog_asterisk_desc' => 'Optimize your VoIP with specialized Asterisk solutions.',
        'blog_voice_broadcasting_title' => 'Voice Broadcasting',
        'blog_voice_broadcasting_desc' => 'Reach thousands with automated voice campaigns.',
        'blog_voip_trends_title' => 'Top VoIP Trends for 2025',
        'blog_voip_trends_desc' => 'Explore the future of cloud communications and AI integration.',
        'blog_crm_integration_title' => 'CRM Integration with VoIP',
        'blog_crm_integration_desc' => 'Boost sales with seamless CRM and VoIP integration.',
        'blog_cloud_telephony_title' => 'Benefits of Cloud Telephony',
        'blog_cloud_telephony_desc' => 'Scalable, cost-effective communications for businesses.',
        'blog_ai_analytics_title' => 'AI-Powered Call Analytics',
        'blog_ai_analytics_desc' => 'Gain insights with advanced call data analysis.',
        'case_studies_heading' => 'Case Studies',
        'case_studies_subtitle' => 'See how businesses succeed with VoIP Savvy solutions.',
        'case_study_retail_title' => 'Retail Chain Boosts Sales',
        'case_study_retail_desc' => 'Cloud telephony increases customer reach by 40%.',
        'case_study_healthcare_title' => 'Healthcare Call Efficiency',
        'case_study_healthcare_desc' => 'Hosted IVR reduces wait times by 30%.',
        'case_study_tech_title' => 'Tech Startup Scales Support',
        'case_study_tech_desc' => 'AI chatbots handle 50% of inquiries.',
        'case_study_finance_title' => 'Finance Firm Enhances Security',
        'case_study_finance_desc' => 'Secure VoIP ensures compliance and trust.',
        'whitepapers_heading' => 'Whitepapers',
        'whitepapers_subtitle' => 'In-depth guides to empower your business.',
        'whitepaper_voip_guide_title' => 'The Comprehensive VoIP Guide',
        'whitepaper_voip_guide_desc' => 'Everything you need to know about VoIP.',
        'whitepaper_ai_comms_title' => 'AI in Communications',
        'whitepaper_ai_comms_desc' => 'How AI transforms customer interactions.',
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
        'meta_description' => 'Découvrez les ressources de VoIP Savvy, y compris les blogs, études de cas et livres blancs sur les solutions VoIP alimentées par l’IA.',
        'page_title' => 'Ressources | VoIP Savvy',
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
        'hero_title' => 'Apprendre avec VoIP Savvy',
        'hero_subtitle' => 'Explorez les blogs, études de cas et livres blancs sur les communications alimentées par l’IA.',
        'blog_heading' => 'Blog & Perspectives',
        'blog_subtitle' => 'Restez informé des dernières avancées en VoIP et technologie IA.',
        'blog_hosted_ivr_title' => 'Qu’est-ce que l’IVR hébergé ?',
        'blog_hosted_ivr_desc' => 'Découvrez comment le routage automatisé des appels simplifie vos opérations.',
        'blog_contact_center_title' => 'IA dans les centres de contact',
        'blog_contact_center_desc' => 'Découvrez comment les chatbots intelligents améliorent le support client.',
        'blog_asterisk_title' => 'Consulting Asterisk',
        'blog_asterisk_desc' => 'Optimisez votre VoIP avec des solutions Asterisk spécialisées.',
        'blog_voice_broadcasting_title' => 'Diffusion vocale',
        'blog_voice_broadcasting_desc' => 'Atteignez des milliers avec des campagnes vocales automatisées.',
        'blog_voip_trends_title' => 'Tendances VoIP pour 2025',
        'blog_voip_trends_desc' => 'Explorez l’avenir des communications cloud et de l’intégration IA.',
        'blog_crm_integration_title' => 'Intégration CRM avec VoIP',
        'blog_crm_integration_desc' => 'Boostez les ventes avec une intégration CRM et VoIP fluide.',
        'blog_cloud_telephony_title' => 'Avantages de la téléphonie cloud',
        'blog_cloud_telephony_desc' => 'Communications évolutives et économiques pour les entreprises.',
        'blog_ai_analytics_title' => 'Analyse des appels alimentée par l’IA',
        'blog_ai_analytics_desc' => 'Obtenez des insights avec une analyse avancée des données d’appels.',
        'case_studies_heading' => 'Études de cas',
        'case_studies_subtitle' => 'Découvrez comment les entreprises réussissent avec les solutions VoIP Savvy.',
        'case_study_retail_title' => 'Chaîne de vente au détail booste les ventes',
        'case_study_retail_desc' => 'La téléphonie cloud augmente la portée client de 40%.',
        'case_study_healthcare_title' => 'Efficacité des appels en santé',
        'case_study_healthcare_desc' => 'L’IVR hébergé réduit les temps d’attente de 30%.',
        'case_study_tech_title' => 'Startup tech élargit le support',
        'case_study_tech_desc' => 'Les chatbots IA gèrent 50% des demandes.',
        'case_study_finance_title' => 'Firme financière renforce la sécurité',
        'case_study_finance_desc' => 'VoIP sécurisé garantit conformité et confiance.',
        'whitepapers_heading' => 'Livres blancs',
        'whitepapers_subtitle' => 'Guides approfondis pour dynamiser votre entreprise.',
        'whitepaper_voip_guide_title' => 'Le guide complet de la VoIP',
        'whitepaper_voip_guide_desc' => 'Tout ce que vous devez savoir sur la VoIP.',
        'whitepaper_ai_comms_title' => 'IA dans les communications',
        'whitepaper_ai_comms_desc' => 'Comment l’IA transforme les interactions client.',
        'footer_solutions' => 'Solutions',
        'footer_saas' => 'SaaS',
        'footer_company' => 'Société',
        'footer_connect' => 'Connectez-vous',
        'footer_privacy' => 'Politique de confidentialité',
        'footer_terms' => 'Conditions d’utilisation',
        'footer_copyright' => '© 2025 VoIP Savvy. Tous droits réservés.',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'Centre de contact',
        'footer_ai_bots' => 'Bots vocaux & chat IA',
        'footer_crm' => 'CRM ventes & services',
        'footer_ivr' => 'Réponse vocale interactive',
        'footer_cloud_telephony' => 'Téléphonie cloud',
        'footer_ccaas' => 'Centre de contact comme service',
        'footer_hosted_ivr' => 'IVR hébergé',
        'footer_about' => 'À propos de VoIP Savvy',
        'footer_blog' => 'Blog & perspectives',
        'footer_careers' => 'Carrières',
        'footer_contact' => 'Contactez-nous',
        'footer_facebook' => 'Facebook',
        'footer_instagram' => 'Instagram',
        'footer_x' => 'X',
        'footer_linkedin' => 'LinkedIn',
        'footer_youtube' => 'YouTube'
    ],
    'ar' => [
        'meta_description' => 'استكشف موارد VoIP Savvy، بما في ذلك المدونات، دراسات الحالة، والأوراق البيضاء حول حلول VoIP المدعومة بالذكاء الاصطناعي.',
        'page_title' => 'الموارد | VoIP Savvy',
        'skip_to_content' => 'تخطى إلى المحتوى الرئيسي',
        'call_phone' => 'اتصل على +966 572 434 266',
        'email_contact' => 'راسلنا على hello@voipsavvy.com',
        'select_language' => 'اختر اللغة',
        'lang_en' => 'الإنجليزية',
        'lang_ar' => 'العربية',
        'lang_fr' => 'الفرنسية',
        'home_logo' => 'الصفحة الرئيسية لـ VoIP Savvy',
        'main_nav' => 'التنقل الرئيسي',
        'toggle_menu' => 'تبديل قائمة الهاتف المحمول',
        'mobile_nav' => 'التنقل عبر الهاتف المحمول',
        'top_bar_phone' => '+966 572 434 266',
        'top_bar_email' => 'hello@voipsavvy.com',
        'nav_home' => 'الرئيسية',
        'nav_solutions' => 'الحلول',
        'nav_saas' => 'البرمجيات كخدمة',
        'nav_professional_services' => 'الخدمات المهنية',
        'nav_resources' => 'الموارد',
        'nav_company' => 'الشركة',
        'nav_partner_program' => 'برنامج الشركاء',
        'nav_faq' => 'الأسئلة الشائعة',
        'hero_title' => 'تعلم مع VoIP Savvy',
        'hero_subtitle' => 'استكشف المدونات، دراسات الحالة، والأوراق البيضاء حول الاتصالات المدعومة بالذكاء الاصطناعي.',
        'blog_heading' => 'المدونة والرؤى',
        'blog_subtitle' => 'ابقَ على اطلاع بأحدث ما في تقنيات VoIP والذكاء الاصطناعي.',
        'blog_hosted_ivr_title' => 'ما هو Hosted IVR؟',
        'blog_hosted_ivr_desc' => 'تعرف على كيفية تبسيط عملياتك باستخدام توجيه المكالمات الآلي.',
        'blog_contact_center_title' => 'الذكاء الاصطناعي في مراكز الاتصال',
        'blog_contact_center_desc' => 'اكتشف كيف تعزز روبوتات الدردشة الذكية دعم العملاء.',
        'blog_asterisk_title' => 'استشارات Asterisk',
        'blog_asterisk_desc' => 'حسّن VoIP الخاص بك مع حلول Asterisk المتخصصة.',
        'blog_voice_broadcasting_title' => 'البث الصوتي',
        'blog_voice_broadcasting_desc' => 'الوصول إلى الآلاف بحملات صوتية مؤتمتة.',
        'blog_voip_trends_title' => 'أبرز اتجاهات VoIP لعام 2025',
        'blog_voip_trends_desc' => 'استكشف مستقبل الاتصالات السحابية وتكامل الذكاء الاصطناعي.',
        'blog_crm_integration_title' => 'تكامل CRM مع VoIP',
        'blog_crm_integration_desc' => 'عزز المبيعات مع تكامل CRM وVoIP السلس.',
        'blog_cloud_telephony_title' => 'فوائد الاتصالات السحابية',
        'blog_cloud_telephony_desc' => 'اتصالات قابلة للتوسع وفعالة من حيث التكلفة للشركات.',
        'blog_ai_analytics_title' => 'تحليلات المكالمات المدعومة بالذكاء الاصطناعي',
        'blog_ai_analytics_desc' => 'احصل على رؤى مع تحليل بيانات المكالمات المتقدم.',
        'case_studies_heading' => 'دراسات الحالة',
        'case_studies_subtitle' => 'شاهد كيف تنجح الشركات مع حلول VoIP Savvy.',
        'case_study_retail_title' => 'سلسلة تجزئة تعزز المبيعات',
        'case_study_retail_desc' => 'الاتصالات السحابية تزيد من وصول العملاء بنسبة 40%.',
        'case_study_healthcare_title' => 'كفاءة مكالمات الرعاية الصحية',
        'case_study_healthcare_desc' => 'Hosted IVR يقلل أوقات الانتظار بنسبة 30%.',
        'case_study_tech_title' => 'شركة تقنية ناشئة توسع الدعم',
        'case_study_tech_desc' => 'روبوتات الدردشة الذكية تتعامل مع 50% من الاستفسارات.',
        'case_study_finance_title' => 'شركة مالية تعزز الأمان',
        'case_study_finance_desc' => 'VoIP الآمن يضمن الامتثال والثقة.',
        'whitepapers_heading' => 'الأوراق البيضاء',
        'whitepapers_subtitle' => 'أدلة متعمقة لتمكين عملك.',
        'whitepaper_voip_guide_title' => 'الدليل الشامل لـ VoIP',
        'whitepaper_voip_guide_desc' => 'كل ما تحتاج لمعرفته عن VoIP.',
        'whitepaper_ai_comms_title' => 'الذكاء الاصطناعي في الاتصالات',
        'whitepaper_ai_comms_desc' => 'كيف يحول الذكاء الاصطناعي تفاعلات العملاء.',
        'footer_solutions' => 'الحلول',
        'footer_saas' => 'البرمجيات كخدمة',
        'footer_company' => 'الشركة',
        'footer_connect' => 'تواصل',
        'footer_privacy' => 'سياسة الخصوصية',
        'footer_terms' => 'شروط الاستخدام',
        'footer_copyright' => '© 2025 VoIP Savvy. جميع الحقوق محفوظة.',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'مركز الاتصال',
        'footer_ai_bots' => 'روبوتات الصوت والدردشة الذكية',
        'footer_crm' => 'إدارة علاقات العملاء للمبيعات والخدمات',
        'footer_ivr' => 'الاستجابة الصوتية التفاعلية',
        'footer_cloud_telephony' => 'الاتصالات السحابية',
        'footer_ccaas' => 'مركز الاتصال كخدمة',
        'footer_hosted_ivr' => 'IVR مستضاف',
        'footer_about' => 'عن VoIP Savvy',
        'footer_blog' => 'المدونة والرؤى',
        'footer_careers' => 'الوظائف',
        'footer_contact' => 'اتصل بنا',
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/call.png');
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
                ['href' => 'resources.php', 'label' => $t['nav_resources'], 'current' => true],
                ['href' => 'company.php', 'label' => $t['nav_company']],
                ['href' => 'partner-program.php', 'label' => $t['nav_partner_program']],
                ['href' => 'faq.php', 'label' => $t['nav_faq']]
            ];
            foreach ($navItems as $item) {
                $current = isset($item['current']) && $item['current'] ? 'text-blue-500' : 'text-gray-600';
                echo "<a href='{$item['href']}' class='$current hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
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
                $current = isset($item['current']) && $item['current'] ? 'text-blue-500' : 'text-gray-600';
                echo "<a href='{$item['href']}' class='$current hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
            }
            ?>
        </nav>
    </div>

    <main id="main-content" style="padding-top: 96px;">
        <!-- Hero Section -->
        <section class="pt-20 pb-20 hero-bg text-center text-white" role="region" aria-labelledby="hero-heading">
            <div class="py-24 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
                <h1 id="hero-heading" class="text-5xl md:text-7xl font-bold gradient-text"><?php echo $t['hero_title']; ?></h1>
                <p class="mt-4 text-xl"><?php echo $t['hero_subtitle']; ?></p>
            </div>
        </section>

        <!-- Blog & Insights Section -->
        <section id="blog" class="py-20 px-4 sm:px-6 bg-white section-bg" role="region" aria-labelledby="blog-heading">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <h2 id="blog-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $t['blog_heading']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['blog_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    $blogs = [
                        'hosted_ivr' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>' ],
                        'contact_center' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>' ],
                        'asterisk' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 9.143L15.143 12l2.286 6.857L12 15.143L6.857 18l2.286-6.857L3 9.143l5.714 2.714L12 3z"/>' ],
                        'voice_broadcasting' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.379c.484 0 .951.221 1.402.572M18 13a3 3 0 100-6m0 0H7"/>' ],
                        'voip_trends' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>' ],
                        'crm_integration' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>' ],
                        'cloud_telephony' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>' ],
                        'ai_analytics' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>' ]
                    ];
                    foreach ($blogs as $key => $data) {
                        $index = array_search($key, array_keys($blogs));
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500 mb-4' fill='none' stroke='currentColor' viewBox='0 0 24 24' aria-hidden='true'>{$data['icon']}</svg>
                            <h3 class='text-xl font-semibold text-gray-700'>{$t["blog_{$key}_title"]}</h3>
                            <p class='text-gray-600'>{$t["blog_{$key}_desc"]}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Case Studies Section -->
        <section id="case-studies" class="py-20 px-4 sm:px-6 bg-white section-bg" role="region" aria-labelledby="case-studies-heading">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <h2 id="case-studies-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $t['case_studies_heading']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['case_studies_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <?php
                    $case_studies = [
                        'retail' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>' ],
                        'healthcare' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>' ],
                        'tech' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>' ],
                        'finance' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>' ]
                    ];
                    foreach ($case_studies as $key => $data) {
                        $index = array_search($key, array_keys($case_studies));
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500 mb-4' fill='none' stroke='currentColor' viewBox='0 0 24 24' aria-hidden='true'>{$data['icon']}</svg>
                            <h3 class='text-xl font-semibold text-gray-700'>{$t["case_study_{$key}_title"]}</h3>
                            <p class='text-gray-600'>{$t["case_study_{$key}_desc"]}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Whitepapers Section -->
        <section id="whitepapers" class="py-20 px-4 sm:px-6 bg-white section-bg" role="region" aria-labelledby="whitepapers-heading">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <h2 id="whiteConcerning-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $t['whitepapers_heading']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['whitepapers_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <?php
                    $whitepapers = [
                        'voip_guide' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>' ],
                        'ai_comms' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>' ]
                    ];
                    foreach ($whitepapers as $key => $data) {
                        $index = array_search($key, array_keys($whitepapers));
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500 mb-4' fill='none' stroke='currentColor' viewBox='0 0 24 24' aria-hidden='true'>{$data['icon']}</svg>
                            <h3 class='text-xl font-semibold text-gray-700'>{$t["whitepaper_{$key}_title"]}</h3>
                            <p class='text-gray-600'>{$t["whitepaper_{$key}_desc"]}</p>
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
                        <li><a href="https://www.youtube.com/channel/UC5ohzJR4g5JId-xIFoVZhMg" class="hover:text-blue-500"><?php echo $t['footer_youtube']; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?> mb-4">
                <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $t['footer_privity']; ?></a>
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