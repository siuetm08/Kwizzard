<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>Kwizzard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<header>
    <div class=header-div>
        <img class=img src='image/kwizzard.png' onclick="window.location.href='studentLanding.php'">
        <p class=h3>Kwizzard</p>
        <img class=siue src='image/index.png' onclick="window.location.href='https\://www.siue.edu/'">
    </div>
</header>

<body>
    <div class=cleanBody>
        <?php
         $dbhost = '127.0.0.1';
         $username='root';
         $password='';
         $db='kwizzard';
         $conn = mysqli_connect($dbhost,$username,$password,$db);

         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
                $query='failure';
                echo $query;
         }

         //echo 'Connected successfully';
         $ID = $_GET['id'];
         $query = "SELECT * FROM question WHERE ID=$ID;";
        /* echo "$query";
         $result=mysqli_query($conn,$query);
         if (!mysqli_query($conn,$query))
         {
                echo("Error description: " . mysqli_error($con));
         }
         print_r($result);
         echo "<br>";
         echo "<table border='1'>";
         while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function.
                }
                echo "</tr>";
         }
         echo "</table>";*/
        $result=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)) {
                $type=$row['type'];//echo "$type";
                $question=$row['question'];
                $choice1=$row['choice1'];
                $choice2=$row['choice2'];
                $choice3=$row['choice3'];
                $choice4=$row['choice4'];
                $match1=$row['match1'];
                $match2=$row['match2'];
                $match3=$row['match3'];
                $match4=$row['match4'];
		$answer=$row['answer'];
		$review=$row['review'];
        }

         mysql_close($conn);
      ?>
	<div id=SQL style="visibility: hidden"><?php echo $type;?></div>
        <h1 id=dynamicQuestion><?php echo $question; ?> </h1>
        <h2 id=MC>
		<?php
		if($answer==1)
			echo "$choice1";
		elseif($answer==2)
                        echo "$choice2";
		elseif($answer==3)
                        echo "$choice3";
		elseif($answer==4)
                        echo "$choice4";
		?>
       	
        </h2>
        <h2 id=TF>
            <?php
                if($answer==1)
                        echo "$choice1";
                elseif($answer==2)
                        echo "$choice2";
                ?>
            </h2>
    <h2 id=matching>
        <?php	
		$p1=$answer[0];
		$p2=$answer[1];
		$p3=$answer[2];
		$p4=$answer[3];
		echo"$choice1:";
		if($p1==1)
			echo" $match1\n";
		else if($p1==2)
                        echo" $match2\n";
		else if($p1==3)
                        echo" $match3\n";
		else if($p1==4)
                        echo" $match4\n";
		echo"<br>$choice2:";
                if($p1==2)
                        echo" $match1\n";
                else if($p2==2)
                        echo" $match2\n";
                else if($p2==3)
                        echo" $match3\n";
                else if($p2==4)
                        echo" $match4\n";
		echo"<br>$choice3:";
                if($p3==1)
                        echo" $match1\n";
                else if($p3==2)
                        echo" $match2\n";
                else if($p3==3)
                        echo" $match3\n";
                else if($p3==4)
                        echo" $match4\n";
		echo"<br>$choice4:";
                if($p4==1)
                        echo" $match1\n";
                else if($p4==2)
                        echo" $match2\n";
                else if($p4==3)
                        echo" $match3\n";
                else if($p4==4)
                        echo" $match4\n";	
	?>
    </h2>
        </form>
        <h2 id=calc>
        	<?php
			echo $answer;
		?>
        </h2>
	<div><?php echo $review;?>
	</div>
	<br><br>
	<div id=littleExtraRight>
        <a style="text-decoration:none" href="studentLanding.php"<button class=mobileButton type=button>Continue</button></a>
	</div>
	</div>
    </body>
    <footer>
     <script>
        var ele = document.getElementById("SQL");
        var Question=ele.innerHTML;
        if(Question=="MC")
        {
            var element = document.getElementById("TF");
            element.parentNode.removeChild(element);
            element = document.getElementById("matching");
            element.parentNode.removeChild(element);
            element = document.getElementById("calc");
            element.parentNode.removeChild(element);
        }
        else if(Question=="TF")
        {
            var element = document.getElementById("MC");
            element.parentNode.removeChild(element);
            element = document.getElementById("matching");
            element.parentNode.removeChild(element);
            element = document.getElementById("calc");
            element.parentNode.removeChild(element);
        }
        else if(Question=="Matching")
        {
            var element = document.getElementById("TF");
            element.parentNode.removeChild(element);
            element = document.getElementById("MC");
            element.parentNode.removeChild(element);
            element = document.getElementById("calc");
            element.parentNode.removeChild(element);
        }
        else if(Question=="Calc")
        {
            var element = document.getElementById("TF");
            element.parentNode.removeChild(element);
            element = document.getElementById("matching");
            element.parentNode.removeChild(element);
            element = document.getElementById("MC");
            element.parentNode.removeChild(element);
        }
        else
        {
            var element = document.getElementById("TF");
            element.parentNode.removeChild(element);
            element = document.getElementById("matching");
            element.parentNode.removeChild(element);
            element = document.getElementById("MC");
            element.parentNode.removeChild(element);
            element = document.getElementById("calc");
	    element.parentNode.removeChild(element);
            element = document.getElementById("dynamicQuestion");
            element.innerHTML="Question does not exist or has been removed";
        }

    </script>

</footer>

</html>