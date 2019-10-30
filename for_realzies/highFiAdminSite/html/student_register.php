<?php 
session_start();
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
                        <p> Looks like you're not set up with us yet, lets get you registered. </p>
                </div>
                <form action="insert_new_student.php" method="post">
                        <input type="hidden" name="user" value="<?php echo phpCAS::getUser(); ?>">
                        Name: <input type="text" name="name" value="<?php echo $name;?>">
                        <span class="error">* <?php echo $nameErr;?></span>
                        <br><br>
                        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailErr;?></span>
                        <br><br>
                        Year:<br>
                                <input type="radio" name="year" <?php if (isset($year) && $year=="1") echo "checked";?> value="1"> Freshman<br>
                                <input type="radio" name="year" <?php if (isset($year) && $year=="2") echo "checked";?> value="2"> Sophomore<br>
                                <input type="radio" name="year" <?php if (isset($year) && $year=="3") echo "checked";?> value="3"> Junior<br>
                                <input type="radio" name="year" <?php if (isset($year) && $year=="4") echo "checked";?> value="4"> Senior<br>
                        <input type="submit" class=mobileButton name="submit" value="Submit">
                </form>
        </div>
	</body>
</html>
