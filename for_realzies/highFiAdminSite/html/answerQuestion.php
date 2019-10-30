<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
    <head>
        <title>Kwizzard</title>
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <header>
        <div id="header-div">
            <img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='landing.html'">
            <h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='studentLanding.html'"><center>Kwizzard</center></h1>
        </div>
    </header>
    <body>
        <div class=cleanBody style="background-color:white; border-color:red; border-style:solid;border-width:3px;text-align:center;">
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
	}

         mysql_close($conn);
     ?>
        <h1 id=dynamicQuestion><?php echo "$question";?></h1>
	<div id=SQL style="visibility: hidden"><?php echo "$type";?></div>
        <div id=MC>
            <div id=extraRight><a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=1";?>"><button class=mobileButton><?php echo "$choice1";?></button></a>
            <a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=2";?>"><button class=mobileButton><?php echo "$choice2";?></button></a></div>
            <div id=extraRight><a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=3";?>"><button class=mobileButton><?php echo "$choice3";?></button></a>
            <a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=4";?>"><button class=mobileButton><?php echo "$choice4";?></button></a></div>
        </div>
        <div id=TF>
	<div id=extraRight>
                <a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=1";?>"><button class=mobileButton>True</button></a>
                <a style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=2";?>"><button class=mobileButton>False</button></a>
            </div>
	</div>
    <div id=matching>
	<div id=extraRight>
        <h1><?php echo "$match1";?>
        <select id=m1>
            <option value="1"><?php echo "$choice1";?></option>
            <option value="2"><?php echo "$choice2";?></option>
            <option value="3"><?php echo "$choice3";?></option>
            <option value="4"><?php echo "$choice4";?></option>
        </select>
        </h1>
        <h1>
        <?php echo "$match2";?>
        <select id=m2>
            <option value="1"><?php echo "$choice1";?></option>
	    <option value="2"><?php echo "$choice2";?></option>
	    <option value="3"><?php echo "$choice3";?></option>
	    <option value="4"><?php echo "$choice4";?></option>
        </select></h1>
        
        <h1><?php echo "$match3";?>
        <select id=m3>
            <option value="1"><?php echo "$choice1";?></option>
            <option value="2"><?php echo "$choice2";?></option>
            <option value="3"><?php echo "$choice3";?></option>
            <option value="4"><?php echo "$choice4";?></option>
        </select>
    </h1>
    <h1>
        <?php echo "$match4";?>
        <select id=m4>
            <option value="1"><?php echo "$choice1";?></option>
            <option value="2"><?php echo "$choice2";?></option>
            <option value="3"><?php echo "$choice3";?></option>
            <option value="4"><?php echo "$choice4";?></option>
        </select></h1>
        </div>
		    <script>
                        function match(){
                        document.getElementById("hrefmatch").href+=document.getElementById("m1").value+document.getElementById("m2").value+document.getElementById("m3").value+document.getElementById("m4").value;
                        }
                    </script>
		    <a id=hrefmatch style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=";?>"><input onclick="match()" type="submit" value="Submit"></a>
	</div>
        <div id=calc> 
                    <br>
                    <input id="calcText" name=calcText type="text"  placeholder="value"><br><br>
		    <script>
                        function change(){
                        document.getElementById("hrefcalc").href+=document.getElementById("calcText").value;
                        }
		    </script>                    
                    <a id=hrefcalc style="text-decoration:none" href="middleMan.php?id=<?php echo "$ID&ans=";?>"><input onclick="change()" type="submit" value="Submit"></a>
       </div>
    </div>
    </body>
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

    <footer>

    </footer>
</html>
