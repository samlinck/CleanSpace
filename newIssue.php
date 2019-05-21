<?php 
    require_once("bootstrap.php");
    $spaceId = $_GET['location_id'];

    if(isset($_GET['issue_type'])) {
        $issueType = $_GET['issue_type'];
        $issue = new Issue();

        $issue->setIssueType($issueType);
        $issue->setSpaceId($spaceId);

        if (!empty($_POST)) {
            $issue->setIssueDesc($_POST['issue']);
            $issue->createIssue();

            header('Location: location.php?location_id='.$spaceId);

        }

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
    <div class="single-location large-container">
        <div class="add-issue">
            <a href="location.php?location_id=<?php echo $spaceId;?>"><img src="./images/cross.svg" alt=""></a>
            <p>Add issue</p>
            <div class="issue-sorts">
                <a href="newIssue.php?location_id=<?php echo $spaceId;?>&issue_type=afval">
                    <img src="./images/afval.svg" alt="">
                </a>
                <a href="newIssue.php?location_id=<?php echo $spaceId;?>&issue_type=energie">
                    <img src="./images/energie.svg" alt="">
                </a>
                <a href="newIssue.php?location_id=<?php echo $spaceId;?>&issue_type=groen">
                    <img src="./images/groen.svg" alt="">
                </a>
                <a href="newIssue.php?location_id=<?php echo $spaceId;?>&issue_type=water">
                    <img src="./images/water.svg" alt="">
                </a>
            </div>
            <form action="" method="post" class="form--big">
                <label class="input" for="issue">Issue description</label>
                <textarea type="text" name="issue" id="issue" class="field field--big"></textarea>
                <input type="submit" value="Add" class="btn">
            </form>
        </div>
    </div>
</body>
</html>