<?php 
session_start();
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>New User Register</title>
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

    <h1 class=h2 style="font-weight: 200"> Hello <?php echo phpCAS::getUser(); ?> </h1><br>
    <p style="text-align: center"> Thanks for trying out Kwizzard! </p>
    <br>
    <p style="text-align: center"> Register with us to receive questions from your instructor. </p>

    <form action="insert_new_student.php" method="post">

        <input type="hidden" name="user" value="<?php echo phpCAS::getUser(); ?>"><br>
        <label for="year">Year</label>
        <span class="error">* <?php echo $nameErr;?></span>
        <select name="year">
            <option value="1">Freshman</option>
            <option value="2">Sophomore</option>
            <option value="3">Junior</option>
            <option value="4">Senior</option>
        </select><br><br>
        <label for="name">Name</label>
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="text" name="name" value="<?php echo $name;?>" placeholder="First and Last Name...">
        <br><br>
        <label for="email">Email</label>
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email...">
        <br><br>
        <div class="fl">
            <input type="submit" class=mobileButton name="submit" value="Submit">
        </div>
    </form>
    </div>
</body>

</html>