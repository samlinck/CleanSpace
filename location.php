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
    <div class="single-location large-container">
        <div class="space-info">
            <img src="./images/nature.svg" alt="" class="space-logo">
            <h2>Space Name</h2>
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
                <a href="#">
                    <div data-member="4">
                        <p class="bollekes">...</p>
                    </div>
                </a>
            </div>
        </div>
        <p class="title-left">issues</p>
        <div class="space-problems space-issues">
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
                <div></div>
            </a>
        </div>
        <p class="title-left">challenges</p>
        <div class="space-problems space-challenges">
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
                <div></div>
            </a>
        </div>
        <p>Progress</p>
        <div class="space-progress">
            <img src="" alt="">
            <p class="like">0</p>
            <img src="" alt="">
            <p class="dislike">-1</p>
        </div>
    </div>
</body>
</html>