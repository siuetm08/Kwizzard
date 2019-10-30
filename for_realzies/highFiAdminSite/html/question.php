<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
	<head>
		<title>Add Student</title>
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">
	</head>
	<header>
		<div id="header-div">
			<img src='../image/kwizzard.png' style="height:12vw;padding-top:1vw;padding-left:1vw;float: left;" onclick="window.location.href='../landing.html'">
			<h1 style="font-size:5vw; top: 40%; color: white;padding-top:3vw;" onclick="window.location.href='../landing.html'"><center>Kwizzard</center></h1>
		</div>
	</header>

	<body>
		<div class="expandedCleanBody">
<?php
        	$dbhost = 'localhost';
		$username='root';
		$password='';
		$db='kwizzard';
		$conn = new mysqli($dbhost,$username,$password,$db);
	
		if(! $conn ) {
			die('Could not connect'. $conn->connect_error);
		}//else { echo "im in";}
		$query = "SELECT * FROM question";
		$result = $conn->query($sql);	
         	$result=mysqli_query($conn,$query);
         	if (!mysqli_query($conn,$query))
         	{
                	echo("Error description: " . mysqli_error($conn));
         	}
         	//print_r($result);
         	echo "<br>";
         	echo "<table border='1'>";
		echo"<tr><td>ID</td><td>Course</td><td>Question</td><td>Choice1</td><td>Choice2</td><td>Choice3</td><td>Choice4</td>
		<td>Answer</td><td>Was this asked? (1=yes 0=no)</td><td>Difficulty (4=hardest)</td><td>Time</td><td>Date</td>
		<td>Match1</td><td>Match2</td><td>Match3</td><td>Match4</td><td>Type of Question</td><td>Number answered correctly</td><td>Total answered</td><td>Reasoning</td></tr>";
         	while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                	echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function.
                }
                echo "</tr>";
         	}
         	echo "</table>";
?>
		<br>
		<form action="" method="post">
		<div> 
		I would like to  <select onChange=change() id=action name=action><option value=remove>Remove</option><option value=edit>Edit</option></select> the question with ID <input name=id type=textbox>.
	  	<br><br>    
		<div name=edit id=edit style="display: none;">
		Change <select id=field name=field> 
			<option value=question>Question</option>
			<option value=course>Course</option>
			<option value=choice1>Choice1</option>
                        <option value=choice2>Choice2</option>
			<option value=choice3>Choice3</option>
                        <option value=choice4>Choice4</option>
			<option value=match1>Match1</option>
                        <option value=match2>Match2</option>
                        <option value=match3>Match3</option>
                        <option value=match4>Match4</option>
			<option value=answer>Answer</option>
                        <option value=difficulty>Difficulty</option>
                        <option value=review>Reasoning</option>
		</select> to <input type=textbox name=newVal id=newVal>.<br>
		</div>
	<input id=submit type=submit value=Submit name="submit"/>	
<script>
		var edit;
		var par;
                function change(){
			if(document.getElementById("action").value == "remove")
			{
				var element = document.getElementById("edit");
            			element.style.display = "none";		
			}
			else{
				var element = document.getElementById("edit");
                                element.style.display = "block";
			}	
		}
</script>
		</form>		
</div>
<?php	
		if(isset($_POST['submit'])){
			$action= $_POST['action'];//echo "$action\n";
			$id = $_POST['id'];//echo "$id\n";
			$field = $_POST['field'];//echo "$id\n";
			$newVal = $_POST['newVal'];//echo "$id\n";
			if($action=="remove")
			{
				$query = "DELETE FROM question WHERE id=$id;";
				if(!mysqli_query($conn,$query)){
                                	echo "<br>no good<br>";
                        	} else {
                                	echo "<script type='text/javascript'>alert('Question was removed');</script>";
                        	}

			}
			if($action=="edit")
                        {
                                $query = "UPDATE question SET $field=$newVal WHERE id=$id;";
				//echo "$query\n";
                                if(!mysqli_query($conn,$query)){
                                        echo "<br>no good<br>";
                                } else {
                                        echo "<script type='text/javascript'>alert('Question was modified');</script>";
                                }

                        }
			$difficulty = $_POST['difficulty'];echo "$difficulty\n";
			$type = $_POST['type'];echo "$type\n";
			$review=$_POST['review'];echo "$review\n";
			//echo "$type";

			 
		/*	$query = "INSERT INTO user (eID,password,name,email,phone,year) VALUES ('$seid', '$pass','$sname','$email','$phone','$slvl')";
			
			if(!mysqli_query($conn,$query)){
				echo "<br>no good<br>";
			} else {	
				echo "<script type='text/javascript'>alert('new record created');</script>";
			}*/
		
		$conn->close();
		}
?>
</body>
</html>
