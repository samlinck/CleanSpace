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
    <div class="large-container">
        <p>Space Type</p>
        <div class="location-grid">
            <a href="create.php?type=nature">
                <div>
                    <img src="./images/nature.svg" alt="">
                    <p>Nature</p>
                </div>
            </a>
            <a href="create.php?type=sport">
                <div>
                    <img src="./images/sport.svg" alt="">
                    <p>Sport</p>
                </div>
            </a>
            <a href="create.php?type=culture">
                <div>
                    <img src="./images/culture.svg" alt="">
                    <p>Culture</p>
                </div>
            </a>
            <a href="create.php?type=urban">
                <div>
                    <img src="./images/urban.svg" alt="">
                    <p>Urban</p>
                </div>
            </a>
            <a href="create.php?type=workspace">
                <div>
                    <img src="./images/workspace.svg" alt="">
                    <p>Workspace</p>
                </div>
            </a>
            <a href="create.php?type=transport">
                <div>
                    <img src="./images/transport.svg" alt="">
                    <p>Transport</p>
                </div>
            </a>
            <a href="create.php?type=event">
                <div>
                    <img src="./images/event.svg" alt="">
                    <p>Event</p>
                </div>
            </a>
            <a href="create.php?type=home">
                <div>
                    <img src="./images/home.svg" alt="">
                    <p>Home</p>
                </div>
            </a>
            <a href="create.php?type=custom">
                <div>
                    <img src="./images/custom.svg" alt="">
                    <p>Custom</p>
                </div>
            </a>
        </div>
    </div>

</body>
</html>