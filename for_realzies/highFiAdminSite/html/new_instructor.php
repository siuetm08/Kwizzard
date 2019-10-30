<?php
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
			$name = $row['name'];
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
                <img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='new_instructor.php'">
                <h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='landing.html'"><center>Kwizzard</center></h1>
            </div>
            
        </header>
    </head>
<body>
<?php
$name = $email = "";
$nameErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}
?> 
	<div class=cleanBody>
        	<div class=cleanInterior>
        		<h1> Hello <?php echo phpCAS::getUser(); ?> </h1>
			<p> If you're here, you're an instructor. </p>
			<p> Thanks for trying out Kwizzard! </p>
        	</div>
		<form action="insert_new_instructor.php" method="post">
					
			<input type="hidden" name="user" value="<?php echo phpCAS::getUser(); ?>">
			Title: <select name="title"> 	
					<option value="">         </option>
					<option value="Dr. ">  Dr.</option>
					<option value="Ms. ">  Ms.</option>
					<option value="Mr. ">  Mr.</option>
					<option value="Mrs. ">Mrs.</option>
				</select><br><br>
			Name: <input type="text" name="name" value="<?php echo $name;?>">
  			<span class="error">* <?php echo $nameErr;?></span>
  			<br><br>
  			E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  			<span class="error">* <?php echo $emailErr;?></span>
  			<br><br>
			<input type="submit" class=mobileButton name="submit" value="Submit">			
		</form>
      	</div>

   </body>
</html>

