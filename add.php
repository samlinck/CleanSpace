<?php 
    require_once("bootstrap.php");

    $spaceId = $_GET['location_id'];
    $userId = $_GET['crew_id'];
    $user = User::getUserById($userId);
    $username = $user['username'];
    
    $space = new Space();
    $space->setUserId($userId);
    $space->setSpaceId($spaceId);
    $space->createSpaceAdmin();

    // delete from crew
    Space::deleteCrew($spaceId,$userId);
    header( "refresh:3; url=location.php?location_id=".$spaceId );
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
    <div class="member-container large-container">        
        <h1><?php echo $username." "; ?>has been promoted to admin!</h1>
        <br>
        <p>returning to location...</p>
    </div>
</body>
</html>