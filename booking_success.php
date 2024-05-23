<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
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
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Booking Successful</h2>
        <p>Your appointment has been successfully booked. You will receive a notification shortly.</p>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
