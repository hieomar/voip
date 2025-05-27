<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if (empty($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = in_array($_POST['lang'], ['en', 'ar', 'fr']) ? $_POST['lang'] : 'en';
}
$lang_file = __DIR__ . '/lang/' . $_SESSION['lang'] . '.json';
$lang = [];
$default_lang = [
    'meta_description' => 'Leverage VoIP Savvy’s professional services for custom VoIP solutions and seamless integration.',
    'page_title' => 'Professional Services | VoIP Savvy',
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
    'hero_title' => 'Expert VoIP Solutions',
    'hero_subtitle' => 'Our professional services deliver custom VoIP solutions tailored to your business.',
    'hero_cta' => 'Get in Touch',
    'services_title' => 'Our Professional Services',
    'services_subtitle' => 'From consultancy to integration, we provide end-to-end VoIP expertise.',
    'service_asterisk_title' => 'Asterisk Consultancy',
    'service_asterisk_desc' => 'Optimize your Asterisk-based systems with expert guidance.',
    'service_custom_dev_title' => 'Custom Development',
    'service_custom_dev_desc' => 'Build bespoke VoIP solutions for unique business needs.',
    'service_integration_title' => 'System Integration',
    'service_integration_desc' => 'Seamlessly connect VoIP with your existing systems.',
    'process_title' => 'Our Process',
    'process_subtitle' => 'A streamlined approach to deliver your VoIP solution.',
    'process_consult_title' => 'Consult',
    'process_consult_desc' => 'Understand your needs and goals.',
    'process_design_title' => 'Design',
    'process_design_desc' => 'Create a tailored VoIP solution.',
    'process_implement_title' => 'Implement',
    'process_implement_desc' => 'Deploy and integrate your system.',
    'process_support_title' => 'Support',
    'process_support_desc' => 'Provide ongoing 24/7 assistance.',
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
if (file_exists($lang_file)) {
    $lang_content = @file_get_contents($lang_file);
    if ($lang_content !== false) {
        $decoded_lang = json_decode($lang_content, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $lang = $decoded_lang;
        } else {
            error_log("JSON decode error for $lang_file: " . json_last_error_msg());
        }
    } else {
        error_log("Failed to read language file: $lang_file");
    }
} else {
    error_log("Language file not found: $lang_file");
}
$lang = array_merge($default_lang, $lang);
$direction = $_SESSION['lang'] === 'ar' ? 'rtl' : 'ltr';
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>" dir="<?php echo $direction; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $lang['meta_description']; ?>">
  <meta name="author" content="VoIP Savvy">
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdn.tailwindcss.com https://unpkg.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;">
  <title><?php echo $lang['page_title']; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Noto+Sans+Arabic:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: <?php echo $_SESSION['lang'] === 'ar' ? "'Noto Sans Arabic', sans-serif" : "'Poppins', sans-serif"; ?>; background: #f8fafc; scroll-behavior: smooth; }
    body.rtl { direction: rtl; text-align: right; }
    header.sticky { backdrop-filter: blur(15px) saturate(180%); background: rgba(255, 255, 255, 0.9); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); transition: all 0.4s ease; }
    .btn-hover { transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease; }
    .btn-hover:hover, .btn-hover:focus { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); outline: 2px solid #1e40af; }
    .card-hover { transition: transform 0.4s ease, box-shadow 0.4s ease; border-radius: 1rem; }
    .card-hover:hover, .card-hover:focus { transform: translateY(-12px); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); outline: 2px solid #1e40af; }
    .hero-bg { background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/callcenter1.png'); background-size: cover; background-position: center; background-attachment: fixed; }
    .gradient-text { background: linear-gradient(90deg, #1e40af, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: #f1f5f9; }
    ::-webkit-scrollbar-thumb { background: linear-gradient(#1e40af, #3b82f6); border-radius: 5px; }
    .section-bg { background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); }
    @media (max-width: 768px) { .hero-bg { background-attachment: scroll; } .text-7xl { font-size: 3rem; } .text-5xl { font-size: 2.5rem; } .text-xl { font-size: 1.125rem; } }
    a:focus, button:focus, input:focus, select:focus, textarea:focus { outline: 3px solid #1e40af; outline-offset: 2px; }
    .language-select { appearance: none; background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>') no-repeat right 0.5rem center/1rem 1rem; }
    .rtl .language-select { background-position: left 0.5rem center; }
    .rtl .flex { flex-direction: row-reverse; }
    .rtl .grid { direction: rtl; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans <?php echo $direction === 'rtl' ? 'rtl' : ''; ?>">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-blue-600 focus:text-white focus:p-2"><?php echo $lang['skip_to_content']; ?></a>
  <div class="bg-blue-600 text-white text-sm py-2 px-4 sm:px-6 flex justify-between items-center">
    <div class="flex space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?>">
      <a href="tel:+966572434266" class="hover:underline" aria-label="<?php echo $lang['call_phone']; ?>"><?php echo $lang['top_bar_phone']; ?></a>
      <a href="mailto:hello@voipsavvy.com" class="hover:underline" aria-label="<?php echo $lang['email_contact']; ?>"><?php echo $lang['top_bar_email']; ?></a>
    </div>
    <form id="lang-form" method="POST">
      <select name="lang" class="language-select bg-transparent border-none text-white focus:outline-none" aria-label="<?php echo $lang['select_language']; ?>" onchange="this.form.submit()">
        <option value="en" <?php echo $_SESSION['lang'] === 'en' ? 'selected' : ''; ?>><?php echo $lang['lang_en']; ?></option>
        <option value="ar" <?php echo $_SESSION['lang'] === 'ar' ? 'selected' : ''; ?>><?php echo $lang['lang_ar']; ?></option>
        <option value="fr" <?php echo $_SESSION['lang'] === 'fr' ? 'selected' : ''; ?>><?php echo $lang['lang_fr']; ?></option>
      </select>
    </form>
  </div>
  <header id="header" class="fixed w-full top-0 z-50 bg-white p-4 flex justify-between items-center mt-10">
    <div class="text-3xl font-bold text-blue-600 animate__animated animate__fadeIn">
      <a href="index.php" aria-label="<?php echo $lang['home_logo']; ?>">VoIP Savvy</a>
    </div>
    <nav class="hidden md:flex space-x-8 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?>" aria-label="<?php echo $lang['main_nav']; ?>">
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_home']; ?></a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_solutions']; ?></a>
      <a href="saas.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_saas']; ?></a>
      <a href="professional-services.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_professional_services']; ?></a>
      <a href="resources.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_resources']; ?></a>
      <a href="company.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_company']; ?></a>
      <a href="partner-program.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_partner_program']; ?></a>
      <a href="faq.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_faq']; ?></a>
    </nav>
    <button class="md:hidden text-blue-600" aria-label="<?php echo $lang['toggle_menu']; ?>" aria-expanded="false" id="menu-toggle">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </header>
  <div id="mobile-menu" class="hidden md:hidden bg-white w-full p-4 absolute top-24 z-40 shadow-lg">
    <nav class="flex flex-col space-y-4" aria-label="<?php echo $lang['mobile_nav']; ?>">
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_home']; ?></a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_solutions']; ?></a>
      <a href="saas.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_saas']; ?></a>
      <a href="professional-services.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_professional_services']; ?></a>
      <a href="resources.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_resources']; ?></a>
      <a href="company.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_company']; ?></a>
      <a href="partner-program.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_partner_program']; ?></a>
      <a href="faq.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_faq']; ?></a>
    </nav>
  </div>
  <main id="main-content">
    <section class="pt-24 pb-20 hero-bg text-center text-white" role="region" aria-labelledby="hero-heading">
      <div class="py-24 px-4 sm:px-6 lg:px-8">
        <h1 id="hero-heading" class="text-5xl md:text-7xl font-bold gradient-text animate__animated animate__fadeInDown"><?php echo $lang['hero_title']; ?></h1>
        <p class="mt-4 text-xl animate__animated animate__fadeInUp"><?php echo $lang['hero_subtitle']; ?></p>
        <div class="mt-8 flex justify-center animate__animated animate__fadeInUp animate__delay-1s">
          <a href="contact.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $lang['hero_cta']; ?></a>
        </div>
      </div>
    </section>
    <section class="py-20 px-4 sm:px-6 bg-white section-bg" role="region" aria-labelledby="services-heading">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 id="services-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['services_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['services_subtitle']; ?></p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
          <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="100" tabindex="0">
            <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['service_asterisk_title']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['service_asterisk_desc']; ?></p>
          </div>
          <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="200" tabindex="0">
            <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/></svg>
            <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['service_custom_dev_title']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['service_custom_dev_desc']; ?></p>
          </div>
          <div class="bg-white shadow-lg rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="300" tabindex="0">
            <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['service_integration_title']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['service_integration_desc']; ?></p>
          </div>
        </div>
      </div>
    </section>
    <section class="py-20 px-4 sm:px-6 bg-blue-50 section-bg" role="region" aria-labelledby="process-heading">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 id="process-heading" class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['process_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['process_subtitle']; ?></p>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 text-left">
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="100">
            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['process_consult_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['process_consult_desc']; ?></p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="200">
            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.414H9v-2.828l8.586-8.586z"/></svg>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['process_design_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['process_design_desc']; ?></p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="300">
            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['process_implement_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['process_implement_desc']; ?></p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="400">
            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['process_support_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['process_support_desc']; ?></p>
            </div>
          </div>
        </div>
        <div class="mt-12">
          <a href="contact.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $lang['hero_cta']; ?></a>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-blue-100 py-8 text-center text-gray-500 text-sm section-bg" role="contentinfo">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-6">
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_solutions']; ?></h4>
          <ul class="space-y-2">
            <li><a href="solutions.php#ip-pbx" class="hover:text-blue-500"><?php echo $lang['footer_ip_pbx']; ?></a></li>
            <li><a href="solutions.php#contact-center" class="hover:text-blue-500"><?php echo $lang['footer_contact_center']; ?></a></li>
            <li><a href="solutions.php#ai-bots" class="hover:text-blue-500"><?php echo $lang['footer_ai_bots']; ?></a></li>
            <li><a href="solutions.php#crm" class="hover:text-blue-500"><?php echo $lang['footer_crm']; ?></a></li>
            <li><a href="solutions.php#ivr" class="hover:text-blue-500"><?php echo $lang['footer_ivr']; ?></a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_saas']; ?></h4>
          <ul class="space-y-2">
            <li><a href="saas.php#cloud-telephony" class="hover:text-blue-500"><?php echo $lang['footer_cloud_telephony'] ?? 'Cloud Telephony'; ?></a></li>
            <li><a href="saas.php#ccaas" class="hover:text-blue-500"><?php echo $lang['footer_ccaas'] ?? 'Contact Center as a Service'; ?></a></li>
            <li><a href="saas.php#crm" class="hover:text-blue-500"><?php echo $lang['footer_crm']; ?></a></li>
            <li><a href="saas.php#hosted-ivr" class="hover:text-blue-500"><?php echo $lang['footer_ivr']; ?></a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_company']; ?></h4>
          <ul class="space-y-2">
            <li><a href="company.php#about" class="hover:text-blue-500"><?php echo $lang['footer_about']; ?></a></li>
            <li><a href="company.php#blog" class="hover:text-blue-500"><?php echo $lang['footer_blog']; ?></a></li>
            <li><a href="company.php#careers" class="hover:text-blue-500"><?php echo $lang['footer_careers']; ?></a></li>
            <li><a href="company.php#partner-program" class="hover:text-blue-500"><?php echo $lang['nav_partner_program']; ?></a></li>
            <li><a href="contact.php" class="hover:text-blue-500"><?php echo $lang['footer_contact']; ?></a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_connect']; ?></h4>
          <ul class="space-y-2">
            <li><a href="https://www.facebook.com/voipsavvy/" class="hover:text-blue-500"><?php echo $lang['footer_facebook']; ?></a></li>
            <li><a href="https://www.instagram.com/voipsavvy/" class="hover:text-blue-500"><?php echo $lang['footer_instagram']; ?></a></li>
            <li><a href="https://x.com/SavvyVoip" class="hover:text-blue-500"><?php echo $lang['footer_x']; ?></a></li>
            <li><a href="https://www.linkedin.com/company/voip-savvy" class="hover:text-blue-500"><?php echo $lang['footer_linkedin']; ?></a></li>
            <li><a href="https://www.youtube.com/channel/UC5ohzJr4g5JId-xIFoVZhMg" class="hover:text-blue-500"><?php echo $lang['footer_youtube']; ?></a></li>
          </ul>
        </div>
      </div>
      <div class="flex justify-center space-x-4 <?php echo $direction === 'rtl' ? 'space-x-reverse' : ''; ?> mb-4">
        <a href="privacy-policy.php" class="hover:text-blue-500"><?php echo $lang['footer_privacy']; ?></a>
        <a href="terms-of-use.php" class="hover:text-blue-500"><?php echo $lang['footer_terms']; ?></a>
      </div>
      <p><?php echo $lang['footer_copyright']; ?></p>
    </div>
  </footer>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
  <script>
    AOS.init({ duration: 1000, once: true, easing: 'ease-out' });
    window.addEventListener('scroll', () => {
      const header = document.getElementById('header');
      header.classList.toggle('sticky', window.scrollY > 10);
    });
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
    });
    document.querySelectorAll('.card-hover').forEach(card => {
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') card.focus();
      });
    });
  </script>
  <style>
    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0; }
    .focus\:not-sr-only:focus { position: static; width: auto; height: auto; padding: 0.5rem; margin: 0; overflow: visible; clip: auto; }
  </style>
</body>
</html>