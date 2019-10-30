<?php
$link = mysqli_connect("localhost", "root", "", "kwizzard");
 
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
        <title>Kwizzard</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <header>
            <div id="header-div">
                <img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='instructorLanding.php'">
                <h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='landing.html'"><center>Kwizzard</center></h1>
            </div>
            
        </header>
    </head>
<body>

<?php 
if(mysqli_query($link, $sql)){
?>
<div class=cleanBody>
        <div class=cleanInterior>
	<h1> Thanks for registering! </h1>
	<p> You can access your class here </p>
	</div>
	        <div class=mobileButtonGroup>
	        	<a onclick="window.location.href='instructorLanding.php'">
            			<button type="button" class=mobileButton >Take Me Home</button>
        		</a>
        	</div>
</div> 
<?php 
} else { 
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
