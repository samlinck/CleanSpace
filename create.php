<?php
    include_once("bootstrap.php");

    if (!empty($_POST)) {
        $spaceLocation = $_POST['location'];
        $space = new Space();
        // get info
        $pieces = explode(",", $spaceLocation);
        $stukken = explode(" ", $pieces[0]);
        $street = $stukken[0];
        $number = $stukken[1];
        $dorp = explode(" ", $pieces[1]);
        $zip = $dorp[1];
        $city = $dorp[2];
        //set info
        $space->setStreet($street);
        $space->setNumber($number);
        $space->setZip($zip);
        $space->setCity($city);
        
        // info about space to db
        $space->register();

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
        <form action="" method="post">
        <label class="input" for="spaceName">Space Name</label>
        <input type="text" name="spaceName" id="spaceName" class="field">
        <label class="input" for="location">Location</label>
        <div class="flex-container">
            <input type="text" id="location" name="location" class="field field--small">
            <img class="location" src="./images/location.svg" alt=""> 
        </div>
        <label class="input" for="admins">Admins</label>
        <div class="flex-container">
            <input type="text" id="admins" name="admins" class="field field--small">
            <img class="plus" src="./images/plus.svg" alt="">
        </div>
        <a href="spaceType.php" class="link--big">Space <br> Type</a>
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