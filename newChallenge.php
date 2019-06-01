<?php 
    require_once("bootstrap.php");
    $spaceId = $_GET['location_id'];

    if(isset($_GET['challenge_type'])) {
        // define issue
        $challengeType = $_GET['challenge_type'];
        $challenge = new Challenge();

        $challenge->setchallengeType($challengeType);
        $challenge->setSpaceId($spaceId);

        //aanduiding active
        $activeType = $_GET['challenge_type'];
//         Challenge::getActiveType($activeType);

        // issue to db and relocate
        if (!empty($_POST)) {
            $challenge->setChallengeDesc($_POST['challenge']);
            $challenge->createChallenge();

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
	    
	        <span id="type_id" data-id="<?= $activeType ?>"></span>
        <div class="add-issue">
            <a href="location.php?location_id=<?php echo $spaceId;?>"><img src="./images/cross.svg" alt=""></a>
            <p>Add Challenge</p>
            <div class="issue-sorts">
                <a href="newChallenge.php?location_id=<?php echo $spaceId;?>&challenge_type=afval">
                    <img src="./images/afval.svg" alt="" id="afval">
                </a>
                <a href="newChallenge.php?location_id=<?php echo $spaceId;?>&challenge_type=energie">
                    <img src="./images/energie.svg" alt="" id="energie">
                </a>
                <a href="newChallenge.php?location_id=<?php echo $spaceId;?>&challenge_type=groen">
                    <img src="./images/groen.svg" alt="" id="groen">
                </a>
                <a href="newChallenge.php?location_id=<?php echo $spaceId;?>&challenge_type=water">
                    <img src="./images/water.svg" alt="" id="water">
                </a>
            </div>
            <form action="" method="post" class="form--big">
                <label class="input" for="challenge">Challenge description</label>
                <textarea type="text" name="challenge" id="challenge" class="field field--big"></textarea>
                <input type="submit" value="Add" class="btn">
            </form>
        </div>
    </div>
    
    <script>
	    $(function(){
		    const type = $('#type_id').data('id');
		    $('#' + type).addClass('afval-active');
	    });
	 </script>
</body>
</html>