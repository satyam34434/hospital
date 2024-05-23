<?php
session_start();

// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Function to show alert and redirect after 1 second
        function showAlertAndRedirect() {
            alert("You are logged out.");
            setTimeout(function() {
                window.location.href = "dashboard.php";
            }, 1000);
        }
    </script>
</head>
<body onload="showAlertAndRedirect()">
</body>
</html>
