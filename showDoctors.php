<?php include 'db_connection.php'; ?>
<?php
$sql = "SELECT doctorId, doctorName, email, contactNo, Gender, qualification, experience, specialization, hospitalId FROM hospitaldoctor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $doctors = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $doctors = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <?php if (!empty($doctors)) : ?>
            <?php foreach ($doctors as $doctor) : ?>
                <div class="tile">
                    <h3>Dr. <?php echo htmlspecialchars($doctor['doctorName']); ?></h3>
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($doctor['doctorId']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($doctor['email']); ?></p>
                    <p><strong>Contact No:</strong> <?php echo htmlspecialchars($doctor['contactNo']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($doctor['Gender']); ?></p>
                    <p><strong>Qualification:</strong> <?php echo htmlspecialchars($doctor['qualification']); ?></p>
                    <p><strong>Experience:</strong> <?php echo htmlspecialchars($doctor['experience']); ?> years</p>
                    <p><strong>Specialization:</strong> <?php echo htmlspecialchars($doctor['specialization']); ?></p>
                    <p><strong>Hospital ID:</strong> <?php echo htmlspecialchars($doctor['hospitalId']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No doctors found.</p>
        <?php endif; ?>

    </div>
    <form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>


    <?php include 'footer.php'; ?>
</body>
</html>
