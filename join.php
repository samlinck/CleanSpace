<?php
    require_once 'bootstrap.php';

    $space = new Space();

    $get = $_SESSION['user'][0];

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
        <a href="index.php" class="go-back"><img src="./images/cross.svg" alt=""></a>
        <p>Locations around me</p>
        <div class="list-container">       
            <ul class="list-items" id="listupdates">
            <?php 
                $spacesLeft = $space->getSpacesLeft($get);
                foreach($spacesLeft as $s):
            ?>            
            <a href="location.php?location_id=<?php echo $s['id'];?>"> <li class="location-list"><img src="images/<?php echo $s['spaceType'];?>.svg" alt="locationIcon" class="location-icon"><span class="spaceName"><?php echo $s['spaceName'];?></span></li></a>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>