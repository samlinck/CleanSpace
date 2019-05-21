<?php
    require_once("bootstrap.php");

    $userName = $_SESSION['user'][1];
    if(isset($_GET['type'])) {
        $spaceType = $_GET['type'];
    } else {
        $spaceType = "Space <br> Type";
    }

    if (!empty($_POST)) {
        $spaceLocation = $_POST['location'];
        $space = new Space();
        // get specific location
        $pieces = explode(",", $spaceLocation);
        $stukken = explode(" ", $pieces[0]);
        $street = $stukken[0];
        $number = $stukken[1];
        $dorp = explode(" ", $pieces[1]);
        $zip = $dorp[1];
        $city = $dorp[2];
        // get user_id
        $userId = $_SESSION['user'][0];

        //set info
        $space->setSpaceName($_POST['spaceName']);
        $space->setStreet($street);
        $space->setNumber($number);
        $space->setZip($zip);
        $space->setCity($city);
        $space->setSpaceType($spaceType);

        // info about space to db and get id from space
       $spaceId = $space->registerSpace();
        
       // insert admin's user id en space_id in spaceadmins
        $space->setUserId($userId);
        $space->setSpaceId($spaceId);
        $space->createSpaceAdmin();

        //go to next page and give location id
        header("Location: location.php?location_id=".$spaceId);

    }
        else {
            
        }
    
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
    <div class="create-space large-container">
        <p>Create Space</p>
        <a href="spaceType.php" class="link--big"><?php echo $spaceType ?></a>
        <form action="" method="post">
        <label class="input" for="spaceName">Space Name</label>
        <input type="text" name="spaceName" id="spaceName" class="field">
        <label class="input" for="location">Location</label>
        <div class="flex-container">
            <input type="text" id="location" name="location" class="field field--small">
            <img class="location" src="./images/location.svg" alt=""> 
        </div>
        <label class="input" for="admins">Admin</label>
        <div class="flex-container">
            <input type="text" id="admins" name="admins" value="<?php echo $userName?>" class="field">
            <img class="plus" src="./images/plus.svg" alt="" style="display: none">
        </div>
        <input type="submit" value="Create" class="btn">
    </div>
        <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            var platform = new H.service.Platform({
                "app_id": "D0oDddNZmbkt1cllGcwX",
                "app_code": "D6SmVEDVo36WQsabESqgpA"
            });
            var geocoder = platform.getGeocodingService();
            if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                    geocoder.reverseGeocode(
                        {
                            mode: "retrieveAddresses",
                            maxresults: 1,
                            prox: position.coords.latitude + "," + position.coords.longitude
                        }, data => {
                            // alert("The nearest address to your location is:\n" + data.Response.View[0].Result[0].Location.Address.Label);
                            let space = data.Response.View[0].Result[0].Location.Address.Label;
                            locate(space);
                        }, error => {
                            console.error(error);
                        }
                    ); 
                }); 
            } else {
                console.error("Geolocation is not supported by this browser!");
            }
            function locate(space) {
                $("#location").val(space);
            }
        </script>
</body>
</html>