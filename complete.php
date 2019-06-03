<?php
    require_once("bootstrap.php");
    $challengeId = $_GET['challenge_id'];
    $locationId = $_GET['location_id'];
    sleep(2.5);

    Challenge::completeChallenge($challengeId);

    header("Location: location.php?location_id=".$locationId);