<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="#">My Locations</a>
    <a href="#">Profile</a>
    <a href="#">Terms</a>
    <a href="#">Settings</a>
    
    <a href="logout.php" class="navbar__logout">Logout <?php echo $_SESSION['username']; ?>, logout?</a>
</nav>