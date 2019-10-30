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
	 $ans= $_GET['ans'];
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
	 	$answer=$row['answer'];//echo "$type";
	}
	echo "ans=$ans";
	echo "answer=$answer";
	if($ans==$answer)
		mysqli_query($conn,"UPDATE question SET correct=correct+1 WHERE ID=$ID;");
	mysqli_query($conn,"UPDATE question SET total=total+1 WHERE ID=$ID;");
	 
        mysql_close($conn);
      ?>
    </div>
    </body>
    <footer>
	<meta http-equiv="Refresh" content="1; url=review.php<?php echo "?id=$ID" ?>">
    </footer>
</html>
