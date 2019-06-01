<?php 
    require_once("bootstrap.php");

    $userId = $_SESSION['user'][0];
    $spaceId = $_GET['location_id'];
    $space = Space::getSpaceInfo($spaceId);

    $space = array_shift($space);
    //issues
    $issues = Issue::getIssueBySpaceId($spaceId);
    //challenges
    $challenges = Challenge::getChallengeBySpaceId($spaceId);
    // CAN SEE JOIN?
    //get admin bij space_id
    $admins = Space::checkAdmin($spaceId);
    $admins = array_column($admins,'user_id');
    // get crew by space_id
    $crew = Space::checkCrew($spaceId);
    $crew = array_column($crew, 'user_id');
    // can join?
    $canSee = Space::canJoin($userId, $admins, $crew);
    $canAdd = Space::canAdd($userId, $admins, $crew);
    //count completed by type
    $afval = Challenge::countCompletedByType($type = "afval", $spaceId);
    $afval = array_shift($afval);
    
    $energie = Challenge::countCompletedByType($type = "energie", $spaceId);
    $energie = array_shift($energie);

    $groen = Challenge::countCompletedByType($type = "groen", $spaceId);
    $groen = array_shift($groen);

    $water = Challenge::countCompletedByType($type = "water", $spaceId);
    $water = array_shift($water);
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
        <button class="join <?php echo $canSee; ?>">Join Space</button>
        <div class="space-info">
            <img src="./images/<?php echo $space['spaceType'];?>.svg" alt="" class="space-logo">
            <h2><?php echo $space['spaceName'];?></h2>
            <p>Space Crew</p>
            <div class="members">
                <a href="member.php?location_id=<?php echo $spaceId; ?>">
                    <div data-member="1"></div>
                </a>
                <a href="member.php?location_id=<?php echo $spaceId; ?>">
                    <div data-member="2"></div>
                </a>
                <a href="member.php?location_id=<?php echo $spaceId; ?>">
                    <div data-member="3"></div>
                </a>
                <a href="member.php?location_id=<?php echo $spaceId; ?>">
                    <div data-member="4"></div>
                </a>
            </div>
        </div>
        <p class="title-left">issues</p>
        <div class="space-problems space-issues">
            <?php foreach ($issues as $i): ?>
                <a href="issue.php?issue_id=<?php echo $i['id'];?>">
                    <div><img src="./images/<?php echo $i['issueType']; ?>.svg" alt=""></div>
                </a>
            <?php endforeach; ?>
                <a href="newIssue.php?location_id=<?php echo $space['id'];?>" class="<?php echo $canAdd; ?>"><div class="make-problem"></div></a>
        </div>
        <p class="title-left">challenges</p>
        <div class="space-problems space-challenges">
            <?php foreach ($challenges as $c): ?>
                <a href="challenge.php?challenge_id=<?php echo $c['id'];?>">
                    <div><img src="./images/<?php echo $c['challengeType']; ?>.svg" alt=""></div>
                </a>
            <?php endforeach; ?>
                <a href="newChallenge.php?location_id=<?php echo $space['id'];?>" class="<?php echo $canAdd; ?>"><div class="make-problem"></div></a>
        </div>
        <p>Space Badges</p>
        <div class="badges">
           <div class="badge">
               <img src="./images/afval.svg" alt="">
               <span><?php echo $afval; ?></span>
            </div>
            <div class="badge">
               <img src="./images/energie.svg" alt="">
               <span><?php echo $energie; ?></span>
            </div>
            <div class="badge">
               <img src="./images/groen.svg" alt="">
               <span><?php echo $groen; ?></span>
            </div>
            <div class="badge">
               <img src="./images/water.svg" alt="">
               <span><?php echo $water; ?></span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="js/join_space.js"></script>
</body>
</html>