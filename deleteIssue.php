<?php
    require_once("bootstrap.php");
    $issueId = $_GET['issue_id'];
    $locationId = $_GET['location_id'];

    Issue::deleteIssue($issueId);

    header("Location: location.php?location_id=".$locationId);