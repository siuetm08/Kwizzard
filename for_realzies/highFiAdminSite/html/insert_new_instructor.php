<?php
$link = mysqli_connect("localhost", "root", "2111995", "kwizzard");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
 
// Attempt insert query execution
$sql = "INSERT INTO user (eID, name, email, admin) VALUES ('$user', '$title$name', '$email', '1')";
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>Registration Confirmed!</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <header>
        <div class=header-div>
            <img class=img src='image/kwizzard.png' onclick="window.location.href='studentLanding.php'">
            <p class=h3>Kwizzard</p>
            <img class=siue src='image/index.png' onclick="window.location.href='https\://www.siue.edu/'">
        </div>
    </header>
</head>

<body>

    <?php 
if(mysqli_query($link, $sql)){
?>
        <div class="column single">
            <h2 class=h2> Thanks for registering!</h2>
            <br>
            <p>Now that you're set up, make sure your students get this link:</p><br>
            <a href="https://kwizzard.isg.siue.edu/">https://kwizzard.isg.siue.edu</a><br>
            <br> 
            <p>On their first log in, they'll be authenticated through SIUe's Central Authentication Service. 
                Their emails will be added to our database and they'll automatically receive emails when questions
                are sent out!</p><br>
            <p>Hit the button below to go to your dashboard!</p><br>
            <input style="padding:10px;font-size: 11pt; margin: 0px;" class="mobileButton"
                onclick="window.location.href='studentLanding.php'" type="button" value="Take Me Home" /><br>
        </div>
    </div>
    <?php 
} else { 
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

    <div class=footer>
        <p>&copy; Copyright 2019 TM08</p>
    </div>
</body>

</html>