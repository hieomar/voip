<?php
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
$default_lang = [
    "meta_description" => "Learn about VoIP Savvy, our mission, and our team.",
    "page_title" => "Company | VoIP Savvy",
    "skip_to_content" => "Skip to main content",
    "call_phone" => "Call +966 572 434 266",
    "email_contact" => "Email hello@voipsavvy.com",
    "select_language" => "Select language",
    "lang_en" => "English",
    "lang_ar" => "Arabic",
    "lang_fr" => "French",
    "home_logo" => "VoIP Savvy Home",
    "main_nav" => "Main navigation",
    "toggle_menu" => "Toggle mobile menu",
    "mobile_nav" => "Mobile navigation",
    "top_bar_phone" => "+966 572 434 266",
    "top_bar_email" => "hello@voipsavvy.com",
    "nav_home" => "Home",
    "nav_solutions" => "Solutions",
    "nav_saas" => "SaaS",
    "nav_professional_services" => "Professional Services",
    "nav_resources" => "Resources",
    "nav_company" => "Company",
    "nav_partner_program" => "Partner Program",
    "nav_faq" => "FAQ",
    "hero_title" => "About VoIP Savvy",
    "hero_subtitle" => "We’re revolutionizing business communication with innovative VoIP solutions.",
    "hero_cta" => "Meet Our Team",
    "company_title" => "Our Story",
    "company_subtitle" => "Discover our mission and values.",
    "company_mission_title" => "Our Mission",
    "company_mission_desc" => "Empower businesses with reliable, AI-driven communication tools.",
    "company_team_title" => "Our Team",
    "company_team_desc" => "Meet the experts behind VoIP Savvy.",
    "company_careers_title" => "Careers",
    "company_careers_desc" => "Join our team and shape the future of VoIP.",
    "footer_solutions" => "Solutions",
    "footer_saas" => "SaaS",
65  "footer_company" => "Company",
    "footer_connect" => "Connect",
    "footer_privacy" => "Privacy Policy",
    "footer_terms" => "Terms of Use",
    "footer_copyright" => "© 2025 VoIP Savvy. All rights reserved.",
    "footer_ip_pbx" => "IP PBX",
    "footer_contact_center" => "Contact Center",
    "footer_ai_bots" => "AI Voice & Chat Bots",
    "footer_crm" => "Sales & Service CRM",
    "footer_ivr" => "Interactive Voice Response",
    "footer_cloud_telephony" => "Cloud Telephony",
    "footer_ccaas" => "Contact Center as a Service",
    "footer_about" => "About VoIP Savvy",
    "footer_blog" => "Blog & Insights",
    "footer_careers" => "Careers",
    "footer_contact" => "Contact Us",
    "footer_facebook" => "Facebook",
    "footer_instagram" => "Instagram",
    "footer_x" => "X",
    "footer_linkedin" => "LinkedIn",
    "footer_youtube" => "YouTube"
];
$lang = [];
if (file_exists($lang_file)) {
    $lang_content = @file_get_contents($lang_file);
    if ($lang_content !== false) {
        $decoded_lang = json_decode($lang_content, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $lang = $decoded_lang;
        }
    }
}
$lang = array_merge($default_lang, $lang);
$direction = $_SESSION['lang'] === 'ar' ? 'rtl' : 'ltr';
?>