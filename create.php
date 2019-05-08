<!DOCTYPE html>
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
    <div class="create-space large-container">
        <p>Create Space</p>
        <form action="" method="post">
        <label class="input" for="spaceName">Space Name</label>
        <input type="text" name="spaceName" id="spaceName" class="field">
        <label class="input" for="location">Location</label>
        <div class="flex-container">
            <input type="text" id="location" name="location" class="field field--small">
            <img class="location" src="./images/location.svg" alt=""> 
        </div>
        <label class="input" for="admins">Admins</label>
        <div class="flex-container">
            <input type="text" id="admins" name="admins" class="field field--small">
            <img class="plus" src="./images/plus.svg" alt="">
        </div>
        <a href="spaceType.php" class="link--big">Space <br> Type</a>
        <input type="submit" value="Create" class="btn">
    </div>
</body>
</html>