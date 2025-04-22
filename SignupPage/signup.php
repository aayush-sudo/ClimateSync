<?php
session_start();
$error = "";

$host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "ClimateSync";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm-password"]);

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($insert_stmt->execute()) {
                $_SESSION["username"] = $name;
                header("Location: ../HomePage/homepage.php");
                exit();
            } else {
                $error = "Error creating account. Please try again.";
            }

            $insert_stmt->close();
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClimateSync - Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js" defer></script>
</head>
<body>
  <header>
    <h1>ClimateSync</h1>
    <nav>
        <ul>
            <li><a href="../HomePage/homepage.php">Home</a></li>
            <li><a href="../contact/contact.php">Contact</a></li>
            <li><a href="../LoginPage/login.php">Log In</a></li>
        </ul>
    </nav>
  </header>
  
  <section class="signup-section">
    <div class="signup-container">
        <h2>Create an Account</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form id="signup-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirm your password">
            </div>
            <button type="submit" class="submit-btn">Sign Up</button>
        </form>
        <p>Already have an account? <a href="../LoginPage/login.php">Log In</a></p>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 ClimateSync. Mini project.</p>
  </footer>
</body>
</html>
