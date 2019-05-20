<!DOCTYPE html>
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
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Space Name</a></li>
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Different Space</a></li>
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Different Space</a></li>
            </ul>
        </div>
        <p class="myLocations">Joined</p>
        <div class="list-container">       
            <ul class="list-items" id="listupdates">
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Space Name</a></li>
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Different Space</a></li>
                <li class="location-list"><img src="./images/location.svg" alt="locationIcon" class="location-icon"><a href="spaceType.php" class="spaceName">Different Space</a></li>
            </ul>
        </div>
    </div>
</body>
</html>