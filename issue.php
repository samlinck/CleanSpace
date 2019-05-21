<?php 
    require_once("bootstrap.php");
    $issueId = $_GET['issue_id'];
    // static function to get whole issue
    $issueInfo = Issue::getIssueById($issueId);
    $issueInfo = array_shift($issueInfo);
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
            <a href="location.php?location_id=<?php echo $issueInfo['space_id'];?>"><img src="./images/cross.svg" alt=""></a>
            <p>Add issue</p>
            <img src="./images/<?php echo $issueInfo['issueType']; ?>.svg" alt="">
            <!-- <form action="" method="post" class="form--big">
                <label class="input" for="issue">Issue description</label>
                <textarea type="text" name="issue" id="issue" class="field field--big"></textarea>
                <input type="submit" value="Add" class="btn">
            </form> -->
            <div class="description">
                <p><?php echo $issueInfo['issueDesc'];?></p>
            </div>
        </div>
    </div>
</body>
</html>