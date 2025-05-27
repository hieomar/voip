<?php
session_start();

// Language handling
$defaultLang = 'en';
if (isset($_POST['lang']) && in_array($_POST['lang'], ['en', 'fr', 'ar'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
$currentLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $defaultLang;

// Translation arrays
$langs = [
    'en' => [
        'meta_desc' => 'VoIP Savvy offers smart VoIP and AI-powered communication solutions for businesses, including IP PBX, AI chatbots, contact centers, and more.',
        'title' => 'VoIP Savvy | Smart VoIP & AI Communication',
        'skip' => 'Skip to main content',
        'home' => 'Home',
        'solutions' => 'Solutions',
        'saas' => 'SaaS',
        'professional' => 'Professional Services',
        'resources' => 'Resources',
        'company' => 'Company',
        'partner' => 'Partner Program',
        'faq' => 'FAQ',
        'demo' => 'Your Demo Awaits',
        'trusted' => 'Trusted by Businesses Across Industries',
        'about_title' => 'About VoIP Savvy',
        'about_desc1' => 'VoIP Savvy was founded to revolutionize business communication. Our open-source roots and AI-driven solutions empower businesses with flexible, scalable, and cost-effective telephony systems—free from vendor lock-ins.',
        'about_desc2' => 'We deliver enterprise-grade quality at unbeatable value, bridging the gap between DIY platforms and complex UC systems. Trusted by over 1000+ businesses, we’re here to help you communicate smarter.',
        'more_about' => 'More About Us',
        'smart_solutions' => 'Smart Solutions That Scale With You',
        'solutions_desc' => 'Discover our AI-driven VoIP and communication solutions designed for flexibility and growth.',
        'why_choose' => 'Why Choose VoIP Savvy',
        'why_desc' => 'Our unique strengths empower your business to communicate smarter.',
        'contact_title' => 'Get in Touch',
        'contact_desc' => 'Have questions or need assistance? Reach out to us directly.',
        'contact_details' => 'Contact Details',
        'connect_with' => 'Connect With Us',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms of Use',
        'select_lang' => 'Select language',
        'english' => 'English',
        'french' => 'French',
        'arabic' => 'Arabic',
        'hero_title' => 'Unleash Smart VoIP & AI-Powered Communication',
        'hero_subtitle' => 'Born open-source. Backed by humans. Loved by businesses.',
        'hero_description' => 'Reduce costs, scale with confidence, and elevate customer experiences with smart VoIP and AI-powered communication.',
        'customer_stories' => 'See Customer Stories',
        'explore_solutions' => 'Explore All Solutions',
        'cta_title' => 'Ready to Level Up Your Business Communication?',
        'cta_desc' => 'VoIP Savvy delivers powerful, AI-enabled VoIP and contact center tools that are customizable, scalable, and future-proof. Whether you\'re migrating from legacy systems or starting fresh—we\'ve got your back.',
        'badges_title' => 'Built with Trust and Compliance',
        'badges_desc' => 'We build with trust, transparency, and compliance - so you can scale worry-free.'
    ],
    'fr' => [
        'meta_desc' => 'VoIP Savvy propose des solutions intelligentes de VoIP et de communication alimentées par l\'IA pour les entreprises, y compris IP PBX, chatbots IA, centres de contact, et plus.',
        'title' => 'VoIP Savvy | Communication VoIP & IA intelligente',
        'skip' => 'Aller au contenu principal',
        'home' => 'Accueil',
        'solutions' => 'Solutions',
        'saas' => 'SaaS',
        'professional' => 'Services Professionnels',
        'resources' => 'Ressources',
        'company' => 'Société',
        'partner' => 'Programme Partenaires',
        'faq' => 'FAQ',
        'demo' => 'Votre Démo Vous Attend',
        'trusted' => 'Approuvé par des entreprises de tous secteurs',
        'about_title' => 'À propos de VoIP Savvy',
        'about_desc1' => 'VoIP Savvy a été fondé pour révolutionner la communication d\'entreprise. Nos racines open source et nos solutions basées sur l\'IA offrent aux entreprises des systèmes téléphoniques flexibles, évolutifs et économiques, sans dépendance fournisseur.',
        'about_desc2' => 'Nous offrons une qualité de niveau entreprise à une valeur imbattable, comblant le fossé entre les plateformes DIY et les systèmes UC complexes. Plus de 1000 entreprises nous font confiance pour améliorer leurs communications.',
        'more_about' => 'En savoir plus',
        'smart_solutions' => 'Des solutions intelligentes et évolutives',
        'solutions_desc' => 'Découvrez nos solutions VoIP et de communication alimentées par l\'IA, conçues pour la flexibilité et la croissance.',
        'why_choose' => 'Pourquoi choisir VoIP Savvy',
        'why_desc' => 'Nos atouts uniques permettent à votre entreprise de communiquer plus intelligemment.',
        'contact_title' => 'Contactez-nous',
        'contact_desc' => 'Des questions ou besoin d\'aide ? Contactez-nous directement.',
        'contact_details' => 'Coordonnées',
        'connect_with' => 'Connectez-vous avec nous',
        'privacy' => 'Politique de Confidentialité',
        'terms' => 'Conditions d\'Utilisation',
        'select_lang' => 'Choisir la langue',
        'english' => 'Anglais',
        'french' => 'Français',
        'arabic' => 'Arabe',
        'hero_title' => 'Libérez des Communications VoIP et IA Intelligentes',
        'hero_subtitle' => 'Né open-source. Soutenu par des humains. Apprécié par les entreprises.',
        'hero_description' => 'Réduisez les coûts, évoluez en confiance et améliorez l\'expérience client avec des communications intelligentes VoIP et IA.',
        'customer_stories' => 'Voir les histoires de clients',
        'explore_solutions' => 'Explorer toutes les solutions',
        'cta_title' => 'Prêt à améliorer votre communication d\'entreprise ?',
        'cta_desc' => 'VoIP Savvy propose des outils VoIP et de centre de contact puissants et activés par l\'IA, personnalisables, évolutifs et prêts pour l\'avenir. Que vous migriez depuis des systèmes legacy ou que vous commenciez de zéro, nous sommes là pour vous.',
        'badges_title' => 'Conçu avec confiance et conformité',
        'badges_desc' => 'Nous construisons avec confiance, transparence et conformité - pour que vous puissiez évoluer sans soucis.'
    ],
    'ar' => [
        'meta_desc' => 'تقدم VoIP Savvy حلول VoIP ذكية مدعومة بالذكاء الاصطناعي للأعمال، بما في ذلك IP PBX، وروبوتات الدردشة، ومراكز الاتصال والمزيد.',
        'title' => 'VoIP Savvy | حلول الاتصالات الذكية والذكاء الاصطناعي',
        'skip' => 'تخطي إلى المحتوى الرئيسي',
        'home' => 'الرئيسية',
        'solutions' => 'الحلول',
        'saas' => 'سحابية',
        'professional' => 'الخدمات الاحترافية',
        'resources' => 'الموارد',
        'company' => 'الشركة',
        'partner' => 'برنامج الشركاء',
        'faq' => 'الأسئلة الشائعة',
        'demo' => 'جرب العرض الآن',
        'trusted' => 'موثوق من قبل شركات عبر الصناعات',
        'about_title' => 'حول VoIP Savvy',
        'about_desc1' => 'تأسست VoIP Savvy لإحداث ثورة في الاتصال المؤسسي. جذورنا مفتوحة المصدر وحلولنا المدعومة بالذكاء الاصطناعي تمنح الشركات أنظمة هاتفية مرنة وقابلة للتوسع وفعّالة من حيث التكلفة - دون احتكار الموردين.',
        'about_desc2' => 'نقدم جودة من مستوى المؤسسات بقيمة لا تضاهى، ونربط الفجوة بين المنصات الذاتية وأنظمة UC المعقدة. نحن هنا لمساعدتك على الاتصال بذكاء.',
        'more_about' => 'المزيد عنا',
        'smart_solutions' => 'حلول ذكية تتوسع معك',
        'solutions_desc' => 'اكتشف حلولنا الذكية للاتصالات المدعومة بالذكاء الاصطناعي المصممة للمرونة والنمو.',
        'why_choose' => 'لماذا تختار VoIP Savvy',
        'why_desc' => 'تمنحك نقاط القوة الفريدة لدينا القدرة على الاتصال بشكل أذكى.',
        'contact_title' => 'تواصل معنا',
        'contact_desc' => 'هل لديك أسئلة أو تحتاج إلى المساعدة؟ تواصل معنا مباشرة.',
        'contact_details' => 'تفاصيل الاتصال',
        'connect_with' => 'تو структуру معنا',
        'privacy' => 'سياسة الخصوصية',
        'terms' => 'شروط الاستخدام',
        'select_lang' => 'اختر اللغة',
        'english' => 'الإنجليزية',
        'french' => 'الفرنسية',
        'arabic' => 'العربية',
        'hero_title' => 'أطلق العنان للاتصالات الذكية بتقنية VoIP والذكاء الاصطناعي',
        'hero_subtitle' => 'مولود مفتوح المصدر. مدعوم من البشر. محبوب من الشركات.',
        'hero_description' => 'قلل التكاليف، قم بالتوسع بثقة، وارفع تجارب العملاء مع اتصالات ذكية بتقنية VoIP والذكاء الاصطناعي.',
        'customer_stories' => 'شاهد قصص العملاء',
        'explore_solutions' => 'استكشف جميع الحلول',
        'cta_title' => 'هل أنت جاهز لرفع مستوى اتصالات عملك؟',
        'cta_desc' => 'تقدم VoIP Savvy أدوات VoIP ومراكز اتصال قوية مدعومة بالذكاء الاصطناعي، قابلة للتخصيص، وقابلة للتوسع، ومستقبلية. سواء كنت تنتقل من أنظمة قديمة أو تبدأ من جديد، نحن هنا لدعمك.',
        'badges_title' => 'مبني بثقة وامتثال',
        'badges_desc' => 'نبني بالثقة والشفافية والامتثال - حتى تتمكن من التوسع دون قلق.'
    ]
];

// Current language translations
$t = $langs[$currentLang];

// CSRF token (from first file)
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>

<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>" dir="<?php echo $currentLang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $t['meta_desc']; ?>">
    <meta name="author" content="VoIP Savvy">
    <title><?php echo $t['title']; ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins and Amiri -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #E6F0FA;
            scroll-behavior: smooth;
        }
        [dir="rtl"] body {
            font-family: 'Amiri', serif;
        }
        header.sticky {
            backdrop-filter: blur(15px) saturate(180%);
            background: rgba(230, 240, 250, 0.9);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 0 !important;
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
        }
        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/random/1920x1080/?technology');
            background-size: cover;
            background-position: center;
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
        .logo-slider {
            display: flex;
            animation: scroll 20s linear infinite;
        }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .logo-slider img {
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }
        .logo-slider img:hover {
            filter: grayscale(0%);
        }
        .language-select {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>') no-repeat right 0.5rem center/1rem 1rem;
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
            transform: translateX(-100%);
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
            .logo-slider {
                animation: none;
                flex-wrap: wrap;
                justify-content: center;
            }
            .logo-slider img {
                margin: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-blue-500 focus:text-white focus:p-2">
        <?php echo $t['skip']; ?>
    </a>

    <!-- Top Bar -->
    <div class="bg-blue-500 text-white text-sm py-2 px-4 sm:px-6 flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="tel:+966572434266" class="hover:underline" aria-label="Call +966 572 434 266">+966 572 434 266</a>
            <a href="mailto:hello@voipsavvy.com" class="hover:underline" aria-label="Email hello@voipsavvy.com">hello@voipsavvy.com</a>
        </div>
        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <select name="lang" onchange="this.form.submit()" class="language-select bg-transparent border-none text-white focus:outline-none" aria-label="<?php echo $t['select_lang']; ?>">
                <option value="en" <?php echo $currentLang === 'en' ? 'selected' : ''; ?>><?php echo $t['english']; ?></option>
                <option value="fr" <?php echo $currentLang === 'fr' ? 'selected' : ''; ?>><?php echo $t['french']; ?></option>
                <option value="ar" <?php echo $currentLang === 'ar' ? 'selected' : ''; ?>><?php echo $t['arabic']; ?></option>
            </select>
        </form>
    </div>

    <!-- Header -->
    <header id="header" class="fixed w-full top-0 z-50 bg-blue-50 p-4 flex justify-between items-center mt-10">
        <div class="text-3xl font-bold text-blue-500">
            <a href="index.php" aria-label="VoIP Savvy Home">VoIP Savvy</a>
        </div>
        <nav class="hidden md:flex space-x-8" aria-label="Main navigation">
            <?php
            $navItems = [
                ['href' => 'index.php', 'label' => $t['home']],
                ['href' => 'solutions.php', 'label' => $t['solutions']],
                ['href' => 'saas.php', 'label' => $t['saas']],
                ['href' => 'professional-services.php', 'label' => $t['professional']],
                ['href' => 'resources.php', 'label' => $t['resources']],
                ['href' => 'company.php', 'label' => $t['company']],
                ['href' => 'partner-program.php', 'label' => $t['partner']],
                ['href' => 'faq.php', 'label' => $t['faq']]
            ];
            foreach ($navItems as $item) {
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
            }
            ?>
        </nav>
        <button id="menu-toggle" class="md:hidden text-blue-500" aria-label="Toggle mobile menu" aria-expanded="false">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-blue-50 w-full p-4 absolute top-20 z-40 shadow-lg mobile-menu">
        <nav class="flex flex-col space-y-4" aria-label="Mobile navigation">
            <?php
            foreach ($navItems as $item) {
                echo "<a href='{$item['href']}' class='text-gray-600 hover:text-blue-500 transition font-semibold'>{$item['label']}</a>";
            }
            ?>
        </nav>
    </div>

    <main id="main-content">
        <!-- Hero Section -->
        <section class="pt-24 pb-20 hero-bg text-center text-white">
            <div class="py-24 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
                <h1 class="text-5xl md:text-7xl font-bold gradient-text"><?php echo $t['hero_title']; ?></h1>
                <p class="mt-4 text-xl"><?php echo $t['hero_subtitle']; ?></p>
                <p class="mt-2 text-lg"><?php echo $t['hero_description']; ?></p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="demo.php" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $t['demo']; ?></a>
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
        <section class="py-20 px-4 sm:px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['trusted']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo str_replace('Trusted by', 'Join over 1000+ enterprises transforming customer experience with VoIP Savvy.', $t['trusted']); ?></p>
                <div class="overflow-hidden">
                    <div class="logo-slider flex space-x-8">
                        <?php
                        $logos = [
                            '1 Saudi_Arabian_Monetary_Authority.png',
                            '2 Mitsubishi Electric.png',
                            '3 MTN.png',
                            '4 Orange Telecom.png',
                            '5 Call Africa.png',
                            '6 MASIMO.png',
                            '7 Saudi-Exports-Development-Authority.png',
                            '8 ICL Fincorp.png',
                            '9 Domino\'s_Pizza.png',
                            '10 Al fanar.png',
                            '11 Safe Gas.png',
                            '12 View Water.png',
                            '13 Cloud Gate.png',
                            '14 Golden Monkey.png',
                            '15 buildings_rank.png',
                            '16 BDU Bank.png',
                            '17 Infinite Finance.png',
                            '18 Mada Alesnad for trading.png',
                            '19 NKB.png',
                            '20 Polosys.png'
                        ];
                        foreach ($logos as $index => $logo) {
                            echo "<img src='images/$logo' alt='Client Logo " . ($index + 1) . "' class='h-12'>";
                        }
                        ?>
                    </div>
                </div>
                <a href="customer-stories.php" class="text-blue-500 hover:underline mt-8 inline-block"><?php echo $t['customer_stories']; ?></a>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 px-4 sm:px-6 bg-blue-50">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['about_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-4"><?php echo $t['about_desc1']; ?></p>
                <p class="text-gray-600 text-lg"><?php echo $t['about_desc2']; ?></p>
                <a href="company.php" class="mt-6 inline-block text-blue-500 font-semibold hover:underline"><?php echo $t['more_about']; ?></a>
            </div>
        </section>

        <!-- Solutions Section -->
        <section id="solutions" class="py-20 px-4 sm:px-6 bg-white">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['smart_solutions']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['solutions_desc']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $solutions = [
                        [
                            'id' => 'ip-pbx',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>',
                            'title' => 'IP PBX System',
                            'desc' => 'VoIP Savvy’s cloud phone system gives you total control - no vendor lock-ins, ever.'
                        ],
                        [
                            'id' => 'ai-bots',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'AI Voice & Chat Bots',
                            'desc' => 'Automate 80% of customer queries instantly with bots that sound human and act smart.'
                        ],
                        [
                            'id' => 'contact-center',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                            'title' => 'Contact Center Solution',
                            'desc' => 'All-in-one contact center suite to boost agent performance and customer satisfaction at scale.'
                        ],
                        [
                            'id' => 'ivr',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'Interactive Voice Response',
                            'desc' => 'Smart call flows that route customers faster - reducing live agent load 24/7.'
                        ],
                        [
                            'id' => 'crm',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10h6m-6 0H3m12 0h6"/>',
                            'title' => 'Sales & Service CRM',
                            'desc' => 'Click-to-call, auto-logging, and smarter workflows - right inside your CRM.'
                        ],
                        [
                            'id' => 'voice-logger',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14"/>',
                            'title' => 'Voice Logger',
                            'desc' => 'Every call recorded, searchable, and secure - ideal for training, QA, and compliance.'
                        ],
                        [
                            'id' => 'voice-broadcasting',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>',
                            'title' => 'Voice Broadcasting Tool',
                            'desc' => 'Reach thousands in seconds with automated voice messages that drive results.'
                        ],
                        [
                            'id' => 'conferencing',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l4-4h4a1.994 1.994 0 011.414.586z"/>',
                            'title' => 'Audio Conferencing Suite',
                            'desc' => 'Host crystal-clear, secure group calls - no apps, no limits, just seamless collaboration.'
                        ],
                        [
                            'id' => 'webrtc',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'WebRTC Solutions',
                            'desc' => 'Enable real-time video, voice, and data sharing with our WebRTC solutions.'
                        ]
                    ];
                    foreach ($solutions as $index => $solution) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500' fill='none' stroke='currentColor' viewBox='0 0 24 24'>{$solution['icon']}</svg>
                            <h3 class='text-lg font-semibold text-blue-500 mt-4'>{$solution['title']}</h3>
                            <p class='text-gray-600 text-sm mt-2'>{$solution['desc']}</p>
                            <a href='solutions.php#{$solution['id']}' class='text-blue-500 hover:underline mt-4 inline-block'>{$t['more_about']}</a>
                        </div>";
                    }
                    ?>
                </div>
                <div class="text-center mt-12" data-aos="fade-up">
                    <a href="solutions.php" class="text-blue-500 font-semibold hover:underline"><?php echo $t['explore_solutions']; ?></a>
                </div>
            </div>
        </section>

        <!-- Why Us Section -->
        <section id="why-us" class="py-20 px-4 sm:px-6 bg-blue-50">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['why_choose']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['why_desc']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                    $whyUs = [
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>',
                            'title' => 'On-Cloud or Hybrid',
                            'desc' => 'Deploy the way you want - fully cloud, hybrid, or on-prem.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'Zero Hidden Costs',
                            'desc' => 'Transparent pricing. No surprise charges, ever.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                            'title' => 'Quick Go Live',
                            'desc' => 'Go live in days, not weeks - no technical headaches.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>',
                            'title' => 'Boost in Customer Experience',
                            'desc' => 'Automate, personalize, and improve every call interaction.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>',
                            'title' => '150+ API Integrations',
                            'desc' => 'Plug into CRMs, ERPs, HMS, PMS, and more - effortlessly.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.5 0a9 9 0 019 9 9 9 0 01-9 9 9 9 0 01-9-9 9 9 0 019-9zm-1 2a7 7 0 00-7 7 7 7 0 007 7 7 7 0 007-7 7 7 0 00-7-7z"/>',
                            'title' => 'Multilingual Interfaces',
                            'desc' => 'Support users and teams in their native language.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
                            'title' => 'Innovative Products',
                            'desc' => 'Built on AI + open standards - always evolving, never outdated.'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>',
                            'title' => '24/7 Human Support',
                            'desc' => 'Real engineers, not bots - whenever you need us.'
                        ]
                    ];
                    foreach ($whyUs as $index => $item) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500' fill='none' stroke='currentColor' viewBox='0 0 24 24'>{$item['icon']}</svg>
                            <h3 class='text-lg font-semibold text-blue-500 mt-4'>{$item['title']}</h3>
                            <p class='text-gray-600 text-sm mt-2'>{$item['desc']}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Badges Section -->
        <section class="py-20 px-4 sm:px-6 bg-blue-50">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['badges_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['badges_desc']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $badges = [
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                            'title' => '99.99% Uptime Guaranteed',
                            'desc' => 'Enterprise-grade hosting, maximum reliability'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>',
                            'title' => 'End-to-End Encryption',
                            'desc' => 'Secure communication with TLS, SRTP & HTTPS protocols'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                            'title' => 'ISO 27001 Certified',
                            'desc' => 'Built on globally recognized information security standards'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                            'title' => 'HIPAA Compliant',
                            'desc' => 'Protecting healthcare communications with strict data controls'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'GDPR Compliant',
                            'desc' => 'We respect your data - privacy-first by design'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>',
                            'title' => 'UAE TDRA Approved',
                            'desc' => 'Aligned with UAE Telecom & Digital Government standards'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                            'title' => '250+ Clients Worldwide',
                            'desc' => 'Across 10+ countries, industries, and organization sizes'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            'title' => 'Global Coverage',
                            'desc' => 'Hosted infrastructure & partners across Asia, MEA & beyond'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
                            'title' => 'Advanced Tech + 24/7 Support',
                            'desc' => 'AI-powered systems with always-on human support'
                        ]
                    ];
                    foreach ($badges as $index => $badge) {
                        echo "
                        <div class='bg-white shadow-lg rounded-2xl p-6 text-center card-hover' data-aos='fade-up' data-aos-delay='" . (100 + $index * 100) . "' tabindex='0'>
                            <svg class='w-12 h-12 mx-auto text-blue-500' fill='none' stroke='currentColor' viewBox='0 0 24 24'>{$badge['icon']}</svg>
                            <h3 class='text-lg font-semibold text-blue-500 mt-4'>{$badge['title']}</h3>
                            <p class='text-gray-600 text-sm mt-2'>{$badge['desc']}</p>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 sm:px-6 bg-white text-center">
            <div class="max-w-4xl mx-auto" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['cta_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['cta_desc']; ?></p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="demo.php" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $t['demo']; ?></a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 px-4 sm:px-6 bg-blue-50">
            <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $t['contact_title']; ?></h2>
                <p class="text-gray-600 text-lg mb-8"><?php echo $t['contact_desc']; ?></p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="text-left" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $t['contact_details']; ?></h3>
                        <ul class="space-y-3 text-gray-600">
                            <li>
                                <strong><?php echo $t['contact_title']; ?>:</strong><br>
                                <a href="tel:+966534865063" class="hover:text-blue-500 transition">+966 534 865 063</a><br>
                                <a href="tel:+966572434266" class="hover:text-blue-500 transition">+966 572 434 266</a><br>
                                <a href="tel:+919562562433" class="hover:text-blue-500 transition">+91 9562 562 433</a>
                            </li>
                            <li>
                                <strong><?php echo $t['contact_title']; ?>:</strong><br>
                                <a href="mailto:hello@vconn.com" class="hover:text-blue-500 transition">hello@vconn.com</a><br>
                                <a href="mailto:hello@voipsavvy.com" class="hover:text-blue-500 transition">hello@voipsavvy.com</a>
                            </li>
                            <li>
                                <strong><?php echo $t['contact_title']; ?>:</strong><br>
                                1st Floor, Mada Al-Esnad Building, Imam Faisal bin Turki Street, 12744, Riyadh, Kingdom of Saudi Arabia
                            </li>
                        </ul>
                    </div>
                    <div class="text-left" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $t['connect_with']; ?></h3>
                        <ul class="space-y-3 text-gray-600">
                            <li>
                                <a href="https://www.facebook.com/voipsavvy/" class="hover:text-blue-500 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/voipsavvy/" class="hover:text-blue-500 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.919-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.332.014 7.052.072 2.951.227.227 2.951.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.225 4.101 2.949 6.825 7.05 6.98 1.28.058 1.689.072 4.948.072s3.668-.014 4.948-.072c4.101-.225 6.825-2.949 6.98-7.05.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.225-4.101-2.949-6.825-7.05-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                    Instagram
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/SavvyVoip" class="hover:text-blue-500 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                                    X
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/voip-savvy" class="hover:text-blue-500 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-1.337-.03-3.06-1.867-3.06-1.867 0-2.153 1.459-2.153 2.967v5.697h-3v-11h2.879v1.509h.04c.401-.757 1.379-1.557 2.834-1.557 3.03 0 3.587 1.996 3.587 4.592v6.456z"/></svg>
                                    LinkedIn
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" class="hover:text-blue-500 transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186 31.247 31.247 0 0 0 0 12c0 1.987.185 3.936.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.872.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.016 3.016 0 0 0 2.122-2.136A31.247 31.247 0 0 0 24 12c0-1.987-.185-3.936-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    YouTube
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-100 py-8 text-center text-gray-500 text-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['solutions']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="solutions.php#ip-pbx" class="hover:text-blue-500"><?php echo $t['solutions'] === 'Solutions' ? 'IP PBX' : ($t['solutions'] === 'Solutions' ? 'IP PBX' : 'IP PBX'); ?></a></li>
                        <li><a href="solutions.php#contact-center" class="hover:text-blue-500"><?php echo $t['solutions'] === 'Solutions' ? 'Contact Center' : 'Centre de Contact'; ?></a></li>
                        <li><a href="solutions.php#ai-bots" class="hover:text-blue-500"><?php echo $t['solutions'] === 'Solutions' ? 'AI Voice & Chat Bots' : 'Bots Vocaux & Chat IA'; ?></a></li>
                        <li><a href="solutions.php#crm" class="hover:text-blue-500"><?php echo $t['solutions'] === 'Solutions' ? 'Sales & Service CRM' : 'CRM Ventes & Services'; ?></a></li>
                        <li><a href="solutions.php#ivr" class="hover:text-blue-500"><?php echo $t['solutions'] === 'Solutions' ? 'Interactive Voice Response' : 'Réponse Vocale Interactive'; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['saas']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="saas.php#cloud-telephony" class="hover:text-blue-500"><?php echo $t['saas'] === 'SaaS' ? 'Cloud Telephony' : 'Téléphonie Cloud'; ?></a></li>
                        <li><a href="saas.php#ccaas" class="hover:text-blue-500"><?php echo $t['saas'] === 'SaaS' ? 'Contact Center as a Service' : 'Centre de Contact en Service'; ?></a></li>
                        <li><a href="saas.php#crm" class="hover:text-blue-500"><?php echo $t['saas'] === 'SaaS' ? 'Sales & Service CRM' : 'CRM Ventes & Services'; ?></a></li>
                        <li><a href="saas.php#hosted-ivr" class="hover:text-blue-500"><?php echo $t['saas'] === 'SaaS' ? 'Hosted IVR' : 'IVR Hébergé'; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['company']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="company.php#about" class="hover:text-blue-500"><?php echo $t['about_title']; ?></a></li>
                        <li><a href="company.php#blog" class="hover:text-blue-500"><?php echo $t['company'] === 'Company' ? 'Blog & Insights' : 'Blog & Perspectives'; ?></a></li>
                        <li><a href="company.php#careers" class="hover:text-blue-500"><?php echo $t['company'] === 'Company' ? 'Careers' : 'Carrières'; ?></a></li>
                        <li><a href="company.php#partner-program" class="hover:text-blue-500"><?php echo $t['partner']; ?></a></li>
                        <li><a href="contact.php" class="hover:text-blue-500"><?php echo $t['contact_title']; ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-500 mb-4"><?php echo $t['connect_with']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="https://www.facebook.com/voipsavvy/" class="hover:text-blue-500">Facebook</a></li>
                        <li><a href="https://www.instagram.com/voipsavvy/" class="hover:text-blue-500">Instagram</a></li>
                        <li><a href="https://x.com/SavvyVoip" class="hover:text-blue-500">X</a></li>
                        <li><a href="https://www.linkedin.com/company/voip-savvy" class="hover:text-blue-500">LinkedIn</a></li>
                        <li><a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" class="hover:text-blue-500">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center space-x-4 mb-4">
                <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $t['privacy']; ?></a>
                <a href="terms-of-use.php" class="hover:text-blue-500"><?php echo $t['terms']; ?></a>
            </div>
            <p>© 2025 VoIP Savvy. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
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