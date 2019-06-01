<?php
    require_once("bootstrap.php");
    $challengeId = $_GET['challenge_id'];
    $locationId = $_GET['location_id'];

    Challenge::deleteChallenge($challengeId);

    header("Location: location.php?location_id=".$locationId);