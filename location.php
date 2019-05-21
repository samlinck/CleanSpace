<?php 
    require_once("bootstrap.php");

    $spaceId = $_GET['location_id'];
    $space = Space::getSpaceInfo($spaceId);

    $space = array_shift($space);
    $issues = Issue::getIssueBySpaceId($spaceId);
    // print_r($issues); exit();
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
        <div class="space-info">
            <img src="./images/<?php echo $space['spaceType'];?>.svg" alt="" class="space-logo">
            <h2><?php echo $space['spaceName'];?></h2>
            <p>Members</p>
            <div class="members">
                <a href="#">
                    <div data-member="1"></div>
                </a>
                <a href="#">
                    <div data-member="2"></div>
                </a>
                <a href="#">
                    <div data-member="3"></div>
                </a>
                <a href="member.php">
                    <div data-member="4">
                        <p class="bollekes">...</p>
                    </div>
                </a>
            </div>
        </div>
        <p class="title-left">issues</p>
        <div class="space-problems space-issues">
            <?php foreach ($issues as $i): ?>
                <a href="issue.php?issue_id=<?php echo $i['id'];?>">
                    <div><img src="./images/<?php echo $i['issueType']; ?>.svg" alt=""></div>
                </a>
                <a href="#">
            <?php endforeach; ?>
                <a href="newIssue.php?location_id=<?php echo $space['id'];?>"><div class="make-problem"></div></a>
            </a>
        </div>
        <p class="title-left" style="display: none">challenges</p>
        <div class="space-problems space-challenges" style="display: none">
        <a href="#">
                <div></div>
            </a>
            <a href="#">
                <div></div>
            </a>
            <a href="#">
                <div></div>
            </a>
            <a href="#">
                <div class="make-problem"></div>
            </a>
        </div>
        <p style="display: none">Progress</p>
        <div class="space-progress" style="display :none">
            <div class="likes">
                <img src="./images/like.svg" alt="">
                <p class="like">0</p>
            </div>
            <div class="dislikes">
                <img src="./images/dislike.svg" alt="">
                <p class="dislike">-1</p>
            </div>
        </div>
    </div>
</body>
</html>