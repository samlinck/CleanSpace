<?php 
    require_once("bootstrap.php");

    $spaceId = $_GET['location_id'];
    $getCrew = Space::getCrew($spaceId);
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
    <div class="member-container large-container">
        <a href="location.php?location_id=<?php echo $spaceId; ?>" class="go-back"><img src="./images/cross.svg" alt=""></a>
        <p>Click to add as admin</p>
        
        <p class="title-left">members</p>
        <div class="space-problems members">
        <?php foreach($getCrew as $c): ?>
            <!-- for random avatar -->
            <?php $random = rand(1,4); ?>
            <div class="user" id="user">
                <div>
                        <a href="add.php?location_id=<?php echo $spaceId.'&crew_id='.$c['id']; ?>"><img src="./images/avatar<?php echo $random; ?>.svg" alt=""></a>
                </div>
                <p><?php echo $c['username']; ?></p>
            </div>
        <?php endforeach; ?> 
        </div>
    </div>
</body>
</html>