<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>
    <title>New Question</title>
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
    <div class="single column" style="overflow: scroll" >
        <form action="" method="post">
            <h2 class=h2 style="margin-bottom: 20px">Enter a Question </h2>

            <textarea name="question" rows="4" cols="50" value="Question:"></textarea><br>
            <h2><label for="course">Enter Course</label></h2>

            <input type="text" name="course"><br><br>
            <h2><label for="difficulty">Select a difficulty</label></h2>
            <select name=difficulty>
                <option value="1">P1</option>
                <option value="2">P2</option>
                <option value="3">P3</option>
                <option value="4">P4</option>
            </select><br>

            <p>Add image(optional)</p>
            <input type="file" name="pic" accept="image/*"><br><br>
            <div>
                <div>
                <h2><label for="MC">Multiple Choice</label></h2>
                        <input type="radio" id="MC" name="type" value="Multiple Choice" checked><br><br><br><br>
                            <label for="MC1">Option 1</label><input type=text name="MC1"><br>
                            <label for="MC2">Option 2</label><input type=text name="MC2"><br>
                            <label for="MC3">Option 3</label><input type=text name="MC3"><br>
                            <label for="MC4">Option 4</label><input type=text name="MC4"><br>
                        <label for="MCAns">Answer</label><select name=MCAns>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                    </select><br>

                    <h2><input type="radio" id="TF" name="type" value="True False">
                        <label for="TF">True False</label><br></h2>
                    Answer:<select name=TFans>
                        <option value="1">True</option>
                        <option value="2">False</option>
                    </select><br>

                    <h2><input type="radio" id="Matching" name="type" value="Matching">
                        <label for="Matching">Matching</label><br></h2>
                    Item 1: <input type=text name="I1"><br> <br>Option 1: <input type=text name="OP1"><br><br><br>
                    Item 2: <input type=text name="I2"><br> <br>Option 2: <input type=text name="OP2"><br><br><br>
                    Item 3: <input type=text name="I3"><br> <br>Option 3: <input type=text name="OP3"><br><br><br>
                    Item 4:<input type=text name="I4"><br> <br>Option 4: <input type=text name="OP4"><br><br><br>
                    Answer(format is 1:W,2:X,3:Y,4:Z): <input type=text name="MatchAns">

                    <h2><input type="radio" id="Calc" name="type" value="Calculations">
                        <label for="Calc">Calculations</label><br></h2>
                    Answer: <input type=text name="CalcAns"><br><br><br>
                </div>
            </div>
            <h2>Enter Answer reasoning</h2>

            <textarea name="review" rows="4" cols="50" value="Question:"></textarea><br>
            <br><br>
            <input type=submit value=Submit name="submit" />

        </form>
        <br>
    </div>
    <?php
        	$dbhost = 'localhost';
		$username='root';
		$password='2111995';
		$db='kwizzard';
		$conn = new mysqli($dbhost,$username,$password,$db);
	
		if(! $conn ) {
			die('Could not connect'. $conn->connect_error);
		}//else { echo "im in";}
			
		if(isset($_POST['submit'])){
			$question = $_POST['question'];echo "$question\n";
			$course = $_POST['course'];echo "$course\n";
			$difficulty = $_POST['difficulty'];echo "$difficulty\n";
			$type = $_POST['type'];echo "$type\n";
			$review=$_POST['review'];echo "$review\n";
			if($type=="Calculations")
			{
				$type="Calc";
				$answer= $_POST['CalcAns'];echo "$answer\n";
			        $query = "INSERT INTO question (question,course,difficulty,type,answer,review) VALUES ('$question', '$course','$difficulty','$type','$answer','$review')";
				echo "$query\n";	
                        	if(!mysqli_query($conn,$query)){
                                	echo "<br>no good<br>";
                        	} else {
                                	echo "<script type='text/javascript'>alert('new record created');</script>";
                        	}

			}
			else if($type=="True False")
			{
                                $type="TF";
				$answer= $_POST['matchAns'];echo "$answer\n";
				$c1="True";
				$c2="False";
				$query = "INSERT INTO question (question,course,difficulty,type,answer,choice1,choice2,review) VALUES ('$question', '$course','$difficulty','$type','$answer','$c1','$c2','$review')";

                                if(!mysqli_query($conn,$query)){
                                        echo "<br>no good<br>";
                                } else {
                                        echo "<script type='text/javascript'>alert('new record created');</script>";
                                }

			}
			else if($type=="Matching")
			{
                                $type="Matching";
				$answer= $_POST['MatchAns'];echo "$answer\n";
				$c1=$_POST['I1'];
				$c2=$_POST['I2'];
				$c3=$_POST['I3'];
				$c4=$_POST['I4'];
				$m1=$_POST['OP1'];
				$m2=$_POST['OP2'];
				$m3=$_POST['OP3'];
				$m4=$_POST['OP4'];
				$query = "INSERT INTO question (question,course,difficulty,type,answer,choice1,choice2,choice3,choice4,match1,match2,match3,match4,review) VALUES ('$question', '$course','$difficulty','$type','$answer','$c1','$c2','$c3','$c4','$m1','$m2','$m3','$m4','$review')";
				//echo "$query\n";
                                if(!mysqli_query($conn,$query)){
                                        echo "<br>no good<br>";
                                } else {
                                        echo "<script type='text/javascript'>alert('new record created');</script>";
                                }
			}
			else if($type=="Multiple Choice")
			{
                                $type="MC";
				$answer= $_POST['MCAns'];echo "$answer\n";
				$c1=$_POST['MC1'];
				$c2=$_POST['MC2'];
				$c3=$_POST['MC3'];
				$c4=$_POST['MC4'];
				$query = "INSERT INTO question (question,course,difficulty,type,answer,choice1,choice2,choice3,choice4,review) VALUES ('$question', '$course','$difficulty','$type','$answer','$c1','$c2','$c3','$c4','$review')";
				//echo "$query\n";
                                if(!mysqli_query($conn,$query)){
                                        echo "<br>no good<br>";
                                } else {
                                        echo "<script type='text/javascript'>alert('new record created');</script>";
                                }	

			}
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

    <div class=footer>
        <p>&copy; Copyright 2019 TM08</p>
    </div>
</body>

</html>