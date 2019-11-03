<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>New Instructor</title>
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
    <div class="column single">
            <h1 class=h2> Hello <?php echo /*phpCAS::getUser()*/''; ?> </h1><br>
            <p> If you're here, you're an instructor. </p><br>
            <p> Thanks for trying out Kwizzard! </p>
        
        <form action="insert_new_instructor.php" method="post">

            <input type="hidden" name="user" value="<?php echo /*phpCAS::getUser()*/''; ?>"><br>
            <label for="title">Title</label><select name="title">
                <option value=""> </option>
                <option value="Dr. "> Dr.</option>
                <option value="Ms. "> Ms.</option>
                <option value="Mr. "> Mr.</option>
                <option value="Mrs. ">Mrs.</option>
            </select><br><br>
            <label for="name">Name</label> 
            <span class="error">* <?php echo $nameErr;?></span>
            <input type="text" name="name" value="<?php echo $name;?>">
            <br><br>
            <label for="email">Email</label>  
            <span class="error">* <?php echo $emailErr;?></span>
            <input type="text" name="email" value="<?php echo $email;?>">
            <br><br>
            <div class="fl">
              <input type="submit" class=mobileButton name="submit" value="Submit">
            </div>
        </form>
    </div>

</body>

</html>