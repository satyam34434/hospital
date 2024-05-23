<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
</style>
<body>
    <?php include 'header.php'; ?>

    <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<span>Welcome, " . $_SESSION['username'] . "</span>";
            echo "<a href='logout.php'>Logout</a>";
        }
        ?>

<div class="container">
        <form action="booking_process.php" method="POST">
            <label for="patientId">Patient ID:</label>
            <input type="text" id="patientId" name="patientId">
            <input type="submit" value="Go">
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
