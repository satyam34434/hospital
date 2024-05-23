<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "healthcaremanagement"; // Change this to your database name

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username, password, and user type from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Prepare SQL query based on user type
    if ($user_type == 'assistant') {
        $sql = $conn->prepare("SELECT * FROM medicalassistant WHERE assistantId=? AND Password=?");
    } elseif ($user_type == 'doctor') {
        $sql = $conn->prepare("SELECT * FROM hospitaldoctor WHERE doctorId=? AND doctorpassword=?");
    } else {
        die("Invalid user type selected.");
    }

    // Debugging: Check if SQL statement is prepared successfully
    if ($sql === false) {
        die("SQL prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the query
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Username and password match, login successful
        $_SESSION['username'] = $username; // Set session variable
        header("Location: dashboard.php"); // Redirect to showDoctors page
        exit(); // Ensure script stops execution after redirection
    } else {
        // Username and/or password do not match, login failed
        $login_error = "Login failed. Invalid username or password.";
    }

    // Close connection
    $sql->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Login</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="user_type">User Type:</label>
    <select id="user_type" name="user_type">
        <option value="assistant">Assistant</option>
        <option value="doctor">Doctor</option>
    </select>

    <input type="submit" value="Login">
</form>

<?php if (isset($login_error)) : ?>
    <p class="error"><?php echo $login_error; ?></p>
<?php endif; ?>

    <?php include 'footer.php'; ?>
</body>
</html>
