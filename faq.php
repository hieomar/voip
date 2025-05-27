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
    'meta_description' => 'Find answers to frequently asked questions about VoIP Savvy’s VoIP and AI-powered communication solutions.',
    'page_title' => 'FAQ | VoIP Savvy',
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
    'faq_title' => 'Frequently Asked Questions',
    'faq_subtitle' => 'Find answers to common questions about VoIP Savvy’s solutions and services.',
    'faq_q1' => 'What makes VoIP Savvy different?',
    'faq_a1' => 'VoIP Savvy combines open-source flexibility with AI-powered innovation, offering scalable, license-free communication solutions without vendor lock-ins. Our cloud, hybrid, or on-premise deployments ensure you control your telecom stack.',
    'faq_q2' => 'How can AI improve my communication?',
    'faq_a2' => 'Our GeniSpeak AI bots automate up to 80% of customer queries with human-like voice and chat interactions, reducing agent workload and enhancing customer experience across voice, chat, and omnichannel platforms.',
    'faq_q3' => 'Can I customize my VoIP solution?',
    'faq_a3' => 'Yes, our solutions are fully customizable. From smart IVR call flows to CRM integrations and industry-specific packages, we tailor deployments to fit your business needs, whether for healthcare, education, or enterprise.',
    'faq_q4' => 'What kind of support do you offer?',
    'faq_a4' => 'We provide 24/7 human support with real engineers, not bots, ensuring rapid resolution and uptime. Our team also offers training, consulting, and system optimization for seamless operations.',
    'faq_q5' => 'How do you ensure security in communications?',
    'faq_a5' => 'We use end-to-end encryption (TLS, SRTP, HTTPS), comply with ISO 27001, HIPAA, and GDPR standards, and are UAE TDRA-approved, ensuring your data and communications are secure and compliant.',
    'back_to_top' => 'Back to Top',
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
    'meta_description' => 'اعثر على إجابات للأسئلة الشائعة حول حلول VoIP Savvy للاتصالات المدعومة بالذكاء الاصطناعي.',
    'page_title' => 'الأسئلة الشائعة | VoIP Savvy',
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
    'faq_title' => 'الأسئلة الشائعة',
    'faq_subtitle' => 'اعثر على إجابات للأسئلة الشائعة حول حلول وخدمات VoIP Savvy.',
    'faq_q1' => 'ما الذي يميز VoIP Savvy؟',
    'faq_a1' => 'يجمع VoIP Savvy بين المرونة مفتوحة المصدر والابتكار المدعوم بالذكاء الاصطناعي، مقدمًا حلول اتصالات قابلة للتوسع وخالية من التراخيص دون قيود الموردين. تتيح نشراتنا السحابية أو الهجينة أو المحلية التحكم الكامل في بنيتك الاتصالية.',
    'faq_q2' => 'كيف يمكن للذكاء الاصطناعي تحسين اتصالاتي؟',
    'faq_a2' => 'تتيح روبوتات GeniSpeak الذكية أتمتة ما يصل إلى 80% من استفسارات العملاء بتفاعلات صوتية ودردشة شبيهة بالبشر، مما يقلل من عبء العمل على الوكلاء ويعزز تجربة العملاء عبر منصات الصوت والدردشة ومتعددة القنوات.',
    'faq_q3' => 'هل يمكنني تخصيص حل VoIP الخاص بي؟',
    'faq_a3' => 'نعم، حلولنا قابلة للتخصيص بالكامل. من تدفقات المكالمات الذكية لـ IVR إلى التكامل مع CRM وحزم مخصصة للصناعات، نحن نصمم النشر ليناسب احتياجات عملك، سواء للرعاية الصحية أو التعليم أو الشركات.',
    'faq_q4' => 'ما نوع الدعم الذي تقدمونه؟',
    'faq_a4' => 'نقدم دعمًا بشريًا على مدار الساعة مع مهندسين حقيقيين، وليس روبوتات، مما يضمن حلولًا سريعة واستمرارية التشغيل. يقدم فريقنا أيضًا التدريب والاستشارات وتحسين النظام لعمليات سلسة.',
    'faq_q5' => 'كيف تضمنون أمان الاتصالات؟',
    'faq_a5' => 'نستخدم التشفير من طرف إلى طرف (TLS، SRTP، HTTPS)، ونلتزم بمعايير ISO 27001 وHIPAA وGDPR، ومعتمدون من TDRA الإماراتية، مما يضمن أمان بياناتك واتصالاتك وامتثالها.',
    'back_to_top' => 'العودة إلى الأعلى',
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
    'meta_description' => 'Trouvez des réponses aux questions fréquemment posées sur les solutions de communication VoIP et alimentées par l’IA de VoIP Savvy.',
    'page_title' => 'FAQ | VoIP Savvy',
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
    'faq_title' => 'Questions Fréquemment Posées',
    'faq_subtitle' => 'Trouvez des réponses aux questions courantes sur les solutions et services de VoIP Savvy.',
    'faq_q1' => 'Qu’est-ce qui distingue VoIP Savvy ?',
    'faq_a1' => 'VoIP Savvy combine la flexibilité open-source avec l’innovation alimentée par l’IA, offrant des solutions de communication évolutives et sans licence, sans verrouillage par les fournisseurs. Nos déploiements cloud, hybrides ou sur site garantissent un contrôle total de votre infrastructure télécom.',
    'faq_q2' => 'Comment l’IA peut-elle améliorer mes communications ?',
    'faq_a2' => 'Nos bots GeniSpeak AI automatisent jusqu’à 80 % des requêtes clients avec des interactions vocales et de chat semblables à celles des humains, réduisant la charge des agents et améliorant l’expérience client sur les plateformes vocales, de chat et multicanaux.',
    'faq_q3' => 'Puis-je personnaliser ma solution VoIP ?',
    'faq_a3' => 'Oui, nos solutions sont entièrement personnalisables. Des flux d’appels IVR intelligents aux intégrations CRM et aux packages spécifiques à l’industrie, nous adaptons les déploiements à vos besoins, que ce soit pour la santé, l’éducation ou les entreprises.',
    'faq_q4' => 'Quel type de support proposez-vous ?',
    'faq_a4' => 'Nous offrons un support humain 24/7 avec de vrais ingénieurs, pas des bots, garantissant une résolution rapide et une disponibilité continue. Notre équipe propose également des formations, des consultations et une optimisation des systèmes pour des opérations fluides.',
    'faq_q5' => 'Comment garantissez-vous la sécurité des communications ?',
    'faq_a5' => 'Nous utilisons un chiffrement de bout en bout (TLS, SRTP, HTTPS), respectons les normes ISO 27001, HIPAA et GDPR, et sommes approuvés par TDRA des Émirats, garantissant la sécurité et la conformité de vos données et communications.',
    'back_to_top' => 'Retour en haut',
    'footer_solutions' => 'Solutions',
    'footer_saas' => 'SaaS',
    'footer_company' => 'Entreprise',
    'footer_connect' => 'Connectez-vous',
    'footer_privacy' => 'Politique de confidentialité',
    'footer_terms' => 'Conditions d’utilisation',
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
        details summary::-webkit-details-marker { display: none;}
        details summary::marker { display: none;}
        details summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 1rem;
            font-weight: 600;
            color: #3B82F6;
            background: #F9FAFB;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }
        details summary:hover { background: #E6F0FA;}
        details summary::after {
            content: '+';
            font-size: 1.5rem;
            color: #3B82F6;
        }
        details[open] summary::after { content: '-';}
        details[open] summary { background: #E6F0FA;}
        details .faq-answer { padding: 1rem; color: #4B5563;}
        [dir="rtl"] details summary::after { margin-left: 0; margin-right: 1rem;}
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
                ['href' => 'saas.php', 'label' => $lang['nav_saas']],
                ['href' => 'professional-services.php', 'label' => $lang['nav_professional_services']],
                ['href' => 'resources.php', 'label' => $lang['nav_resources']],
                ['href' => 'company.php', 'label' => $lang['nav_company']],
                ['href' => 'partner-program.php', 'label' => $lang['nav_partner_program']],
                ['href' => 'faq.php', 'label' => $lang['nav_faq'], 'current' => true]
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
        <!-- FAQ Section -->
        <section id="faq" class="py-20 px-4 sm:px-6 bg-white" role="region" aria-labelledby="faq-heading">
            <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
                <h2 id="faq-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['faq_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $lang['faq_subtitle']; ?></p>
                <div class="space-y-4">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "
                        <details class='bg-white shadow-lg rounded-xl card-hover' data-aos='fade-up'>
                            <summary class='text-lg'>{$lang["faq_q$i"]}</summary>
                            <div class='faq-answer text-gray-600'>{$lang["faq_a$i"]}</div>
                        </details>";
                    }
                    ?>
                </div>
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