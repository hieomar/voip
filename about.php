<?php
session_start();

// Generate CSRF token if not set (for potential future forms)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Include language file
include 'lang.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>" dir="<?php echo $direction; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $lang['meta_description']; ?>">
  <title><?php echo $lang['page_title']; ?></title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Animate.css for animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- AOS for scroll animations -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Google Fonts: Poppins for a modern, elegant look -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Custom styles -->
  <link rel="stylesheet" href="styles.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8fafc;
      scroll-behavior: smooth;
    }
    /* Sticky header with glassmorphism */
    header.sticky {
      backdrop-filter: blur(15px) saturate(180%);
      background: rgba(255, 255, 255, 0.9);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
    }
    /* Button hover and focus effects */
    .btn-hover {
      transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-hover:hover, .btn-hover:focus {
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      outline: 2px solid #1e40af;
    }
    /* Card hover and focus effects */
    .card-hover {
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .card-hover:hover, .card-hover:focus {
      transform: translateY(-12px) rotate(1deg);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      outline: 2px solid #1e40af;
    }
    /* Hero section with gradient background */
    .hero-bg {
      background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    /* Gradient text for headings */
    .gradient-text {
      background: linear-gradient(90deg, #1e40af, #3b82f6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(#1e40af, #3b82f6);
      border-radius: 5px;
    }
    /* Subtle background pattern for sections */
    .section-bg {
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero-bg {
        background-attachment: scroll; /* Prevent fixed background on mobile for performance */
      }
      .text-7xl {
        font-size: 3rem; /* Smaller heading on mobile */
      }
      .text-5xl {
        font-size: 2.5rem;
      }
      .text-xl {
        font-size: 1.125rem;
      }
    }
    /* High contrast for accessibility */
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
      outline: 3px solid #1e40af;
      outline-offset: 2px;
    }
    /* Ensure images are responsive */
    img {
      max-width: 100%;
      height: auto;
    }
    /* Form error and success styling */
    .error, .success {
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }
    .error { color: #dc2626; }
    .success { color: #059669; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- Skip to content link for accessibility -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-blue-600 focus:text-white focus:p-2">Skip to main content</a>

  <!-- Header -->
  <header id="header" class="fixed w-full top-0 z-50 bg-white p-4 flex justify-between items-center">
    <div class="text-3xl font-bold text-blue-600 animate__animated animate__fadeIn">
      <a href="index.php" aria-label="VoIP Savvy Home"><?php echo $lang['site_name']; ?></a>
    </div>
    <nav class="hidden md:flex space-x-8" aria-label="Main navigation">
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_home']; ?></a>
      <a href="about.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_about']; ?></a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_solutions']; ?></a>
      <a href="blog.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_blog']; ?></a>
      <a href="contact.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_contact']; ?></a>
    </nav>
    <button class="md:hidden text-blue-600" aria-label="Toggle mobile menu" aria-expanded="false" id="menu-toggle">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </header>

  <!-- Mobile Menu (Hidden by default) -->
  <div id="mobile-menu" class="hidden md:hidden bg-white w-full p-4 absolute top-16 z-40 shadow-lg">
    <nav class="flex flex-col space-y-4" aria-label="Mobile navigation">
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_home']; ?></a>
      <a href="about.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_about']; ?></a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_solutions']; ?></a>
      <a href="blog.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_blog']; ?></a>
      <a href="contact.php" class="text-gray-600 hover:text-blue-500 transition font-semibold"><?php echo $lang['nav_contact']; ?></a>
    </nav>
  </div>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Hero Section -->
    <section class="pt-24 pb-20 hero-bg text-center text-white">
      <div class="py-24 px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl md:text-7xl font-bold gradient-text animate__animated animate__fadeInDown"><?php echo $lang['hero_title']; ?></h1>
        <p class="mt-4 text-xl animate__animated animate__fadeInUp"><?php echo $lang['hero_subtitle']; ?></p>
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__delay-1s">
          <a href="demo.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full shadow-lg btn-hover"><?php echo $lang['hero_cta_demo']; ?></a>
          <a href="contact.php" class="border border-white hover:bg-blue-600 hover:border-blue-600 text-white px-8 py-4 rounded-full btn-hover"><?php echo $lang['hero_cta_contact']; ?></a>
        </div>
      </div>
    </section>

    <!-- Mission Section -->
    <section class="py-20 px-4 sm:px-6 bg-white section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['mission_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['mission_description']; ?></p>
        <div class="flex justify-center">
          <a href="demo.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full btn-hover"><?php echo $lang['mission_cta']; ?></a>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 px-4 sm:px-6 bg-blue-50 section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['team_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['team_description']; ?></p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="100" tabindex="0">
            <h3 class="text-lg font-semibold text-blue-600"><?php echo $lang['team_member_1_name']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['team_member_1_role']; ?></p>
            <p class="text-gray-600 text-sm mt-2"><?php echo $lang['team_member_1_bio']; ?></p>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="200" tabindex="0">
            <h3 class="text-lg font-semibold text-blue-600"><?php echo $lang['team_member_2_name']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['team_member_2_role']; ?></p>
            <p class="text-gray-600 text-sm mt-2"><?php echo $lang['team_member_2_bio']; ?></p>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="300" tabindex="0">
            <h3 class="text-lg font-semibold text-blue-600"><?php echo $lang['team_member_3_name']; ?></h3>
            <p class="text-gray-600"><?php echo $lang['team_member_3_role']; ?></p>
            <p class="text-gray-600 text-sm mt-2"><?php echo $lang['team_member_3_bio']; ?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 px-4 sm:px-6 bg-white section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['values_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['values_description']; ?></p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="100">
            <span class="text-blue-500 text-3xl" aria-hidden="true">💡</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['value_1_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['value_1_description']; ?></p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="200">
            <span class="text-blue-500 text-3xl" aria-hidden="true">🤝</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['value_2_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['value_2_description']; ?></p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="300">
            <span class="text-blue-500 text-3xl" aria-hidden="true">🌐</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700"><?php echo $lang['value_3_title']; ?></h3>
              <p class="text-gray-600"><?php echo $lang['value_3_description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-20 px-4 sm:px-6 bg-blue-50 section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6"><?php echo $lang['contact_title']; ?></h2>
        <p class="text-gray-600 text-lg mb-8"><?php echo $lang['contact_description']; ?></p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          <div class="text-left" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $lang['contact_details_title']; ?></h3>
            <ul class="space-y-3 text-gray-600">
              <li>
                <strong><?php echo $lang['contact_phone_label']; ?></strong><br>
                <a href="tel:+966534865063" class="hover:text-blue-500 transition" aria-label="Call +966 534 865 063">+966 534 865 063</a><br>
                <a href="tel:+966572434266" class="hover:text-blue-500 transition" aria-label="Call +966 572 434 266">+966 572 434 266</a><br>
                <a href="tel:+919562562433" class="hover:text-blue-500 transition" aria-label="Call +91 9562 562 433">+91 9562 562 433</a>
              </li>
              <li>
                <strong><?php echo $lang['contact_email_label']; ?></strong><br>
                <a href="mailto:hello@vconn.com" class="hover:text-blue-500 transition" aria-label="Email hello@vconn.com">hello@vconn.com</a><br>
                <a href="mailto:hello@voipsavvy.com" class="hover:text-blue-500 transition" aria-label="Email hello@voipsavvy.com">hello@voipsavvy.com</a>
              </li>
              <li>
                <strong><?php echo $lang['contact_address_label']; ?></strong><br>
                Riyadh, Saudi Arabia
              </li>
            </ul>
          </div>
          <div class="text-left" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $lang['connect_title']; ?></h3>
            <ul class="space-y-3 text-gray-600">
              <li>
                <a href="https://linkedin.com" class="hover:text-blue-500 transition flex items-center" aria-label="Visit our LinkedIn page">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-1.337-.03-3.06-1.867-3.06-1.867 0-2.153 1.459-2.153 2.967v5.697h-3v-11h2.879v1.509h.04c.401-.757 1.379-1.557 2.834-1.557 3.03 0 3.587 1.996 3.587 4.592v6.456z"/>
                  </svg>
                  LinkedIn
                </a>
              </li>
              <li>
                <a href="https://twitter.com" class="hover:text-blue-500 transition flex items-center" aria-label="Visit our Twitter page">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                  </svg>
                  Twitter
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-100 py-8 text-center text-gray-500 text-sm section-bg">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_quick_links_title']; ?></h4>
          <ul class="space-y-2">
            <li><a href="index.php" class="hover:text-blue-500"><?php echo $lang['footer_quick_links_home']; ?></a></li>
            <li><a href="about.php" class="hover:text-blue-500"><?php echo $lang['footer_quick_links_about']; ?></a></li>
            <li><a href="blog.php" class="hover:text-blue-500"><?php echo $lang['footer_quick_links_blog']; ?></a></li>
            <li><a href="contact.php" class="hover:text-blue-500"><?php echo $lang['footer_quick_links_contact']; ?></a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_services_title']; ?></h4>
          <ul class="space-y-2">
            <li><a href="solutions.php#cloud" class="hover:text-blue-500"><?php echo $lang['footer_services_cloud']; ?></a></li>
            <li><a href="careers.php" class="hover:text-blue-500"><?php echo $lang['footer_services_careers']; ?></a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4"><?php echo $lang['footer_resources_title']; ?></h4>
          <ul class="space-y-2">
            <li><a href="blog.php#hosted-ivr" class="hover:text-blue-500"><?php echo $lang['footer_resources_hosted_ivr']; ?></a></li>
            <li><a href="blog.php#contact-center" class="hover:text-blue-500"><?php echo $lang['footer_resources_contact_center']; ?></a></li>
            <li><a href="blog.php#asterisk" class="hover:text-blue-500"><?php echo $lang['footer_resources_asterisk']; ?></a></li>
            <li><a href="blog.php#voice-broadcasting" class="hover:text-blue-500"><?php echo $lang['footer_resources_voice_broadcasting']; ?></a></li>
            <li><a href="blog.php#chatbots" class="hover:text-blue-500"><?php echo $lang['footer_resources_chatbots']; ?></a></li>
          </ul>
        </div>
      </div>
      <p>© 2025 VoIP Savvy. <?php echo $lang['footer_copyright']; ?></p>
    </div>
  </footer>

  <!-- AOS Animation Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true,
      easing: 'ease-out'
    });

    // Sticky header on scroll
    window.addEventListener('scroll', function () {
      const header = document.getElementById('header');
      header.classList.toggle('sticky', window.scrollY > 10);
    });

    // Mobile menu toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
    });

    // Ensure cards are keyboard accessible
    document.querySelectorAll('.card-hover').forEach(card => {
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          card.focus();
        }
      });
    });
  </script>

  <!-- Screen reader only styles -->
  <style>
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
  </style>
</body>
</html>