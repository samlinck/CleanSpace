<?php
include_once("bootstrap.php");
// get user and password from POST
if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

	$user = new User();
	$user->setEmail($email);
	$user->setPassword($password);
	//check if user can login (use function)
    $data = $user->CanILogin();
    if($data != false){
        $_SESSION['user'] = $data;
        // if ok -> redirect to index.php
        sleep(3.5);
        header('Location: index.php');
    }
    else {
        $error = "Login failed";
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
    <title>Document</title>
</head>
<body>
    <div id="loading">
        <img src="gifs/loading.gif" alt="">
    </div>
    <div class="large-container dissapear">
        <img src="images/logo_groot.png" alt="logo" class="logoBig">
        <h1>CleanSpace</h1>
        <div class="Login">
            <form action="" method="post">
                <?php if( isset($error) ): ?>
                    <div class="form__error">
                        <p>
                            Sorry, we can't log you in with that email and password. Can you try again?
                        </p>
                    </div>
                <?php endif; ?>
                <label class="input" for="email">Email</label>
                <input type="text" id="email" name="email" class="field">
                <label class="input" for="password">Password</label>
                <input type="password" id="password" name="password" class="field">
                <input type="submit" value="Login" class="btn" id="loginbtn">
            </form>
            <a href="register.php" class="noMember">Not a member yet?</a>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="js/loading.js"></script>
</body>
</html>