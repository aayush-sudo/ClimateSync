<?php
session_start();

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "ClimateSync";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            $error = "Database connection failed: " . $conn->connect_error;
        } else {
            $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $success = "Thank you, " . htmlspecialchars($name) . ". Your message has been received!";
            } else {
                $error = "Error saving your message. Please try again.";
            }

            $stmt->close();
            $conn->close();
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ClimateSync - Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../contact/contact.css" />
</head>
<body>
  <header class="d-flex justify-content-between align-items-center p-3">
    <h1>ClimateSync</h1>
    <nav>
      <ul class="nav">
        <li class="nav-item"><a class="nav-link text-white" href="../homepage/homepage.php">Home</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item"><span class="nav-link text-white">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span></li>
          <li class="nav-item"><a class="nav-link button text-white" href="../LoginPage/logout.php">Log Out</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link button text-white" href="../LoginPage/login.php">Log In</a></li>
          <li class="nav-item"><a class="nav-link button text-white" href="../SignupPage/signup.php">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <section class="contact-info container my-5">
    <h2>Contact Information</h2>
    <p>Email: info@climatesync.com</p>
    <p>Phone: +91 1234567890</p>
  </section>

  <section class="contact-form container my-5">
    <h2>Send Us a Message/Feedback</h2>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success"><?php echo $success; ?></div>
    <?php elseif (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="mb-3">
         <label for="name" class="form-label">Name</label>
         <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
      </div>
      <div class="mb-3">
         <label for="email" class="form-label">Email</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
      </div>
      <div class="mb-3">
         <label for="message" class="form-label">Message</label>
         <textarea class="form-control" id="message" name="message" rows="5" placeholder="Describe your problem or feedback" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </section>

  <footer class="text-center p-4">
    <p>&copy; 2025 ClimateSync. Mini project.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


