<?php
    require_once("../bootstrap.php");

    $userId = $_SESSION['user'][0];
    $spaceId = $_POST['spaceId'];

    $space = new Space();
    // insert member's user id en space_id in spaceadmins
    $space->setUserId($userId);
    $space->setSpaceId($spaceId);
    $space->createSpaceCrew();
  