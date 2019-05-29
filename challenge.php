<?php 
    require_once("bootstrap.php");
    $challengeId = $_GET['challenge_id'];
    // static function to get whole issue
    $challengeInfo = Challenge::getChallengeById($challengeId);
    $challengeInfo = array_shift($challengeInfo);
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
            <p>Add Challenge</p>
            <img src="./images/<?php echo $challengeInfo['challengeType']; ?>.svg" alt="">
            <div class="description">
                <p><?php echo $challengeInfo['challengeDesc'];?></p>
            </div>
        </div>
    </div>
</body>
</html>