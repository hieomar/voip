<?php
session_start();

// Security: Initialize CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Language handling
$supportedLangs = ['en', 'fr', 'ar'];
$defaultLang = 'en';
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['lang'], $_POST['csrf_token']) &&
    $_POST['csrf_token'] === $_SESSION['csrf_token'] &&
    in_array($_POST['lang'], $supportedLangs)
) {
    $_SESSION['lang'] = $_POST['lang'];
}
$currentLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $defaultLang;

// Translation arrays
$langs = [
    'en' => [
        'meta_desc' => 'Learn about VoIP Savvy, our mission, values, team, and career opportunities.',
        'title' => 'Company | VoIP Savvy',
        'skip' => 'Skip to main content',
        'home' => 'Home',
        'solutions' => 'Solutions',
        'saas' => 'SaaS',
        'professional' => 'Professional Services',
        'resources' => 'Resources',
        'company' => 'Company',
        'partner' => 'Partner Program',
        'faq' => 'FAQ',
        'about_title' => 'About VoIP Savvy',
        'about_subtitle' => 'We’re revolutionizing business communication with innovative VoIP solutions.',
        'about_cta' => 'Meet Our Team',
        'story_title' => 'Our Story',
        'story_subtitle' => 'Discover our mission, values, and journey.',
        'story_desc' => 'Founded on open-source principles, VoIP Savvy delivers cutting-edge VoIP and AI-driven communication solutions to businesses worldwide. From startups to enterprises, our scalable, license-free platforms empower organizations to connect seamlessly across cloud, hybrid, or on-premise deployments, driving innovation and efficiency.',
        'values_title' => 'Our Values',
        'value1_title' => 'Innovation',
        'value1_desc' => 'We push boundaries with AI-driven VoIP solutions to redefine communication.',
        'value2_title' => 'Integrity',
        'value2_desc' => 'We uphold transparency and trust in every interaction.',
        'value3_title' => 'Customer-Centricity',
        'value3_desc' => 'Your success drives our solutions and support.',
        'value4_title' => 'Collaboration',
        'value4_desc' => 'We partner with clients and communities to achieve shared goals.',
        'mission_title' => 'Our Mission',
        'mission_desc' => 'Empower businesses with reliable, AI-driven communication tools.',
        'team_title' => 'Our Team',
        'team_subtitle' => 'Meet the experts behind VoIP Savvy.',
        'team1_name' => 'Ahmed Al-Farsi',
        'team1_role' => 'CEO',
        'team1_bio' => 'Visionary leader with 15+ years in telecom, driving VoIP Savvy’s global expansion.',
        'team2_name' => 'Sarah Khan',
        'team2_role' => 'CTO',
        'team2_bio' => 'Tech innovator specializing in AI and open-source VoIP platforms.',
        'team3_name' => 'Omar Saleh',
        'team3_role' => 'Head of Sales',
        'team3_bio' => 'Sales strategist with a passion for customer success.',
        'team4_name' => 'Layla Hassan',
        'team4_role' => 'Customer Success Manager',
        'team4_bio' => 'Dedicated to ensuring seamless client experiences.',
        'careers_title' => 'Careers',
        'careers_desc' => 'Explore exciting opportunities at VoIP Savvy, from engineering to sales. Join us to shape the future of communication.',
        'careers_cta' => 'View Open Positions',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms of Use',
        'select_lang' => 'Select language',
        'english' => 'English',
        'french' => 'French',
        'arabic' => 'Arabic',
        'connect_with' => 'Connect With Us',
        'contact_title' => 'Contact Us',
        'contact_details' => 'Contact Details',
        'footer_copyright' => '© 2025 VoIP Savvy. All rights reserved.',
        'footer_solutions' => 'Solutions',
        'footer_saas' => 'SaaS',
        'footer_company' => 'Company',
        'footer_connect' => 'Connect',
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
        'meta_desc' => 'Découvrez VoIP Savvy, notre mission, nos valeurs, notre équipe et nos opportunités de carrière.',
        'title' => 'Société | VoIP Savvy',
        'skip' => 'Aller au contenu principal',
        'home' => 'Accueil',
        'solutions' => 'Solutions',
        'saas' => 'SaaS',
        'professional' => 'Services Professionnels',
        'resources' => 'Ressources',
        'company' => 'Société',
        'partner' => 'Programme Partenaires',
        'faq' => 'FAQ',
        'about_title' => 'À propos de VoIP Savvy',
        'about_subtitle' => 'Nous révolutionnons la communication d\'entreprise avec des solutions VoIP innovantes.',
        'about_cta' => 'Rencontrez notre équipe',
        'story_title' => 'Notre histoire',
        'story_subtitle' => 'Découvrez notre mission, nos valeurs et notre parcours.',
        'story_desc' => 'Fondée sur des principes open-source, VoIP Savvy propose des solutions de communication VoIP et IA de pointe aux entreprises du monde entier. Des startups aux grandes entreprises, nos plateformes évolutives et sans licence permettent aux organisations de se connecter de manière fluide via des déploiements cloud, hybrides ou sur site, favorisant l’innovation et l’efficacité.',
        'values_title' => 'Nos valeurs',
        'value1_title' => 'Innovation',
        'value1_desc' => 'Nous repoussons les limites avec des solutions VoIP pilotées par l’IA pour redéfinir la communication.',
        'value2_title' => 'Intégrité',
        'value2_desc' => 'Nous maintenons la transparence et la confiance dans chaque interaction.',
        'value3_title' => 'Centré sur le client',
        'value3_desc' => 'Votre succès guide nos solutions et notre support.',
        'value4_title' => 'Collaboration',
        'value4_desc' => 'Nous collaborons avec les clients et les communautés pour atteindre des objectifs communs.',
        'mission_title' => 'Notre mission',
        'mission_desc' => 'Donner aux entreprises des outils de communication fiables et pilotés par l\'IA.',
        'team_title' => 'Notre équipe',
        'team_subtitle' => 'Rencontrez les experts derrière VoIP Savvy.',
        'team1_name' => 'Ahmed Al-Farsi',
        'team1_role' => 'PDG',
        'team1_bio' => 'Leader visionnaire avec plus de 15 ans dans les télécoms, propulsant l’expansion mondiale de VoIP Savvy.',
        'team2_name' => 'Sarah Khan',
        'team2_role' => 'Directrice Technique',
        'team2_bio' => 'Innovatrice technologique spécialisée dans les plateformes VoIP open-source et IA.',
        'team3_name' => 'Omar Saleh',
        'team3_role' => 'Responsable des Ventes',
        'team3_bio' => 'Stratège des ventes passionné par le succès des clients.',
        'team4_name' => 'Layla Hassan',
        'team4_role' => 'Responsable de la Réussite Client',
        'team4_bio' => 'Dédiée à assurer des expériences client fluides.',
        'careers_title' => 'Carrières',
        'careers_desc' => 'Découvrez des opportunités passionnantes chez VoIP Savvy, de l’ingénierie aux ventes. Rejoignez-nous pour façonner l’avenir de la communication.',
        'careers_cta' => 'Voir les postes ouverts',
        'privacy' => 'Politique de Confidentialité',
        'terms' => 'Conditions d\'Utilisation',
        'select_lang' => 'Choisir la langue',
        'english' => 'Anglais',
        'french' => 'Français',
        'arabic' => 'Arabe',
        'connect_with' => 'Connectez-vous avec nous',
        'contact_title' => 'Contactez-nous',
        'contact_details' => 'Coordonnées',
        'footer_copyright' => '© 2025 VoIP Savvy. Tous droits réservés.',
        'footer_solutions' => 'Solutions',
        'footer_saas' => 'SaaS',
        'footer_company' => 'Société',
        'footer_connect' => 'Connectez-vous',
        'footer_ip_pbx' => 'IP PBX',
        'footer_contact_center' => 'Centre de Contact',
        'footer_ai_bots' => 'Bots Vocaux et de Chat IA',
        'footer_crm' => 'CRM pour Ventes et Services',
        'footer_ivr' => 'Réponse Vocale Interactive',
        'footer_cloud_telephony' => 'Téléphonie Cloud',
        'footer_ccaas' => 'Centre de Contact en tant que Service',
        'footer_hosted_ivr' => 'IVR Hébergé',
        'footer_about' => 'À propos de VoIP Savvy',
        'footer_blog' => 'Blog et Insights',
        'footer_careers' => 'Carrières',
        'footer_contact' => 'Contactez-nous',
        'footer_facebook' => 'Facebook',
        'footer_instagram' => 'Instagram',
        'footer_x' => 'X',
        'footer_linkedin' => 'LinkedIn',
        'footer_youtube' => 'YouTube'
    ],
    'ar' => [
        'meta_desc' => 'تعرف على VoIP Savvy، مهمتنا، قيمنا، فريقنا، وفرص العمل.',
        'title' => 'الشركة | VoIP Savvy',
        'skip' => 'تخطي إلى المحتوى الرئيسي',
        'home' => 'الرئيسية',
        'solutions' => 'الحلول',
        'saas' => 'سحابية',
        'professional' => 'الخدمات الاحترافية',
        'resources' => 'الموارد',
        'company' => 'الشركة',
        'partner' => 'برنامج الشركاء',
        'faq' => 'الأسئلة الشائعة',
        'about_title' => 'عن VoIP Savvy',
        'about_subtitle' => 'نحن نحدث ثورة في الاتصالات التجارية بحلول VoIP مبتكرة.',
        'about_cta' => 'تعرف على فريقنا',
        'story_title' => 'قصتنا',
        'story_subtitle' => 'اكتشف مهمتنا، قيمنا، ورحلتنا.',
        'story_desc' => 'تأسست VoIP Savvy على مبادئ المصادر المفتوحة، وتقدم حلول اتصالات VoIP ومدعومة بالذكاء الاصطناعي متطورة للشركات في جميع أنحاء العالم. من الشركات الناشئة إلى المؤسسات الكبرى، تمكّن منصاتنا القابلة للتوسع وخالية من التراخيص المنظمات من التواصل بسلاسة عبر النشر السحابي أو الهجين أو المحلي، مما يدفع الابتكار والكفاءة.',
        'values_title' => 'قيمنا',
        'value1_title' => 'الابتكار',
        'value1_desc' => 'ندفع الحدود بحلول VoIP مدعومة بالذكاء الاصطناعي لإعادة تعريف الاتصالات.',
        'value2_title' => 'النزاهة',
        'value2_desc' => 'نحافظ على الشفافية والثقة في كل تفاعل.',
        'value3_title' => 'التركيز على العميل',
        'value3_desc' => 'نجاحك يقود حلولنا ودعمنا.',
        'value4_title' => 'التعاون',
        'value4_desc' => 'نتشارك مع العملاء والمجتمعات لتحقيق أهداف مشتركة.',
        'mission_title' => 'مهمتنا',
        'mission_desc' => 'تمكين الشركات بأدوات اتصال موثوقة ومدعومة بالذكاء الاصطناعي.',
        'team_title' => 'فريقنا',
        'team_subtitle' => 'تعرف على الخبراء وراء VoIP Savvy.',
        'team1_name' => 'أحمد الفارسي',
        'team1_role' => 'الرئيس التنفيذي',
        'team1_bio' => 'قائد ذو رؤية مع أكثر من 15 عامًا في الاتصالات، يقود توسع VoIP Savvy العالمي.',
        'team2_name' => 'سارة خان',
        'team2_role' => 'مديرة تقنية',
        'team2_bio' => 'مبتكرة تقنية متخصصة في منصات VoIP مفتوحة المصدر والذكاء الاصطناعي.',
        'team3_name' => 'عمر صالح',
        'team3_role' => 'رئيس المبيعات',
        'team3_bio' => 'استراتيجي مبيعات شغوف بنجاح العملاء.',
        'team4_name' => 'ليلى حسان',
        'team4_role' => 'مديرة نجاح العملاء',
        'team4_bio' => 'مكرسة لضمان تجارب عملاء سلسة.',
        'careers_title' => 'الوظائف',
        'careers_desc' => 'استكشف فرصًا مثيرة في VoIP Savvy، من الهندسة إلى المبيعات. انضم إلينا لتشكيل مستقبل الاتصالات.',
        'careers_cta' => 'عرض الوظائف المتاحة',
        'privacy' => 'سياسة الخصوصية',
        'terms' => 'شروط الاستخدام',
        'select_lang' => 'اختر اللغة',
        'english' => 'الإنجليزية',
        'french' => 'الفرنسية',
        'arabic' => 'العربية',
        'connect_with' => 'تواصل معنا',
        'contact_title' => 'تواصل معنا',
        'contact_details' => 'تفاصيل الاتصال',
        'footer_copyright' => '© 2025 VoIP Savvy. جميع الحقوق محفوظة.',
        'footer_solutions' => 'الحلول',
        'footer_saas' => 'سحابية',
        'footer_company' => 'الشركة',
        'footer_connect' => 'تواصل',
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
        'footer_contact' => 'تواصل معنا',
        'footer_facebook' => 'فيسبوك',
        'footer_instagram' => 'إنستغرام',
        'footer_x' => 'إكس',
        'footer_linkedin' => 'لينكدإن',
        'footer_youtube' => 'يوتيوب'
    ]
];

$t = $langs[$currentLang];
$dir = $currentLang === 'ar' ? 'rtl' : 'ltr';
$font = $currentLang === 'ar' ? "'Amiri', serif" : "'Poppins', sans-serif";

// Generate nonce for inline scripts
$nonce = base64_encode(random_bytes(16));
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $t['meta_desc']; ?>">
    <meta name="author" content="VoIP Savvy">
    <title><?php echo $t['title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body { font-family: <?php echo $font; ?>; background: #E6F0FA; scroll-behavior: smooth; }
        [dir="rtl"] body { font-family: 'Amiri', serif; }
        header.sticky {
            backdrop-filter: blur(15px) saturate(180%);
            background: rgba(230, 240, 250, 0.9);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-top: 0 !important;
        }
        .btn-hover { transition: transform 0.3s, box-shadow 0.3s;}
        .btn-hover:hover, .btn-hover:focus { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(59,130,246,0.2);}
        .card-hover { transition: transform 0.4s, box-shadow 0.4s; border-radius: 1rem;}
        .card-hover:hover, .card-hover:focus { transform: translateY(-12px); box-shadow: 0 10px 25px rgba(59,130,246,0.15);}
        .hero-bg { background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('https://source.unsplash.com/random/1920x1080/?team'); background-size: cover; background-position: center;}
        .gradient-text { background: linear-gradient(90deg, #3B82F6, #A5BFFA); -webkit-background-clip: text; -webkit-text-fill-color: transparent;}
        .language-select { appearance: none; background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>') no-repeat right 0.5rem center/1rem 1rem;}
        [dir="rtl"] .language-select { background-position: left 0.5rem center;}
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0;}
        .focus\:not-sr-only:focus { position: static; width: auto; height: auto; padding: 0.5rem; margin: 0; overflow: visible; clip: auto;}
        .mobile-menu { transform: translateX(<?php echo $dir === 'rtl' ? '100%' : '-100%'; ?>); transition: transform 0.3s ease-in-out;}
        .mobile-menu.open { transform: translateX(0);}
        @media (max-width: 768px) {
            .hero-bg { background-attachment: scroll;}
            .text-7xl { font-size: 2.5rem;}
            .text-5xl { font-size: 2rem;}
            .text-xl { font-size: 1rem;}
            .py-24 { padding-top: 4rem; padding-bottom: 4rem;}
        }
    </style>
</head>
<body>
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-[#3B82F6] focus:text-white focus:p-2"><?php echo $t['skip']; ?></a>
    <!-- Top Bar -->
    <div class="bg-blue-500 text-white text-sm py-2 px-4 sm:px-6 flex justify-between items-center">
        <div class="flex space-x-4 <?php echo $dir === 'rtl' ? 'space-x-reverse' : ''; ?>">
            <a href="tel:+966572434266" class="hover:underline" aria-label="Call +966 572 434 266">+966 572 434 266</a>
            <a href="mailto:hello@voipsavvy.com" class="hover:underline" aria-label="Email hello@voipsavvy.com">hello@voipsavvy.com</a>
        </div>
        <form method="post" class="m-0">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <select name="lang" class="language-select bg-transparent border-none text-white focus:outline-none" aria-label="<?php echo $t['select_lang']; ?>" onchange="this.form.submit()">
                <option value="en" <?php if($currentLang==='en') echo 'selected'; ?>><?php echo $t['english']; ?></option>
                <option value="fr" <?php if($currentLang==='fr') echo 'selected'; ?>><?php echo $t['french']; ?></option>
                <option value="ar" <?php if($currentLang==='ar') echo 'selected'; ?>><?php echo $t['arabic']; ?></option>
            </select>
        </form>
    </div>
    <!-- Header -->
    <header id="header" class="w-full top-0 z-50 bg-blue-50 p-4 flex justify-between items-center">
        <div class="text-3xl font-bold text-blue-500">
            <a href="index.php" aria-label="VoIP Savvy Home">VoIP Savvy</a>
        </div>
        <nav class="hidden md:flex space-x-8 <?php echo $dir === 'rtl' ? 'space-x-reverse' : ''; ?>" aria-label="Main navigation">
            <?php
            $navItems = [
                ['href' => 'index.php', 'label' => $t['home']],
                ['href' => 'solutions.php', 'label' => $t['solutions']],
                ['href' => 'saas.php', 'label' => $t['saas']],
                ['href' => 'professional-services.php', 'label' => $t['professional']],
                ['href' => 'resources.php', 'label' => $t['resources']],
                ['href' => 'company.php', 'label' => $t['company'], 'current' => true],
                ['href' => 'partner-program.php', 'label' => $t['partner']],
                ['href' => 'faq.php', 'label' => $t['faq']]
            ];
            foreach ($navItems as $item) {
                $current = isset($item['current']) && $item['current'] ? 'font-bold text-blue-500' : '';
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold $current'>{$item['label']}</a>";
            }
            ?>
        </nav>
        <button id="menu-toggle" class="md:hidden text-blue-500" aria-label="Toggle mobile menu" aria-expanded="false">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-blue-50 w-full p-4 absolute top-20 z-40 shadow-lg mobile-menu">
        <nav class="flex flex-col space-y-4" aria-label="Mobile navigation">
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
        <section class="pt-24 pb-20 hero-bg text-center text-white" data-aos="fade-up">
            <div class="py-24 px-4 sm:px-6 lg:px-8">
                <h1 class="text-5xl md:text-7xl font-bold gradient-text"><?php echo $t['about_title']; ?></h1>
                <p class="mt-4 text-xl"><?php echo $t['about_subtitle']; ?></p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#team" class="bg-[#3B82F6] hover:bg-[#A5BFFA] text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $t['about_cta']; ?></a>
                </div>
            </div>
        </section>

        <!-- Story Section -->
        <section class="py-20 px-4 sm:px-6 bg-[#E6F0FA]" data-aos="fade-up">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['story_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-4"><?php echo $t['story_subtitle']; ?></p>
                <p class="text-gray-600 text-lg mb-12"><?php echo $t['story_desc']; ?></p>
                <!-- Mission, Team, Careers Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" tabindex="0" data-aos="fade-up">
                        <svg class="w-12 h-12 mx-auto text-[#3B82F6] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <h3 class="text-xl font-semibold text-gray-700"><?php echo $t['mission_title']; ?></h3>
                        <p class="text-gray-600"><?php echo $t['mission_desc']; ?></p>
                    </div>
                    <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" tabindex="0" data-aos="fade-up">
                        <svg class="w-12 h-12 mx-auto text-[#3B82F6] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <h3 class="text-xl font-semibold text-gray-700"><?php echo $t['team_title']; ?></h3>
                        <p class="text-gray-600"><?php echo $t['team_subtitle']; ?></p>
                    </div>
                    <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" tabindex="0" data-aos="fade-up">
                        <svg class="w-12 h-12 mx-auto text-[#3B82F6] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <h3 class="text-xl font-semibold text-gray-700"><?php echo $t['careers_title']; ?></h3>
                        <p class="text-gray-600"><?php echo $t['careers_desc']; ?></p>
                        <a href="careers.php" class="mt-4 inline-block text-[#3B82F6] hover:text-[#A5BFFA]"><?php echo $t['careers_cta']; ?></a>
                    </div>
                </div>
                <!-- Values Subsection -->
                <h3 class="text-3xl font-bold gradient-text mb-6"><?php echo $t['values_title']; ?></h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' tabindex='0' data-aos='fade-up'>
                            <h4 class='text-lg font-semibold text-gray-700'>{$t["value{$i}_title"]}</h4>
                            <p class='text-gray-600'>{$t["value{$i}_desc"]}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-20 px-4 sm:px-6 bg-white" id="team" data-aos="fade-up">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['team_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-12"><?php echo $t['team_subtitle']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' tabindex='0' data-aos='fade-up'>
                            <img src='https://source.unsplash.com/random/150x150/?portrait,$i' alt='{$t["team{$i}_name"]}' class='w-24 h-24 rounded-full mx-auto mb-4'>
                            <h3 class='text-xl font-semibold text-gray-700'>{$t["team{$i}_name"]}</h3>
                            <p class='text-gray-500'>{$t["team{$i}_role"]}</p>
                            <p class='text-gray-600 mt-2'>{$t["team{$i}_bio"]}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-20 px-4 sm:px-6 bg-[#E6F0FA]" data-aos="fade-up">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['contact_title']; ?></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="text-left <?php echo $dir === 'rtl' ? 'text-right' : ''; ?>">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $t['contact_details']; ?></h3>
                        <ul class="space-y-3 text-gray-600">
                            <li>
                                <strong><?php echo $t['contact_title']; ?>:</strong><br>
                                <a href="tel:+966572434266" class="hover:text-[#3B82F6] transition">+966 572 434 266</a>
                            </li>
                            <li>
                                <strong>Email:</strong><br>
                                <a href="mailto:hello@voipsavvy.com" class="hover:text-[#3B82F6] transition">hello@voipsavvy.com</a>
                            </li>
                            <li>
                                <strong>Address:</strong><br>
                                1st Floor, Mada Al-Esnad Building, Imam Faisal bin Turki Street, 12744, Riyadh, Kingdom of Saudi Arabia
                            </li>
                        </ul>
                        <h3 class="text-xl font-semibold text-gray-700 mt-6 mb-4"><?php echo $t['connect_with']; ?></h3>
                        <ul class="flex space-x-4 <?php echo $dir === 'rtl' ? 'space-x-reverse' : ''; ?>">
                            <li><a href="https://www.facebook.com/voipsavvy/" aria-label="Facebook" class="text-gray-600 hover:text-[#3B82F6]"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a></li>
                            <li><a href="https://www.instagram.com/voipsavvy/" aria-label="Instagram" class="text-gray-600 hover:text-[#3B82F6]"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.948-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a></li>
                            <li><a href="https://x.com/SavvyVoip" aria-label="X" class="text-gray-600 hover:text-[#3B82F6]"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg></a></li>
                            <li><a href="https://www.linkedin.com/company/voip-savvy" aria-label="LinkedIn" class="text-gray-600 hover:text-[#3B82F6]"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg></a></li>
                            <li><a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" aria-label="YouTube" class="text-gray-600 hover:text-[#3B82F6]"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#A5BFFA] py-8 text-center text-gray-500 text-sm" role="contentinfo" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex justify-center space-x-4 <?php echo $dir === 'rtl' ? 'space-x-reverse' : ''; ?> mb-6">
                <span>+966 572 434 266</span>
                <span>hello@voipsavvy.com</span>
                <span>Français</span>
            </div>
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
                        <li><a href="company.php#partner-program" class="hover:text-blue-500"><?php echo $t['partner']; ?></a></li>
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
            <div class="flex justify-center space-x-4 mb-4">
                <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $t['privacy']; ?></a>
                <a href="terms-of-use.php" class="hover:text-blue-500"><?php echo $t['terms']; ?></a>
            </div>
            <p><?php echo $t['footer_copyright']; ?></p>
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
        // Close mobile menu on outside click
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                mobileMenu.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.innerHTML = `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>`;
            }
        });
    </script>
</body>
</html>