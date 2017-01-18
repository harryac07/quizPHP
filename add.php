<!--admin page-->
<?php include 'database.php'; ?>

<?php 
  if(isset($_POST['submit'])){
    //GET the post variables
    $question_number=$_POST['question_number'];
    $question_text=$_POST['question_text'];
    $correct_choice=$_POST['correct_choice'];
    // choices array
    $choices=array();
    $choices[1]=$_POST['choice1'];
    $choices[2]=$_POST['choice2'];
    $choices[3]=$_POST['choice3'];
    $choices[4]=$_POST['choice4'];
    $choices[5]=$_POST['choice5'];

    //Question query
    $query= "INSERT INTO questions (question_number,text)
          VALUES('$question_number','$question_text')";
    //Run query
    $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);

    //Validate the insert
    if($insert_row){
      foreach($choices as $choice=>$value){
        if($value!=''){
            if($correct_choice==$choice){
                $is_correct=1;
            }else{
              $is_correct=0;
            }
            //choice query
            $query="INSERT INTO choices (question_number,is_correct,text)
                  VALUES('$question_number','$is_correct','$value')";
            //RUN query
            $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);

            //VAlidate insert
            if($insert_row){
              continue;
            }else{
              die('Error: ('.$mysqli->errno.')'.$mysqli->error);
            }
        }
      }
      $msg='Question has been added';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Quizzer</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 "> <!--device ko anusaar device ko width laai lii vaneko-->
  <link rel="stylesheet" type="text/css" media="all" href="css/style.css" /><!--css file link -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  

  <script>
  	$(document).ready(function(){
  		
  		});
  </script>
  
 </head>
 <body>
 	<header>
 		<div class="container">
 			<h1>PHP Quizzer</h1>
 		</div>
 	</header>
 	<main>
 		<div class="container">
  			<h2>Add A question</h2>
        <?php 
            if(isset($msg)){
              echo '<p>'.$msg.'</p>';
            }
        ?>
  			<form method="post" action="add.php">
  					<p>
  						<label>Question Number: </label>
  						<input type="number" name="question_number">
  					</p>
  					<p>
  						<label>Question Text: </label>
  						<input type="text" name="question_text">
  					</p>  
   					<p>
  						<label>Choice #1: </label>
  						<input type="text" name="choice1">
  					</p> 
  					<p>
  						<label>Choice #2: </label>
  						<input type="text" name="choice2">
  					</p> 
  					<p>
  						<label>Choice #3: </label>
  						<input type="text" name="choice3">
  					</p> 
  					<p>
  						<label>Choice #4: </label>
  						<input type="text" name="choice4">
  					</p> 
  					<p>
  						<label>Choice #5: </label>
  						<input type="text" name="choice5">
  					</p> 	
  					<p>
  						<label>Correct Choice Number: </label>
  						<input type="number" name="correct_choice">
  					</p> 	
  					<p>
  						<button type="submit" name="submit" class="btn btn-default">Submit</button>
  					</p>								
  			</form>

 		</div>
 	</main>
 	<footer>
 		<div class="container">
 			Copyright &copy; 2016, Haria PHP Quizzer
 		</div>
 	</footer>
	
</body>
</html>