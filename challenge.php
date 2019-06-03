<?php 
    require_once("bootstrap.php");
    $challengeId = $_GET['challenge_id'];
    // static function to get whole issue
    $challengeInfo = Challenge::getChallengeById($challengeId);
    $challengeInfo = array_shift($challengeInfo);

    // can complete and delete?
    $spaceId= $challengeInfo['space_id'];
    $admins = Space::checkAdmin($spaceId);
    $admins = array_column($admins,'user_id');
    $userId = $_SESSION['user'][0];
    $canSee = Space::onlyAdmin($userId, $admins);
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
    <div class="single-location large-container">
        <div class="add-issue">
            <a href="location.php?location_id=<?php echo $challengeInfo['space_id'];?>"><img src="./images/cross.svg" alt=""></a>
            <p>Challenge</p>
            <img src="./images/<?php echo $challengeInfo['challengeType']; ?>.svg" alt="">
            <div class="description">
                <p><?php echo $challengeInfo['challengeDesc'];?></p>
            </div>
            <a href="complete.php?location_id=<?php echo $challengeInfo['space_id'];?>&challenge_id=<?php echo $challengeInfo['id'];?>" id="btncomplete" class="btn">Challenge completed?</a>
            <div id="chalcomplete">
                <img src="gifs/<?php echo $challengeInfo['challengeType']; ?>.gif" alt="">
            </div>
            <a href="deleteChallenge.php?location_id=<?php echo $challengeInfo['space_id'];?>&challenge_id=<?php echo $challengeInfo['id'];?>" class="btn btn--delete <?php echo $canSee ;?>">Delete this challenge!</a>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="js/challenge_complete.js"></script>
</body>
</html>