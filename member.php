<?php 
    require_once("bootstrap.php");

    $spaceId = $_GET['location_id'];
    $getAdmins = Space::getAdmins($spaceId);
    $getAdmins = array_column($getAdmins,'username');
    $getCrew = Space::getCrew($spaceId);
    $getCrew = array_column($getCrew,'username');
    // print_r($getAdmins); exit();
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
        <p>Members</p>
        <p class="title-left">admins</p>
        <div class="space-problems admins">
        <?php foreach($getAdmins as $a): ?>
            <!-- for random avatar -->
            <?php $random = rand(1,4); ?>
            <div class="user" id="user">
                <div>
                    <img src="./images/avatar<?php echo $random; ?>.svg" alt="">
                </div>
                <p><?php echo $a; ?></p>
            </div>
        <?php endforeach; ?>
        <a href="newAdmin.php?location_id=<?php echo $spaceId;?>" class="<?php echo $canAdd; ?>"><div class="make-problem adjust"></div></a>    
        </div>
        <p class="title-left">members</p>
        <div class="space-problems members">
        <?php foreach($getCrew as $c): ?>
            <!-- for random avatar -->
            <?php $random = rand(1,4); ?>
            <div class="user" id="user">
                <div>
                    <img src="./images/avatar<?php echo $random; ?>.svg" alt="">
                </div>
                <p><?php echo $c; ?></p>
            </div>
        <?php endforeach; ?> 
        </div>
    </div>
</body>
</html>