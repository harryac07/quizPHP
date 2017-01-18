<?php include 'database.php' ?>
<?php session_start();
	
 ?>
<?php 
	//Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score']=0;
	}

	if($_POST){ // if post is submitted( or if submit button is clicked)
		$number =$_POST['number']; // grabbing whatever the user has selected in question choice number
		$selected_choice=$_POST['choice'];// grabbing the choice values selected by user in question.php 
		$next=$number+1; // next number for next question

		/*
			Get total questions
		*/
			$query="SELECT * FROM questions";
			//Get result
			$results=$mysqli->query($query) or die($mysqli->error.__LINE__);
			$total=$results->num_rows;

		/*
			Get correct choice or correct answer
		*/
			$query = "SELECT * FROM choices 
					WHERE question_number=$number AND is_correct=1";

			// GET result
			$result= $mysqli->query($query) or die($mysqli->error.__LINE__);

			// GET row
			$row= $result->fetch_assoc();

			//Set correct choice
			$correct_choice=$row['id'];
			
			// Compare the choice to get answer
			if($correct_choice==$selected_choice){
				//Answer 

				$_SESSION['score']++;
			}
			// Check if Last question
			if($number==$total){
				header("Location: final.php");
				exit();

			}else{
				header("Location: question.php?n=".$next);
				
			}
	}