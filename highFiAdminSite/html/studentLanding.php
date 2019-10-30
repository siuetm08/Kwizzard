<?php
// Start a session
session_start();

//connect to kwizzard database to find a user related to the user CAS returned
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "kwizzard";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "select * from user where eID LIKE '$user'";

// Execute query to find user in kwizzard db to the user authenticated through CAS 
if($res = mysqli_query($conn, $query)){ 
    if(mysqli_num_rows($res) > 0){ 
        while($row = mysqli_fetch_array($res)){ 
        	if($row['eID'] == $user) {
			$_SESSION['eID'] = $row['eID'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['admin'] = $row['admin'];
		}
	} 
        mysqli_free_result($res); 
    }     
} 
  
mysqli_close($conn); 
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
    <head>
        <title>Kwizzard</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <header>
            <div id="header-div">
                <img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='studentLanding.php'">
                <h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='landing.html'"><center>Kwizzard</center></h1>
            </div>
            
        </header>
    </head>
<body>
<?php
if($_SESSION['admin'] == TRUE) {
	header('Location: instructorLanding.php');
	exit();	
}
else if($_SESSION['name'] == "") {
	header('Location: student_register.php');
        exit();
} else {
?>
	<div class=cleanBody>
        <div class=cleanInterior>
	<h1> Hello <?php echo $_SESSION['name']; ?> </h1>
	</div>
	        <div class=mobileButtonGroup>
	        <a onclick="window.location.href='review.php'">
            <button type="button" class=mobileButton >See Questions</button>
        </a>
        </div>
    </div>
<?php
} 
?>
   </body>
</html>
