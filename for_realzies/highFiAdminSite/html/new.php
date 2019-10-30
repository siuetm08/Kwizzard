<?php
if(isset($_POST["submit"])){
        	$dbhost = "localhost";
		$username="root";
		$password="";
		$db="kwizzard";
		$conn = mysqli_connect($dbhost,$username,$password,$db);
		if(! $conn->connect_error ) {
			die('Could not connect: ' . $conn->connect_error);
		}
		$sql = "INSERT INTO user (eID, password, name, email, phone, year)
		VALUES ('".$_POST["studeid"]"', 'siue2019', '".$_POST["studname"]"','".$_POST["studeid"] ."@siue.edu', '000-000-0000', '".$_POST["studlvl"]"')";
		if($conn->query($sql) === TRUE){
                	echo "<script type= 'text/javascript'> alert('new record created successfully');</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
        }else{
		echo "<script tpye='text/javascript'>alert('error in mysql connection');</script>";
	}
?>

