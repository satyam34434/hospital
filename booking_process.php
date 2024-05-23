<?php
// booking_process.php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcaremanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the patient ID from the form
$patientId = $_POST['patientId'];

// Check if the patient exists in the database
$sql = "SELECT * FROM patient WHERE patientId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patientId);
$stmt->execute();
$result = $stmt->get_result();

// If patient exists, fetch details and display the booking form
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patientName = $row['patientName'];
    $dob = $row['dob'];
    $contactNo = $row['contactNo'];
    $email = $row['email'];
} else {
    // If patient does not exist, set details to empty
    $patientName = "";
    $dob = "";
    $contactNo = "";
    $email = "";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }

        input[type="text"], input[type="date"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
        <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Booking Process</h2>
        <form action="booking_confirm.php" method="POST">
            <label for="patientName">Patient Name:</label>
            <input type="text" id="patientName" name="patientName" value="<?php echo $patientName; ?>"><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>"><br>
            <label for="contactNo">Contact Number:</label>
            <input type="tel" id="contactNo" name="contactNo" value="<?php echo $contactNo; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label for="doctorId">Doctor ID:</label>
            <input type="text" id="doctorId" name="doctorId" required><br>
            <input type="hidden" name="patientId" value="<?php echo $patientId; ?>">
            <input type="submit" value="Book">
        </form>
    </div>
</body>
</html>
