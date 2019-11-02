<?php
session_start();
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>Kwizzard</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<header>
    <div class=header-div>
        <img class=img src='image/kwizzard.png' onclick="window.location.href='studentLanding.php.html'">
        <p class=h3>Kwizzard</p>
        <img class=siue src='image/index.png' onclick="window.location.href='https\://www.siue.edu/'">
    </div>
</header>

<body>
    <div class=cleanBody>
        <div class=cleanInterior>
            <h1><?php echo $_SESSION['name']; ?>'s course</h1>
        </div>
        <div class=mobileButtonGroup id=extraLeft>
            <a onclick="window.location.href='php/students.php'">
                <button type="button" class=mobileButton>View Students</button>
            </a>
            <a onclick="window.location.href='php/question.php'">
                <button type="button" class=mobileButton>View Questions</button>
            </a>
        </div>
        <div class=mobileButtonGroup id=extraLeft>
            <a onclick="window.location.href='/php/addStudent.php'">
                <button type="button" class=mobileButton>Add students</button>
            </a>
            <a onclick="window.location.href='addQuestion.html'">
                <button type="button" class=mobileButton>Add Questions</button>
            </a>
        </div>
    </div>
    <div class=footer>
        <p>&copy; Copyright 2019 TM08</p>
    </div>
</body>

</html>