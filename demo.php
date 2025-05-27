<?php
session_start();

// Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Initialize variables
$errors = [];
$success = '';
$name = $email = $company = $phone = $solution = $preferred_time = $message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = 'Invalid CSRF token.';
    } else {
        // Sanitize and validate inputs
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $solution = filter_input(INPUT_POST, 'solution', FILTER_SANITIZE_STRING);
        $preferred_time = filter_input(INPUT_POST, 'preferred_time', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Validate required fields
        if (empty($name)) {
            $errors[] = 'Full name is required.';
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'A valid email address is required.';
        }

        // If no errors, process the form
        if (empty($errors)) {
            // Prepare email
            $to = 'hello@voipsavvy.com'; // Replace with your email
            $subject = 'New Demo Request from VoIP Savvy';
            $body = "Name: $name\n";
            $body .= "Email: $email\n";
            $body .= "Company: $company\n";
            $body .= "Phone: $phone\n";
            $body .= "Solution of Interest: $solution\n";
            $body .= "Preferred Demo Time: $preferred_time\n";
            $body .= "Message: $message\n";
            $headers = "From: no-reply@voipsavvy.com\r\n";
            $headers .= "Reply-To: $email\r\n";

            // Send email
            if (mail($to, $subject, $body, $headers)) {
                $success = 'Thank you! Your demo request has been submitted successfully. We’ll contact you soon.';
                // Reset form fields
                $name = $email = $company = $phone = $solution = $preferred_time = $message = '';
                // Regenerate CSRF token
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                $errors[] = 'Failed to send your request. Please try again later.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Request a personalized demo of VoIP Savvy’s AI-powered VoIP and communication solutions.">
  <meta name="author" content="VoIP Savvy">
  <title>Request a Demo | VoIP Savvy</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Animate.css for animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- AOS for scroll animations -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Google Fonts: Poppins for a modern, elegant look -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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
    /* Hero section with callcenter2.png background */
    .hero-bg {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('callcenter2.png');
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
      <a href="index.php" aria-label="VoIP Savvy Home">VoIP Savvy</a>
    </div>
    <nav class="hidden md:flex space-x-8" aria-label="Main navigation">
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Home</a>
      <a href="about.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">About</a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Solutions</a>
      <a href="blog.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Blog</a>
      <a href="contact.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Contact</a>
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
      <a href="index.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Home</a>
      <a href="about.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">About</a>
      <a href="solutions.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Solutions</a>
      <a href="blog.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Blog</a>
      <a href="contact.php" class="text-gray-600 hover:text-blue-500 transition font-semibold">Contact</a>
    </nav>
  </div>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Hero Section -->
    <section class="pt-24 pb-20 hero-bg text-center text-white">
      <div class="py-24 px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl md:text-7xl font-bold gradient-text animate__animated animate__fadeInDown">Experience VoIP Savvy in Action</h1>
        <p class="mt-4 text-xl animate__animated animate__fadeInUp">Schedule a personalized demo to see how our AI-powered VoIP solutions can transform your business communication.</p>
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__delay-1s">
          <a href="#demo-form" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full shadow-lg btn-hover">Request Your Demo</a>
          <a href="contact.php" class="border border-white hover:bg-blue-600 hover:border-blue-600 text-white px-8 py-4 rounded-full btn-hover">Contact Us</a>
        </div>
      </div>
    </section>

    <!-- Demo Overview Section -->
    <section class="py-20 px-4 sm:px-6 bg-white section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6">What to Expect in Your Demo</h2>
        <p class="text-gray-600 text-lg mb-8">Our personalized demo will showcase how VoIP Savvy’s solutions can meet your business needs, with a focus on flexibility, scalability, and AI-driven efficiency.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="100">
            <span class="text-blue-500 text-3xl" aria-hidden="true">🚀</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700">Live Product Walkthrough</h3>
              <p class="text-gray-600">Explore features like AI chatbots, IP PBX, and contact center solutions in real-time.</p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="200">
            <span class="text-blue-500 text-3xl" aria-hidden="true">🔍</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700">Tailored to Your Needs</h3>
              <p class="text-gray-600">We’ll customize the demo to address your specific business challenges and goals.</p>
            </div>
          </div>
          <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="300">
            <span class="text-blue-500 text-3xl" aria-hidden="true">💬</span>
            <div>
              <h3 class="text-xl font-semibold text-gray-700">Q&A with Experts</h3>
              <p class="text-gray-600">Ask our team anything about setup, integrations, or pricing during the session.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Demo Request Form Section -->
    <section id="demo-form" class="py-20 px-4 sm:px-6 bg-blue-50 section-bg">
      <div class="max-w-3xl mx-auto" data-aos="fade-up">
        <h2 class="text-4xl font-bold text-center gradient-text mb-6">Request Your Demo</h2>
        <p class="text-gray-600 text-lg text-center mb-8">Fill out the form below, and we’ll schedule a demo at a time that works for you.</p>
        <?php if (!empty($errors)): ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <ul>
              <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <?php if ($success): ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <?php echo htmlspecialchars($success); ?>
          </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="grid grid-cols-1 gap-6">
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-600" aria-hidden="true">*</span></label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required aria-required="true" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500" aria-describedby="name-error">
            <p id="name-error" class="error hidden">Please enter your full name.</p>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-600" aria-hidden="true">*</span></label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required aria-required="true" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500" aria-describedby="email-error">
            <p id="email-error" class="error hidden">Please enter a valid email address.</p>
          </div>
          <div>
            <label for="company" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($company); ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label for="solution" class="block text-sm font-medium text-gray-700">Solution of Interest</label>
            <select id="solution" name="solution" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500">
              <option value="" <?php echo $solution === '' ? 'selected' : ''; ?>>Select a solution</option>
              <option value="ip-pbx" <?php echo $solution === 'ip-pbx' ? 'selected' : ''; ?>>IP PBX System</option>
              <option value="ai-bots" <?php echo $solution === 'ai-bots' ? 'selected' : ''; ?>>AI Voice & Chat Bots</option>
              <option value="contact-center" <?php echo $solution === 'contact-center' ? 'selected' : ''; ?>>Contact Center Solution</option>
              <option value="crm" <?php echo $solution === 'crm' ? 'selected' : ''; ?>>Sales & Service CRM</option>
              <option value="ivr" <?php echo $solution === 'ivr' ? 'selected' : ''; ?>>Interactive Voice Response</option>
              <option value="voice-logger" <?php echo $solution === 'voice-logger' ? 'selected' : ''; ?>>Voice Logger</option>
              <option value="voice-broadcasting" <?php echo $solution === 'voice-broadcasting' ? 'selected' : ''; ?>>Voice Broadcasting Tool</option>
              <option value="conferencing" <?php echo $solution === 'conferencing' ? 'selected' : ''; ?>>Audio Conferencing Suite</option>
            </select>
          </div>
          <div>
            <label for="preferred-time" class="block text-sm font-medium text-gray-700">Preferred Demo Time</label>
            <input type="datetime-local" id="preferred-time" name="preferred_time" value="<?php echo htmlspecialchars($preferred_time); ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Additional Details</label>
            <textarea id="message" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500" aria-describedby="message-help"><?php echo htmlspecialchars($message); ?></textarea>
            <p id="message-help" class="text-sm text-gray-500 mt-1">Tell us about your business needs or specific questions.</p>
          </div>
          <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full shadow-lg btn-hover">Submit Request</button>
          </div>
        </form>
      </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-20 px-4 sm:px-6 bg-white section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6">Get in Touch</h2>
        <p class="text-gray-600 text-lg mb-8">Have questions or need assistance? Reach out to us directly.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          <div class="text-left" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Contact Details</h3>
            <ul class="space-y-3 text-gray-600">
              <li>
                <strong>Phone:</strong><br>
                <a href="tel:+966534865063" class="hover:text-blue-500 transition" aria-label="Call +966 534 865 063">+966 534 865 063</a><br>
                <a href="tel:+966572434266" class="hover:text-blue-500 transition" aria-label="Call +966 572 434 266">+966 572 434 266</a><br>
                <a href="tel:+919562562433" class="hover:text-blue-500 transition" aria-label="Call +91 9562 562 433">+91 9562 562 433</a>
              </li>
              <li>
                <strong>Email:</strong><br>
                <a href="mailto:hello@vconn.com" class="hover:text-blue-500 transition" aria-label="Email hello@vconn.com">hello@vconn.com</a><br>
                <a href="mailto:hello@voipsavvy.com" class="hover:text-blue-500 transition" aria-label="Email hello@voipsavvy.com">hello@voipsavvy.com</a>
              </li>
              <li>
                <strong>Address:</strong><br>
                Riyadh, Saudi Arabia
              </li>
            </ul>
          </div>
          <div class="text-left" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Connect With Us</h3>
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

    <!-- Testimonials Section -->
    <section class="py-20 px-4 sm:px-6 bg-white section-bg">
      <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold gradient-text mb-6">What Our Clients Say</h2>
        <p class="text-gray-600 text-lg mb-8">Hear from businesses who experienced VoIP Savvy’s solutions firsthand.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="100" tabindex="0">
            <p class="text-gray-600 mb-4">“The demo showed us how AI bots could save 80% of our support time. We were up and running in days!”</p>
            <h3 class="text-lg font-semibold text-blue-600">Sarah M., Tech Startup</h3>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="200" tabindex="0">
            <p class="text-gray-600 mb-4">“VoIP Savvy’s contact center solution transformed our customer experience. The demo was tailored perfectly.”</p>
            <h3 class="text-lg font-semibold text-blue-600">Ahmed K., Retail Chain</h3>
          </div>
          <div class="bg-white shadow-lg rounded-lg p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="300" tabindex="0">
            <p class="text-gray-600 mb-4">“The team answered all our questions during the demo, making it easy to choose VoIP Savvy.”</p>
            <h3 class="text-lg font-semibold text-blue-600">Priya S., Healthcare Provider</h3>
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
          <h4 class="text-lg font-semibold text-blue-700 mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="index.php" class="hover:text-blue-500">Home</a></li>
            <li><a href="about.php" class="hover:text-blue-500">About</a></li>
            <li><a href="blog.php" class="hover:text-blue-500">Blogs</a></li>
            <li><a href="contact.php" class="hover:text-blue-500">Contact Us</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4">Services</h4>
          <ul class="space-y-2">
            <li><a href="solutions.php#cloud" class="hover:text-blue-500">Cloud</a></li>
            <li><a href="careers.php" class="hover:text-blue-500">Careers</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-blue-700 mb-4">Resources</h4>
          <ul class="space-y-2">
            <li><a href="blog.php#hosted-ivr" class="hover:text-blue-500">What is Hosted IVR?</a></li>
            <li><a href="blog.php#contact-center" class="hover:text-blue-500">What is Contact Center Solution?</a></li>
            <li><a href="blog.php#asterisk" class="hover:text-blue-500">What is Asterisk Consultancy?</a></li>
            <li><a href="blog.php#voice-broadcasting" class="hover:text-blue-500">What is Voice Broadcasting?</a></li>
            <li><a href="blog.php#chatbots" class="hover:text-blue-500">What is Conversational AI Chatbots?</a></li>
          </ul>
        </div>
      </div>
      <p>© 2025 VoIP Savvy. All rights reserved.</p>
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

    // Client-side form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
      let isValid = true;
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const nameError = document.getElementById('name-error');
      const emailError = document.getElementById('email-error');

      if (!name.value.trim()) {
        nameError.classList.remove('hidden');
        isValid = false;
      } else {
        nameError.classList.add('hidden');
      }

      if (!email.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        emailError.classList.remove('hidden');
        isValid = false;
      } else {
        emailError.classList.add('hidden');
      }

      if (!isValid) {
        e.preventDefault();
      }
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