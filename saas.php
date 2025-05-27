<?php
session_start();

// Security: Initialize CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Configuration: Supported languages
$supported_langs = ['en', 'ar', 'fr'];

// Initialize or update language
if (empty($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['lang'], $_POST['csrf_token']) &&
    $_POST['csrf_token'] === $_SESSION['csrf_token'] &&
    in_array($_POST['lang'], $supported_langs)
) {
    $_SESSION['lang'] = $_POST['lang'];
}

// Define language data
$lang_en = [
    'meta_description' => 'Explore VoIP Savvy’s SaaS solutions for scalable, AI-powered communication.',
    'page_title' => 'SaaS Solutions | VoIP Savvy',
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
    'close_menu' => 'Close mobile menu',
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
    'hero_title' => 'Scale with VoIP Savvy SaaS',
    'hero_subtitle' => 'Discover cloud-based, AI-powered communication solutions designed for flexibility and growth.',
    'hero_cta' => 'Request a Demo',
    'offerings_title' => 'Our SaaS Solutions',
    'offerings_subtitle' => 'Explore our suite of cloud-based tools tailored for modern businesses.',
    'offering_cloud_telephony_title' => 'Cloud Telephony',
    'offering_cloud_telephony_desc' => 'Reliable, scalable VoIP with global reach and crystal-clear calls.',
    'offering_ccaas_title' => 'Contact Center as a Service',
    'offering_ccaas_desc' => 'AI-driven support with omnichannel integration.',
    'offering_crm_title' => 'Sales & Service CRM',
    'offering_crm_desc' => 'Streamline customer interactions with integrated CRM tools.',
    'offering_hosted_ivr_title' => 'Hosted IVR',
    'offering_hosted_ivr_desc' => 'Automated call routing with customizable menus.',
    'benefits_title' => 'Why Choose Our SaaS?',
    'benefits_subtitle' => 'Unlock the power of cloud communication with VoIP Savvy.',
    'benefit_cost_title' => 'Cost Efficiency',
    'benefit_cost_desc' => 'Reduce expenses with pay-as-you-go pricing and no hardware costs.',
    'benefit_scalability_title' => 'Scalability',
    'benefit_scalability_desc' => 'Grow seamlessly with solutions that adapt to your business size.',
    'benefit_support_title' => '24/7 Support',
    'benefit_support_desc' => 'Access expert assistance anytime to ensure uptime.',
    'back_to_top' => 'Back to Top',
    'newsletter_title' => 'Stay Updated',
    'newsletter_desc' => 'Subscribe to our newsletter for the latest VoIP insights.',
    'newsletter_placeholder' => 'Enter your email',
    'newsletter_submit' => 'Subscribe',
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
];

$lang_ar = [
    'meta_description' => 'استكشف حلول VoIP Savvy البرمجية كخدمة للاتصالات المدعومة بالذكاء الاصطناعي وقابلة للتوسع.',
    'page_title' => 'حلول البرمجيات كخدمة | VoIP Savvy',
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
    'close_menu' => 'إغلاق قائمة الهاتف المحمول',
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
    'hero_title' => 'توسع مع VoIP Savvy SaaS',
    'hero_subtitle' => 'اكتشف حلول الاتصالات المدعومة بالذكاء الاصطناعي القائمة على السحابة والمصممة للمرونة والنمو.',
    'hero_cta' => 'طلب عرض توضيحي',
    'offerings_title' => 'حلولنا البرمجية كخدمة',
    'offerings_subtitle' => 'استكشف مجموعتنا من الأدوات القائمة على السحابة المصممة للشركات الحديثة.',
    'offering_cloud_telephony_title' => 'الهاتفية السحابية',
    'offering_cloud_telephony_desc' => 'VoIP موثوق وقابل للتوسع مع تغطية عالمية ومكالمات واضحة تمامًا.',
    'offering_ccaas_title' => 'مركز الاتصال كخدمة',
    'offering_ccaas_desc' => 'دعم مدعوم بالذكاء الاصطناعي مع تكامل متعدد القنوات.',
    'offering_crm_title' => 'CRM للمبيعات والخدمات',
    'offering_crm_desc' => 'تبسيط تفاعلات العملاء مع أدوات CRM مدمجة.',
    'offering_hosted_ivr_title' => 'IVR المستضاف',
    'offering_hosted_ivr_desc' => 'توجيه المكالمات التلقائي مع قوائم قابلة للتخصيص.',
    'benefits_title' => 'لماذا تختار حلولنا البرمجية كخدمة؟',
    'benefits_subtitle' => 'أطلق العنان لقوة الاتصالات السحابية مع VoIP Savvy.',
    'benefit_cost_title' => 'كفاءة التكلفة',
    'benefit_cost_desc' => 'قلل النفقات مع التسعير حسب الاستخدام وبدون تكاليف الأجهزة.',
    'benefit_scalability_title' => 'القابلية للتوسع',
    'benefit_scalability_desc' => 'نمو بسلاسة مع حلول تتكيف مع حجم أعمالك.',
    'benefit_support_title' => 'دعم على مدار الساعة',
    'benefit_support_desc' => 'الوصول إلى مساعدة الخبراء في أي وقت لضمان التشغيل المستمر.',
    'back_to_top' => 'العودة إلى الأعلى',
    'newsletter_title' => 'ابقَ على اطلاع',
    'newsletter_desc' => 'اشترك في النشرة الإخبارية للحصول على أحدث رؤى VoIP.',
    'newsletter_placeholder' => 'أدخل بريدك الإلكتروني',
    'newsletter_submit' => 'اشترك',
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
    'footer_crm' => 'CRM للمبيعات والخدمات',
    'footer_ivr' => 'الاستجابة الصوتية التفاعلية',
    'footer_cloud_telephony' => 'الهاتفية السحابية',
    'footer_ccaas' => 'مركز الاتصال كخدمة',
    'footer_hosted_ivr' => 'IVR المستضاف',
    'footer_about' => 'عن VoIP Savvy',
    'footer_blog' => 'المدونة والرؤى',
    'footer_careers' => 'الوظائف',
    'footer_contact' => 'اتصل بنا',
    'footer_facebook' => 'فيسبوك',
    'footer_instagram' => 'إنستغرام',
    'footer_x' => 'إكس',
    'footer_linkedin' => 'لينكدإن',
    'footer_youtube' => 'يوتيوب'
];

$lang_fr = [
    'meta_description' => 'Découvrez les solutions SaaS de VoIP Savvy pour des communications évolutives alimentées par l\'IA.',
    'page_title' => 'Solutions SaaS | VoIP Savvy',
    'skip_to_content' => 'Passer au contenu principal',
    'call_phone' => 'Appelez le +966 572 434 266',
    'email_contact' => 'Envoyez un email à hello@voipsavvy.com',
    'select_language' => 'Sélectionner la langue',
    'lang_en' => 'Anglais',
    'lang_ar' => 'Arabe',
    'lang_fr' => 'Français',
    'home_logo' => 'Accueil VoIP Savvy',
    'main_nav' => 'Navigation principale',
    'toggle_menu' => 'Basculer le menu mobile',
    'mobile_nav' => 'Navigation mobile',
    'close_menu' => 'Fermer le menu mobile',
    'top_bar_phone' => '+966 572 434 266',
    'top_bar_email' => 'hello@voipsavvy.com',
    'nav_home' => 'Accueil',
    'nav_solutions' => 'Solutions',
    'nav_saas' => 'SaaS',
    'nav_professional_services' => 'Services professionnels',
    'nav_resources' => 'Ressources',
    'nav_company' => 'Entreprise',
    'nav_partner_program' => 'Programme de partenariat',
    'nav_faq' => 'FAQ',
    'hero_title' => 'Évoluez avec VoIP Savvy SaaS',
    'hero_subtitle' => 'Découvrez des solutions de communication basées sur le cloud, alimentées par l\'IA, conçues pour la flexibilité et la croissance.',
    'hero_cta' => 'Demander une démo',
    'offerings_title' => 'Nos solutions SaaS',
    'offerings_subtitle' => 'Explorez notre suite d\'outils basés sur le cloud adaptés aux entreprises modernes.',
    'offering_cloud_telephony_title' => 'Téléphonie cloud',
    'offering_cloud_telephony_desc' => 'VoIP fiable et évolutif avec une portée mondiale et des appels d\'une clarté exceptionnelle.',
    'offering_ccaas_title' => 'Centre de contact en tant que service',
    'offering_ccaas_desc' => 'Support alimenté par l\'IA avec intégration omnicanale.',
    'offering_crm_title' => 'CRM pour les ventes et services',
    'offering_crm_desc' => 'Simplifiez les interactions avec les clients grâce à des outils CRM intégrés.',
    'offering_hosted_ivr_title' => 'IVR hébergé',
    'offering_hosted_ivr_desc' => 'Routage automatique des appels avec des menus personnalisables.',
    'benefits_title' => 'Pourquoi choisir notre SaaS ?',
    'benefits_subtitle' => 'Libérez la puissance de la communication cloud avec VoIP Savvy.',
    'benefit_cost_title' => 'Efficacité des coûts',
    'benefit_cost_desc' => 'Réduisez les dépenses avec une tarification à l\'usage et sans coûts matériels.',
    'benefit_scalability_title' => 'Évolutivité',
    'benefit_scalability_desc' => 'Croissez sans effort avec des solutions qui s\'adaptent à la taille de votre entreprise.',
    'benefit_support_title' => 'Support 24/7',
    'benefit_support_desc' => 'Accédez à une assistance experte à tout moment pour garantir la disponibilité.',
    'back_to_top' => 'Retour en haut',
    'newsletter_title' => 'Restez informé',
    'newsletter_desc' => 'Abonnez-vous à notre newsletter pour les dernières informations sur VoIP.',
    'newsletter_placeholder' => 'Entrez votre email',
    'newsletter_submit' => 'S\'abonner',
    'footer_solutions' => 'Solutions',
    'footer_saas' => 'SaaS',
    'footer_company' => 'Entreprise',
    'footer_connect' => 'Connectez-vous',
    'footer_privacy' => 'Politique de confidentialité',
    'footer_terms' => 'Conditions d\'utilisation',
    'footer_copyright' => '© 2025 VoIP Savvy. Tous droits réservés.',
    'footer_ip_pbx' => 'IP PBX',
    'footer_contact_center' => 'Centre de contact',
    'footer_ai_bots' => 'Bots vocaux et de chat IA',
    'footer_crm' => 'CRM pour les ventes et services',
    'footer_ivr' => 'Réponse vocale interactive',
    'footer_cloud_telephony' => 'Téléphonie cloud',
    'footer_ccaas' => 'Centre de contact en tant que service',
    'footer_hosted_ivr' => 'IVR hébergé',
    'footer_about' => 'À propos de VoIP Savvy',
    'footer_blog' => 'Blog et insights',
    'footer_careers' => 'Carrières',
    'footer_contact' => 'Contactez-nous',
    'footer_facebook' => 'Facebook',
    'footer_instagram' => 'Instagram',
    'footer_x' => 'X',
    'footer_linkedin' => 'LinkedIn',
    'footer_youtube' => 'YouTube'
];

// Map languages
$languages = [
    'en' => $lang_en,
    'ar' => $lang_ar,
    'fr' => $lang_fr
];

// Load selected language
$lang = array_merge($lang_en, $languages[$_SESSION['lang']] ?? []);
$direction = $_SESSION['lang'] === 'ar' ? 'rtl' : 'ltr';

// Generate nonce for inline scripts
$nonce = base64_encode(random_bytes(16));
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_SESSION['lang']); ?>" dir="<?php echo $direction; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($lang['meta_description']); ?>">
    <meta name="author" content="VoIP Savvy">
    <title><?php echo htmlspecialchars($lang['page_title']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: <?php echo $direction === 'rtl' ? "'Amiri', serif" : "'Poppins', sans-serif"; ?>;
            background: #E6F0FA;
            scroll-behavior: smooth;
        }
        header.sticky {
            backdrop-filter: blur(15px) saturate(180%);
            background: rgba(230, 240, 250, 0.9);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        .btn-hover { transition: transform 0.3s, box-shadow 0.3s;}
        .btn-hover:hover, .btn-hover:focus { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(59,130,246,0.2);}
        .card-hover { transition: transform 0.4s, box-shadow 0.4s; border-radius: 1rem;}
        .card-hover:hover, .card-hover:focus { transform: translateY(-12px); box-shadow: 0 10px 25px rgba(59,130,246,0.15);}
        .gradient-text { background: linear-gradient(90deg, #3B82F6, #A5BFFA); -webkit-background-clip: text; -webkit-text-fill-color: transparent;}
        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/call.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .language-select {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>') no-repeat right 0.5rem center/1rem 1rem;
        }
        [dir="rtl"] .language-select {
            background-position: left 0.5rem center;
        }
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0;}
        .focus\:not-sr-only:focus { position: static; width: auto; height: auto; padding: 0.5rem; margin: 0; overflow: visible; clip: auto;}
        .mobile-menu { transform: translateX(<?php echo $direction === 'rtl' ? '100%' : '-100%'; ?>); transition: transform 0.3s ease-in-out;}
        .mobile-menu.open { transform: translateX(0);}
        @media (max-width: 768px) {
            .hero-bg { background-attachment: scroll;}
            .text-7xl { font-size: 3rem;}
            .text-5xl { font-size: 2.5rem;}
            .text-xl { font-size: 1.125rem;}
            .py-24 { padding-top: 4rem; padding-bottom: 4rem;}
        }
    </style>
</head>
<body>
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-blue-500 focus:text-white focus:p-2">
        <?php echo $lang['skip_to_content']; ?>
    </a>
    <!-- Top Bar -->
    <div class="bg-blue-500 text-white text-sm py-2 px-4 sm:px-6 flex justify-between items-center">
        <div class="flex space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?>">
            <a href="tel:+966572434266" class="hover:underline" aria-label="<?php echo $lang['call_phone']; ?>"><?php echo $lang['top_bar_phone']; ?></a>
            <a href="mailto:hello@voipsavvy.com" class="hover:underline" aria-label="<?php echo $lang['email_contact']; ?>"><?php echo $lang['top_bar_email']; ?></a>
        </div>
        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <select name="lang" onchange="this.form.submit()" class="language-select bg-transparent border-none text-white focus:outline-none" aria-label="<?php echo $lang['select_language']; ?>">
                <option value="en" <?php if($_SESSION['lang']==='en') echo 'selected'; ?>><?php echo $lang['lang_en']; ?></option>
                <option value="fr" <?php if($_SESSION['lang']==='fr') echo 'selected'; ?>><?php echo $lang['lang_fr']; ?></option>
                <option value="ar" <?php if($_SESSION['lang']==='ar') echo 'selected'; ?>><?php echo $lang['lang_ar']; ?></option>
            </select>
        </form>
    </div>
    <!-- Header -->
    <header id="header" class="fixed w-full top-0 z-50 bg-blue-50 p-4 flex justify-between items-center">
        <div class="text-3xl font-bold text-blue-500">
            <a href="index.php" aria-label="<?php echo $lang['home_logo']; ?>">VoIP Savvy</a>
        </div>
        <nav class="hidden md:flex space-x-8 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?>" aria-label="<?php echo $lang['main_nav']; ?>">
            <?php
            $navItems = [
                ['href' => 'index.php', 'label' => $lang['nav_home']],
                ['href' => 'solutions.php', 'label' => $lang['nav_solutions']],
                ['href' => 'saas.php', 'label' => 'SaaS', 'current' => true],
                ['href' => 'professional-services.php', 'label' => $lang['nav_professional_services']],
                ['href' => 'resources.php', 'label' => $lang['nav_resources']],
                ['href' => 'company.php', 'label' => $lang['nav_company']],
                ['href' => 'partner-program.php', 'label' => $lang['nav_partner_program']],
                ['href' => 'faq.php', 'label' => $lang['nav_faq']]
            ];
            foreach ($navItems as $item) {
                $current = isset($item['current']) && $item['current'] ? 'font-bold text-blue-500' : '';
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold $current'>{$item['label']}</a>";
            }
            ?>
        </nav>
        <button id="menu-toggle" class="md:hidden text-blue-500" aria-label="<?php echo $lang['toggle_menu']; ?>" aria-expanded="false">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-blue-50 w-full p-4 absolute top-20 z-40 shadow-lg mobile-menu">
        <nav class="flex flex-col space-y-4" aria-label="<?php echo $lang['mobile_nav']; ?>">
            <?php
            foreach ($navItems as $item) {
                $current = isset($item['current']) && $item['current'] ? 'font-bold text-blue-500' : '';
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold $current'>{$item['label']}</a>";
            }
            ?>
        </nav>
    </div>

    <!-- Main Content -->
    <main id="main-content">
        <!-- Hero Section -->
        <section class="pt-24 pb-20 hero-bg text-center text-white" role="region" aria-labelledby="hero-heading">
            <div class="py-24 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
                <h1 id="hero-heading" class="text-5xl md:text-7xl font-bold gradient-text"><?php echo $lang['hero_title']; ?></h1>
                <p class="mt-4 text-xl"><?php echo $lang['hero_subtitle']; ?></p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="demo.php" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $lang['hero_cta']; ?></a>
                </div>
            </div>
        </section>

        <!-- Offerings Section -->
        <section id="offerings" class="py-20 px-4 sm:px-6 bg-white" role="region" aria-labelledby="offerings-heading">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 id="offerings-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['offerings_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $lang['offerings_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    $offerings = [
                        'cloud_telephony' => ['icon' => '☁️'],
                        'ccaas' => ['icon' => '📞'],
                        'crm' => ['icon' => '🔗'],
                        'hosted_ivr' => ['icon' => '🎛️']
                    ];
                    foreach ($offerings as $key => $data) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up'>
                            <div class='text-blue-500 text-4xl mb-4'>{$data['icon']}</div>
                            <h3 class='text-xl font-semibold text-blue-500'>{$lang["offering_{$key}_title"]}</h3>
                            <p class='text-gray-600'>{$lang["offering_{$key}_desc"]}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section id="benefits" class="py-20 px-4 sm:px-6 bg-blue-50" role="region" aria-labelledby="benefits-heading">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 id="benefits-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['benefits_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $lang['benefits_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                    <?php
                    $benefits = [
                        'cost' => ['icon' => '💰'],
                        'scalability' => ['icon' => '📈'],
                        'support' => ['icon' => '🛠️']
                    ];
                    foreach ($benefits as $key => $data) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up'>
                            <div class='text-blue-500 text-4xl mb-4'>{$data['icon']}</div>
                            <h3 class='text-xl font-semibold text-blue-500'>{$lang["benefit_{$key}_title"]}</h3>
                            <p class='text-gray-600'>{$lang["benefit_{$key}_desc"]}</p>
                        </div>";
                    }
                    ?>
                </div>
                <div class="mt-12">
                    <a href="demo.php" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $lang['hero_cta']; ?></a>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section id="newsletter" class="py-20 px-4 sm:px-6 bg-white" role="region" aria-labelledby="newsletter-heading">
            <div class="max-w-2xl mx-auto text-center" data-aos="fade-up">
                <h2 id="newsletter-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['newsletter_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $lang['newsletter_desc']; ?></p>
                <form class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                    <input type="email" placeholder="<?php echo $lang['newsletter_placeholder']; ?>" class="w-full border border-gray-300 rounded-full px-6 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="<?php echo $lang['newsletter_placeholder']; ?>" disabled>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-full btn-hover" disabled><?php echo $lang['newsletter_submit']; ?></button>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-100 py-8 text-center text-gray-500 text-sm" role="contentinfo">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex justify-center space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?> mb-6">
                <span>+966 572 434 266</span>
                <span>hello@voipsavvy.com</span>
                <span>Français</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $lang['footer_solutions']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="solutions.php#ip-pbx" class="hover:text-blue-500"><?php echo $lang['footer_ip_pbx']; ?></a></li>
                        <li><a href="solutions.php#contact-center" class="hover:text-blue-500"><?php echo $lang['footer_contact_center']; ?></a></li>
                        <li><a href="solutions.php#ai-bots" class="hover:text-blue-500"><?php echo $lang['footer_ai_bots']; ?></a></li>
                        <li><a href="solutions.php#crm" class="hover:text-blue-500"><?php echo $lang['footer_crm']; ?></a></li>
                        <li><a href="solutions.php#ivr" class="hover:text-blue-500"><?php echo $lang['footer_ivr']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $lang['footer_saas']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="saas.php#cloud-telephony" class="hover:text-blue-500"><?php echo $lang['footer_cloud_telephony']; ?></a></li>
                        <li><a href="saas.php#ccaas" class="hover:text-blue-500"><?php echo $lang['footer_ccaas']; ?></a></li>
                        <li><a href="saas.php#crm" class="hover:text-blue-500"><?php echo $lang['footer_crm']; ?></a></li>
                        <li><a href="saas.php#hosted-ivr" class="hover:text-blue-500"><?php echo $lang['footer_hosted_ivr']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $lang['footer_company']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="company.php#about" class="hover:text-blue-500"><?php echo $lang['footer_about']; ?></a></li>
                        <li><a href="company.php#blog" class="hover:text-blue-500"><?php echo $lang['footer_blog']; ?></a></li>
                        <li><a href="company.php#careers" class="hover:text-blue-500"><?php echo $lang['footer_careers']; ?></a></li>
                        <li><a href="company.php#partner-program" class="hover:text-blue-500"><?php echo $lang['nav_partner_program']; ?></a></li>
                        <li><a href="contact.php" class="hover:text-blue-500"><?php echo $lang['footer_contact']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $lang['footer_connect']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="https://www.facebook.com/voipsavvy/" class="hover:text-blue-500"><?php echo $lang['footer_facebook']; ?></a></li>
                        <li><a href="https://www.instagram.com/voipsavvy/" class="hover:text-blue-500"><?php echo $lang['footer_instagram']; ?></a></li>
                        <li><a href="https://x.com/SavvyVoip" class="hover:text-blue-500"><?php echo $lang['footer_x']; ?></a></li>
                        <li><a href="https://www.linkedin.com/company/voip-savvy" class="hover:text-blue-500"><?php echo $lang['footer_linkedin']; ?></a></li>
                        <li><a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" class="hover:text-blue-500"><?php echo $lang['footer_youtube']; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center space-x-4 mb-4">
                <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $lang['footer_privacy']; ?></a>
                <a href="terms-of-use.php" class="hover:text-blue-500"><?php echo $lang['footer_terms']; ?></a>
            </div>
            <p><?php echo $lang['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script nonce="<?php echo $nonce; ?>">
        AOS.init({ duration: 1000, once: true, easing: 'ease-out' });
        // Sticky header
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        });
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const isOpen = mobileMenu.classList.contains('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
            menuToggle.innerHTML = isOpen ?
                `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>` :
                `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>`;
        });
    </script>
</body>
</html>