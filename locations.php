<?php
    require_once 'bootstrap.php';

    $userId = $_SESSION['user'][0];

    $mySpaces = Space::getManaging($userId);
    $joinedSpaces = Space::getJoined($userId);
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
        <h2>My Locations</h2>
        <p class="myLocations">Managing</p>
        <div class="list-container">       
            <ul class="list-items" id="listupdates">
            <?php foreach($mySpaces as $s): ?>
                 <li class="location-list"><img src="images/<?php echo $s['spaceType'];?>.svg" alt="locationIcon" class="location-icon"><a href="location.php?location_id=<?php echo $s['id'];?>"><span class="spaceName"><?php echo $s['spaceName'];?></span></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <p class="myLocations">Joined</p>
        <div class="list-container">       
            <ul class="list-items" id="listupdates">
            <?php foreach($joinedSpaces as $s): ?>
                <li class="location-list"><img src="images/<?php echo $s['spaceType'];?>.svg" alt="locationIcon" class="location-icon"> <a href="location.php?location_id=<?php echo $s['id'];?>" class="spaceName"><?php echo $s['spaceName'];?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>