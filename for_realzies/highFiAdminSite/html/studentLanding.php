<?php
// Start a session
session_start();

//connect to kwizzard database to find a user related to the user CAS returned
$servername = "127.0.0.1";
$username = "root";
$password = "2111995";
$dbname = "kwizzard";
$user = "Boye";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM user WHERE eID LIKE '$user'";

// Execute query to find user in kwizzard db to the user authenticated through CAS 
if($res = mysqli_query($conn, $query)){ 
    if(mysqli_num_rows($res) > 0){ 
        while($row = mysqli_fetch_array($res)){ 
        	if($row['eID'] == $user) {
			    $_SESSION['eID'] = $row['eID'];
			    $_SESSION['name'] = $row['name'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['score'] = $row['score'];
		    }
	    } 
        mysqli_free_result($res); 
    }     
} 
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>Home</title>
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
if($_SESSION['admin'] == TRUE) {
	header('Location: instructorLanding.php');
	exit();	
}
else if(!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Boye";
	header('Location: student_register.php');
        exit();
} else {
    ?>
    <div class=header-div style="background-color: whitesmoke;border-style: none">
        <h2 class=h2 style="margin-left: 15px;width: 85%;align-self: center"><?php echo "Hello " . $_SESSION['name'] . "!"; ?></h2>
        <h2 class=h2 style="position: absolute;right: 0;align-self: center;margin-right: 15px;padding-left: 3px"><?php echo $_SESSION['score']; ?></h2>
</div>
    <div class=row>
        <?php
    $query = "SELECT * FROM question WHERE asked = 1";
    if($res = mysqli_query($conn, $query)){ 
        if(mysqli_num_rows($res) > 0){ 
            while($row = mysqli_fetch_array($res)) {
                $total = $row['total'];
                $correct = $row['correct'];
                $avg = ($correct / $total) ;
                $color = (($avg < 0.75) ? "red" : "green");
                $answer = "Answer: " . $row['answer'];
        ?>

        <div class=column>
            <h3 style="color: darkgrey;position: relative;float: left;padding: 0px 10px 5px 0px">
                <?php echo $row['course'] . ": #Q" . $row['ID']; ?>
            </h3>
            <p style="text-align: right">Class Score: <?php echo $avg*100; ?>%</p>
            <?php echo '<h4 style="color: ' . $color . ';padding-top: 5px;border-style: none;text-align: right">' . $answer . '</h4>'; ?>
            <br>
            <p style="font-size: 11pt; padding: 0px 5px 10px 0px; text-align: left"><?php echo $row['question']; ?>
            </p>

        </div>
        <?php
            }
            mysqli_free_result($res);
        } 
        else {
        ?>
        <div class=column>
            <h2>Nothing yet!</h2>
        </div>
        <?php
        }     
    } 
      
    mysqli_close($conn); 
        ?>

    </div>

    <?php
} 
    ?>
</body>

</html>