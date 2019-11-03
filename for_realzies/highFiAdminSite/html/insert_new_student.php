<?php
/* Attempt mysql server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "kwizzard");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$year = mysqli_real_escape_string($link, $_REQUEST['year']);
 
// Attempt insert query execution
$sql = "INSERT INTO user (eID, name, email, year) VALUES ('$user', '$name', '$email', '$year')";
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>Thanks!</title>
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
            <h3 class=h2> Thanks for registering! </h3>
            <br>
            <p>Hit the button below and wait for your instructor to send you some questions</p>
            <br>
            <input style="padding:10px;font-size: 11pt; margin: 0px;" class="mobileButton"
                onclick="window.location.href='studentLanding.php'" type="button" value="Take Me Home" /><br>
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