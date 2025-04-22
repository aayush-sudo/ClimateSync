<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClimateSync</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="homepage.css">
  <script src="homepage.js" defer></script>
</head>
<body>
  <header class="d-flex justify-content-between align-items-center p-3">
    <h1>ClimateSync</h1>
    <nav>
      <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Features
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item feature-link" href="../LiveClimateDataAQI/aqicheck.html">AQI Check</a></li>
            <li><a class="dropdown-item feature-link" href="../Awareness/Awareness.html">Awareness</a></li>
            <li><a class="dropdown-item feature-link" href="../SustainablePractices/sustainable.php">Sustainable Practices</a></li>
            <li><a class="dropdown-item feature-link" href="../CommunityEngagementForm/community.html">Survey</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link button" href="../contact/contact.php">Contact</a>
        </li>

        <?php if ($is_logged_in): ?>
          <li class="nav-item">
            <span class="nav-link text-white">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
          </li>
          <?php if ($is_admin): ?>
            <li class="nav-item">
              <a class="nav-link button btn-warning" href="../Modify/modify.php">Modify</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link button" href="../LoginPage/logout.php">Log Out</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link button" href="../LoginPage/login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link button" href="../SignupPage/signup.php">Sign Up</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
  
  <section class="main-section">
    <div class="intro-content text-center">
      <h2>Building a Sustainable Future</h2>
      <p>Join us in the journey towards climate resilience and sustainability through AI-powered urban planning.</p>
    </div>
  </section>
  
  <section id="about" class="p-4">
    <h2>About ClimateSync</h2>
    <p>ClimateSync is dedicated to integrating AI-driven solutions into urban planning, focusing on renewable energy, resilient infrastructure, and green city initiatives.</p>
  </section>
  
  <section id="features" class="p-4">
    <h2>Key Features</h2>
    <ul class="list-unstyled">
      <li>AQI Check for cities</li>
      <li>Sustainable solutions for cities</li>
      <li>Awareness about sustainable development and survey</li>
    </ul>
  </section>

  <section id="contact" class="p-4">
    <h2>Contact Us</h2>
    <p>Get in touch to learn more about how you can contribute to sustainable urban development.</p>
  </section>

  <footer class="text-center p-4">
    <p>&copy; 2025 ClimateSync. Mini project.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const featureLinks = document.querySelectorAll(".feature-link");
      featureLinks.forEach(link => {
        link.addEventListener("click", function (event) {
          <?php if (!$is_logged_in): ?>
            event.preventDefault();
            window.location.href = "../LoginPage/login.php";
          <?php endif; ?>
        });
      });
    });
  </script>
</body>
</html>
