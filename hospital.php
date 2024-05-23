<?php include 'db_connection.php'; ?>
<?php
// SQL query to fetch all hospital details
$sql = "SELECT hospitalId, hospitalName, location, contactNo, email FROM hospital";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $hospitals = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $hospitals = [];
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container{
            text-align :center;
        }
    </style>

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <?php if (!empty($hospitals)) : ?>
            <?php foreach ($hospitals as $hospital) : ?>
                <div class="tile">
                    <h3><?php echo htmlspecialchars($hospital['hospitalName']); ?></h3>
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($hospital['hospitalId']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($hospital['location']); ?></p>
                    <p><strong>Contact No:</strong> <?php echo htmlspecialchars($hospital['contactNo']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($hospital['email']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No hospitals found.</p>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
