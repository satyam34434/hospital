
<nav class="navbar">
        <div class="logo">
            <img src="https://via.placeholder.com/150" alt="Medicare Logo">
        </div>
        <ul class="navbar-items">
            <li><a href="showDoctors.php">Doctors</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="login.php">Login</a></li>
            <li>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
 