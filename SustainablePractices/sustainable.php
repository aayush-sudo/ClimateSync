<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "ClimateSync";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_new_city'])) {
    $stmt = $conn->prepare("INSERT INTO sustainable_practices (city, category, practice1_title, practice1_description, practice2_title, practice2_description, practice3_title, practice3_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssss",
        $_POST['new_city'],
        $_POST['category'],
        $_POST['practice1_title'],
        $_POST['practice1_description'],
        $_POST['practice2_title'],
        $_POST['practice2_description'],
        $_POST['practice3_title'],
        $_POST['practice3_description']
    );
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['city'])) {
    $city = $conn->real_escape_string($_GET['city']);
    $sql = "SELECT * FROM sustainable_practices WHERE city = '$city' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "No data found"]);
    }
    exit;
}

$sql = "SELECT DISTINCT city FROM sustainable_practices";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Practices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sustainable.css">
</head>
<body class="bg-light">
<header>
        <h1>ClimateSync</h1>
        <nav>
            <ul>
                <li><a href="../HomePage/homepage.php">Home</a></li>
                <!-- <li><a href="#features">Features</a></li> -->
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a href="../Awareness/Awareness.html">Awareness</a></li>
                <!-- <li><a href="../LoginPage/login.html">Log In</a></li> -->
                <li><a href="../LiveClimateDataAQI/aqicheck.html">AQI Check</a></li>

            </ul>
        </nav>
      </header>

<div class="container mt-5">
    <h2 class="text-center mb-4">Sustainable Practices by City</h2>

    <div class="mb-3">
        <label for="citySelect" class="form-label">Select a City:</label>
        <select id="citySelect" class="form-select">
            <option value="">-- Choose a City --</option>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?= htmlspecialchars($row['city']) ?>"><?= htmlspecialchars($row['city']) ?></option>
            <?php } ?>
        </select>
    </div>

    <div id="results" class="row mt-4"></div>

    <hr class="my-5">

<h4 class="text-white">City not found?</h4>
<!-- <p class="text-white">Click below to add it along with sustainable practices:</p> -->

<button class="btn btn-outline-light mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#addCityForm" aria-expanded="false" aria-controls="addCityForm">
    + Add a New City
</button>

<div class="collapse" id="addCityForm">
    <form method="POST" class="bg-dark p-4 rounded">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="new_city" class="form-label text-white">City Name</label>
                <input type="text" class="form-control" id="new_city" name="new_city" required>
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label text-white">Category (urban/rural)</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="">-- Select --</option>
                    <option value="urban">Urban</option>
                    <option value="rural">Rural</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label text-white">Practice 1 Title</label>
                <input type="text" class="form-control" name="practice1_title" required>
            </div>
            <div class="col-md-6">
                <label class="form-label text-white">Practice 1 Description</label>
                <input type="text" class="form-control" name="practice1_description" required>
            </div>

            <div class="col-md-6">
                <label class="form-label text-white">Practice 2 Title</label>
                <input type="text" class="form-control" name="practice2_title" required>
            </div>
            <div class="col-md-6">
                <label class="form-label text-white">Practice 2 Description</label>
                <input type="text" class="form-control" name="practice2_description" required>
            </div>

            <div class="col-md-6">
                <label class="form-label text-white">Practice 3 Title</label>
                <input type="text" class="form-control" name="practice3_title" required>
            </div>
            <div class="col-md-6">
                <label class="form-label text-white">Practice 3 Description</label>
                <input type="text" class="form-control" name="practice3_description" required>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" name="submit_new_city" class="btn btn-success">Submit City</button>
        </div>
    </form>
</div>

</div>

<script src="sustainable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
