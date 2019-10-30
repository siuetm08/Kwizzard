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
        <div id="header-div">
            <img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='instructorLanding.php'">
            <h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='landing.html'"><center>Kwizzard</center></h1>
        </div>
    </header>
    <body>
        <div class=cleanBody>
        <div class=cleanInterior>
        <h1><?php echo $_SESSION['name']; ?>'s course</h1>
        </div>
        <div class=mobileButtonGroup id=extraLeft>
        <a onclick="window.location.href='php/students.php'">
            <button type="button" class=mobileButton >View Students</button>
        </a>
        <a onclick="window.location.href='php/question.php'">
            <button type="button" class=mobileButton >View Questions</button>
        </a>
        </div>
        <div class=mobileButtonGroup id=extraLeft>
            <a onclick="window.location.href='/php/addStudent.php'">
                <button type="button" class=mobileButton >Add students</button>
            </a>
            <a onclick="window.location.href='addQuestion.php'">
                <button type="button" class=mobileButton >Add Questions</button>
            </a>
            </div>
    </div>
    </body>
    <footer>

    </footer>
</html>
