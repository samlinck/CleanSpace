<?php
require_once('bootstrap.php');
// User::checkLogin();
if (isset($_SESSION['user'])) {
    //logged in user
    //echo "😎";
} else {
    //no logged in user
    header('Location: login.php');
}
// get random tip 
$tip = Challenge::getRandomTip();
$singleTip = $tip['tip'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:700,900" rel="stylesheet">
    <title>CleanSpace</title>
</head>
<body>
    <header>
        <?php include_once("includes/nav.inc.php"); ?>
    </header>
    <div class="large-container">
        <div class="tip">
            <h3>Tip for a better lifestyle</h3>
            <p><?php echo $singleTip; ?></p>
        </div>
        <div class="create">
            <a href="create.php"> 
                CREATE<br>
                SPACE
            </a>
        </div>
        <div class="button button--green">
            <a href="join.php">Join Space</a>
        </div>
        <div class="button button--yellow">
            <a href="locations.php">My locations</a>
        </div>
    </div>
</body>
</html>